@extends('layouts.app')
@section('content')
<div class="jumbotron main-section">
			
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create Task</h1>
			@if ($errors->any())
			  <div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					  <li>{{ $error }}</li>
					@endforeach
				</ul>
			  </div><br />
			@endif
			<form method="post" action="{{ route('task.store') }}">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="exampleInputEmail1">Task</label>
					<input type="text" class="form-control" name="task" placeholder="Enter task" value="{{ old('task') }}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Descrition</label>
					<input type="text" class="form-control" name="description" placeholder="Enter Descrition" value="{{ old('description') }}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Start Date</label>
					<input type="text" class="form-control date" name="start_date" placeholder="Select Start Date" value="{{ old('start_date') }}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">End Date</label>
					<input type="text" class="form-control date" name="end_date" placeholder="Select End Date" value="{{ old('end_date') }}">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Assigned to</label>
					<select id="inputState" name="assigned_to" class="form-control">
						<option selected>Choose...</option>
						@php
						foreach($users as $row){
							@endphp
							<option  value="{{ $row->id }}">{{ $row->name }}</option>
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