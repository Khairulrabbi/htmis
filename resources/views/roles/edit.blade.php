@extends('layouts.admin')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h2>Update Role</h2>
					
				</div>
				
				<div class="panel-body">
					@include('common.errors')

					{{ Form::open(['url'=>'role/update/'.$role->id, 'method' => 'post', 'role' =>'form']) }}
					{{ csrf_field() }}

					<div class="form-group has-feedback">
						{{ Form::label('name', 'Name') }}
						{{ Form::text('name', $role->name, ['class'=>'form-control'])}}	
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>

					<div class="form-group has-feedback">	
						<!-- {{ Form::checkbox('status', 'status') }}&nbsp;&nbsp;&nbsp; -->
						{{ Form::checkbox('status','status', ['class'=>'form-control'])}}
						{{ Form::label('status', 'Status') }}
					</div>

					<h3>Access Permissions</h3>
					<!-- <div class="form-group has-feedback"> -->	
					@foreach($accesses as $access)
						{{ Form::checkbox('access[]',$access->id) }}
						{{ $access->name }}	
					@endforeach

					<br><br>

					<div class="row">
            			<div class="col-xs-8">

            			</div><!-- /.col -->
           
            			<div class="col-xs-4">
                				<a href="../list" style="position: absolute;font-size: large;left: 30%">Cancel</a>
            			</div>

            			<div class="col-xs-4">
                				<button style="height:35px;width:100px" type="submit" class="btn btn-primary btn-block btn-flat" style="right: 60%">Edit
                    
               				   </button>
            			</div>
         			</div>
					
					{{ Form::close() }}

				</div>
			</div>
			
		</div>
		
	</div>
@endsection