@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			
			<div class="panel-body">
				@include('common.errors')
			</div>

			<script type="text/javascript">
				function ConfirmDelete() {
					var x = confirm('Are You sure to Delete');
					if(x) 
						return true;
					else 
						return false;
				}
			</script>
			@if(count($doctors)>0)
				<div class="panel panel-default">

					<div class="panel-heading">
						Doctor List
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Doctor Id</th>
								<th>Mobile Number</th>
								<th>Speciality</th>
								<th>Designation</th>
								<th>Category</th>
								<th>Available Time</th>
							</thead>
							<tbody>
								@foreach($doctors as $doctor)
									<tr>
										<td class="table-text"><div><a href={{ $doctor->id}}{{'/edit'}}> {{ $doctor->doctor_id }}</a></div></td>
										<td class="table-text"><div>{{ $doctor->phone_number }}</div></td>
										<!-- <td class="table-text"><div>{{ $doctor->education }}</div></td> -->
										<td class="table-text"><div>{{ $doctor->speciality }}</div></td>
										<!-- <td class="table-text"><div>{{ $doctor->experience }}</div></td> -->
										<td class="table-text"><div>{{ $doctor->designation }}</div></td>
										<td class="table-text"><div>{{ $doctor->category_id }}</div></td>
										<td class="table-text"><div>{{ $doctor->time_range }}</div></td>
										<td>
											{{ Form::open(['url'=>'profile/'.$doctor->id, 'files'=>'true', 'onsubmit'=>'return ConfirmDelete()']) }}
												{{csrf_field() }}
												{{ method_field('DELETE')}}
											{{ Form::submit('DELETE', array('class'=>'btn btn-danger')) }}
											{{ Form::close() }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection