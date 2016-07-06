<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\TaskRepository;
use App\Task;


class TaskController extends Controller
{
	protected $tasks;
    
    public function __construct(TaskRepository $tasks)
    {
    	$this->middleware('auth');

    	$this->tasks = $tasks;
    }

    
    public function index(Request $request)
    {
        $tasks = $this->tasks->forUser($request->user());

    	return view('tasks.index', compact('tasks'));
    }


    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|max:255'
    	]);
		

    	$request->user()->tasks()->create([
    		'name' => $request->name
    	]);

    	flash('Task added successfully.', 'success');

    	return redirect('/tasks');
    }


    public function destroy(Task $task, Request $request)
    {
    	$this->authorize('destroy', $task);

    	$task->delete();

    	return redirect('/tasks');
    }


    public function edit(Task $task)
    {
    	return view('tasks.edit', compact('task'));
    }


    public function update(Task $task, Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|max:255'
    	]);

        flash('Task Updated Successfully.', 'success');

    	$task->update($request->all());

    	

    	if($request->input('edit'))
    	{
	    	return view('tasks.edit', compact('task'));
    	}
    	else
    	{
    		return redirect('tasks');
    	}
    	
    	
    }


    public function removeFlashMessages()
    {
        //session()->forget(['success']);

        return redirect('/tasks');
    }
}
