<?php

namespace App\Repositories;

use App\User;
use App\Task;

class TaskRepository
{
	public function forUser(User $user)
	{
		//Task::paginate(2);
		// return Task::where('user_id', $user->id)
		// 			->orderBy('created_at','asc')
		// 			->simplePaginate(2);
		// 			//->get();


		return $user->tasks()
					->orderBY('created_at', 'asc')
					->Paginate(2);
	}
}