@extends('layouts.custom')
@section('content')
<div class="jumbotron col-md-10 col-md-offset-1 main-section">
	<h1>To do list</h1>
	<p class="lead"><b>Please see the below list of your assiged tasks.</b></p>

		<!-- Table Start -->
		<table class="table table-hover Mtop20">
			<?php
			if(count($model)>0){
				?>
				<thead>
					<tr>
					  <th scope="col">#</th>
					  <th scope="col">Task</th>
					  <th scope="col">Description</th>
					  <th scope="col">End Date</th>
					  <th scope="col">Created by</th>
					  <th scope="col">Status</th>
					  <th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					@php
					$i=1;
					foreach($model as $row){
						@endphp
						<tr>
						  <th scope="row">{{ $i }}</th>
						  <td>{{ $row->task }}</td>
						  <td>{{ $row->description }}</td>
						  <td>{{ $row->end_date }}</td>
						  <td>{{ $row->name }}</td>
						  <td>{{ isset($status[$row->status]) ? $status[$row->status] : '' }}</td>
						  <td>
								<a class="col-md-3" href="{{ url('showdet', ['id' => $row->task_id]) }}"><img src="{{ asset('images/view.png') }}" alt="view"></a>
								<a class="col-md-3" href="{{ route('task.edit', ['id' => $row->task_id]) }}"><img src="{{ asset('images/edit.png') }}" alt="edit"></a>
								<form class="col-md-3" action="{{ route('task.destroy', $row->task_id)}}" method="post">
									{{ csrf_field() }}
									{{ method_field('DELETE')}} 
									<button type="submit" style="border: 0; background: transparent" onClick="confSubmit(this.form);">
										<img src="{{ asset('images/delete.png') }}" alt="submit" />
									</button>
								</form>
						  </td>
						</tr>
						@php
						$i++;
					}
					
					@endphp
					
				</tbody>
			<?php
			}else{
					?>
					<tr>
					  <td colspan="7" align="cneter">No tasks!!</td>
					<td>
					<?php
				}
				?>
		</table>
		<!-- Table End -->

</div>
<script type="text/javascript">

function confSubmit(form) {
if (confirm("Are you sure you want to delete?")) {
form.submit();
}

else {
alert("You decided to not submit the form!");
}
}
</script>
@endsection