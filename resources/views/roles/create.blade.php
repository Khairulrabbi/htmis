@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					Create Role
				</div>
				
				<div class="panel-body">
					@include('common.errors')

					{{ Form::open(['url' => 'role/add', 'method' => 'post', 'role' =>'form']) }}

						{{ csrf_field() }}
					<div class="form-group">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', '', array('class' => 'form-control', 'placeholder'=>'Enter Role Name'))}}	
						
						{{ Form::checkbox('status', 'status') }}&nbsp;&nbsp;&nbsp;
						{{ Form::label('status', 'Status') }}
					</div>
					<h2>Access Permissions</h2>
						
					@foreach($accesses as $access)
						{{ Form::checkbox('access[]',$access->id) }}
						{{ $access->name }}	
					@endforeach

					<br>
					<div class="col-sm-offset-3 col-sm-6">

						{{ Form::submit('Submit', array('class' =>'fa fa-btn fa-plus')) }}

							<a href="list" style="position: absolute;font-size: large; left: 80%;">Cancel</a>
						
					</div>
					
					{{ Form::close() }}

				</div>
			</div>
			
		</div>
		
	</div>
@endsection