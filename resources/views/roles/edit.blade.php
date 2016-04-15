@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Update Role
				</div>

				<div class="panel-body">
					@include('common.errors')	
				</div>
				<div class="panel-body">
					
					{{ Form::open(['url'=>'role/update/'.$role->id,'method'=>'post', 'role'=>'form' ]) }}
						{{ csrf_field() }}

						<div class="form-group">
							{{ Form::label('name', 'Name', ['class'=>'col-sm-3 control-label']) }}
							{{ Form::text('name', $role->name, ['class'=>'form-control'])}}

						</div>

						<div class="form-group">
						<!-- 	{{ Form::checkbox('status','status', ['class'=>'form-control'])}}
							{{ Form::label('status','Status')}} -->
							{{ Form::checkbox('status') }}
						</div>

					<h2>Access Permission</h2>
					<div class="form-group">
						@foreach($accesses as $access)
						{{ Form::checkbox('access[]',$access->id) }}
						{{ $access->name }}	
						@endforeach
					</div>
						


					{{ Form::submit('Edit') }}
				
					<a href="http://localhost/htms/role/list" style="position: absolute;left: 80%; font-size: large;">Cancel</a>
					{{ Form::close() }}
				</div>
			</div>
			
		</div>
		
	</div>
@endsection