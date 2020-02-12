@extends('layouts.app')
@section('content')
<div class="jumbotron main-section col-md-10 col-md-offset-1">
			
		<h1>{{ $task->task }}</h1>

		<!-- Table Start -->
		<table class="table table-bordered">
			<tbody>
				<tr>
				  <th scope="row">Description</th>
				  <td>{{ $task->description }}</td>
				</tr>
				<tr>
				  <th scope="row">Start Date</th>
				  <td colspan="2">{{ date('d-M-Y', strtotime($task->start_date)) }}</td>
				</tr>
				<tr>
				  <th scope="row">End Date</th>
				  <td colspan="2">{{ date('d-M-Y', strtotime($task->end_date)) }}</td>
				</tr>
				<tr>
				  <th scope="row">Status</th>
				  <td colspan="2">{{ isset($status[$task->status]) ? $status[$task->status] : '' }}</td>
				</tr>
			</tbody>
		</table>
		<!-- Table End -->

</div>
@endsection