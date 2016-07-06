@extends('layouts.app')

@section('content')

	<div class="container">
		
		<div class="col-sm-offset-2 col-sm-8">
			
			<div class="panel panel-default">
				
				<div class="panel-heading">
					Edit Task 
				</div>

				<div class="panel-body">
					
					@include('common.errors')

					@include('common.message')

					<form action="{{ url('task/'.$task->id) }}" method="POST" class="form-horizontal">

						{{ csrf_field() }}
						{{ method_field('PATCH') }}
						
						<div class="form-group">
							<label class="col-sm-3 control-label" for="task-name">Task</label>

							<div class="col-sm-6">
								<input class="form-control" type="text" name="name" id="task-name" value="{{ $task->name }}">
							</div>
						</div>	

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								<input name="edit" type="submit" class="btn btn-default" value="Edit">
								<input name="editnview" type="submit" class="btn btn-default" value="Edit & View Tasks">
								<a href="/tasks/removeflash" class="btn btn-default">Back</a>
								<!-- <button class="btn btn-default" type="submit" name="edit">
									<i class="fa fa-btn fa-plus"> Edit </i>
								</button>
								<button class="btn btn-default" type="submit" name="editnview" value="editnview">
									<i class="fa fa-btn fa-plus"> Edit </i>
								</button> -->
							</div>	
						</div>

					</form>

				</div>

			</div>	

		</div>

	</div>

@stop