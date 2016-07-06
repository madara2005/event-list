@extends('layouts.app')

@section('content')

<div class="container">
	<div class="col-sm-offset-2 col-sm-8">

		<div>@include('common.message')</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">
				New Task
			</div>

			<div class="panel-body">
				@include('common.errors')
				
				<form action="{{ url('task') }}" method="POST" class="form-horizontal" >
					{{ csrf_field() }}

					<div class="form-group">
						<label for="task-name" class="col-sm-3 control-label">Task</label>
						<div class="col-sm-6">
							<input type="text" name="name" id="task-name" class="form-control">
						</div>
					</div>

					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							<button class="btn btn-default" type="submit">
								<i class="fa fa-btn fa-plus"> Add Task</i>
							</button>
						</div>	
					</div>	

				</form>

			</div>

		</div>

		@if(count($tasks) > 0)

			<div class="panel panel-default">
				<div class="panel-heading">
					Current Tasks
				</div>

				<div class="panel-body">
					<table class="table table-tripted task-table">
						<thead>
							<th>Task</th>
							<th></th>
							<th></th>
						</thead>
						<tbody>
							@foreach($tasks as $task)
								<tr>
									<td class="table-text"><div>{{ $task->name }}</div></td> 
									<td>
										<form action="{{ url('task/'.$task->id) }}" method="POST">
											{{ csrf_field() }}
											{{ method_field('DELETE') }}

											<button class="btn btn-danger" type="submit" id="task-delete-{{ $task->id }}">
												<li class="fa fa-btn fa-trash"> Delete</li>
											</button>
										</form>
									</td>
									<td>
										<a href="{{ url('task/'.$task->id) }}" class="btn btn-primary" role="button"><li class="fa fa-pencil-square-o "> Edit </li></a>
									</td>
								</tr>
							@endforeach
							<tr>
								<td colspan="3"><div>{{ $tasks->links() }}</div></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		@endif
	</div>	
</div>

@endsection