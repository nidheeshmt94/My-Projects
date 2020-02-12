@extends('layouts.app')
@section('content')
<div class="jumbotron main-section">
			
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Update Task</h1>
			@if ($errors->any())
			  <div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					  <li>{{ $error }}</li>
					@endforeach
				</ul>
			  </div><br />
			@endif
			<form method="post" action="{{ route('task.update', $task->task_id) }}">
				{{ csrf_field() }}
				{{ method_field('PUT')}} 
				<div class="form-group">
					<label for="exampleInputEmail1">Task</label>
					<input type="text" class="form-control" name="task" placeholder="Enter task" value="{{ $task->task }}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Descrition</label>
					<input type="text" class="form-control" name="description" placeholder="Enter Descrition" value="{{ $task->description }}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Start Date</label>
					<input type="text" class="form-control date" name="start_date" placeholder="Select Date" value="{{ date('Y-m-d', strtotime($task->start_date)) }}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">End Date</label>
					<input type="text" class="form-control date" name="end_date" placeholder="Select Date" value="{{ date('Y-m-d', strtotime($task->end_date)) }}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Assigned to</label>
					<select id="inputState" name="assigned_to" class="form-control">
						<option>Choose...</option>
						@php
						foreach($users as $row){
							$selected = '';
							if($row->id == $task->assigned_to){
								$selected = 'selected';
							}
							@endphp
							<option  value="{{ $row->id }}" {{ $selected }}>{{ $row->name }}</option>
							@php
						}
						@endphp
					</select>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Status</label>
					<select id="inputState" name="status" class="form-control">
						<option>Choose...</option>
						@php
						foreach($status as $id=>$row){
							$selected = '';
							if($id == $task->status){
								$selected = 'selected';
							}
							@endphp
							<option  value="{{ $id }}" {{ $selected }}>{{ $row }}</option>
							@php
						}
						@endphp
					</select>
				</div>
				
				<input type="submit" class="btn btn-primary" value="Save">
			</form>
		</div>
	</div>
	<!-- Table End -->

</div>
@endsection