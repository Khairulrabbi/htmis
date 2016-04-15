@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Accesses
				</div>

				<div class="panel-body">
					@include('common.errors')

					<!-- Form data Validation Error -->
			<!-- 	    @if ( $errors->count() > 0 )
				      <p>The following errors have occurred:</p>

				      <ol>
				        @foreach( $errors->all() as $message )
				          <li>{{ $message }}</li>
				        @endforeach
				      </ol>
				    @endif -->

				    
					{!! Form::open(['url' => 'access/add', 'method' => 'post', 'role' => 'form']) !!}
					{{ csrf_field() }}

					<div class="form-group">
						{!! Form::label('name', 'Name') !!}
						{!! Form::text('name', '',  array('class'=>'form-control', 'required'=>'required')) !!}

						{!! Form::label('action_name', 'Action Name') !!}
						{!! Form::text('action_name', '',  array('class'=>'form-control', 'required'=>'required')) !!}

						{!! Form::label('controller_name', 'Controller Name') !!}
						{!! Form::text('controller_name', '',  array('class'=>'form-control', 'required' =>'required')) !!}

					</div>

					<div class="form-group">
						<div class="col-sm-offset-3 col-sm-6">
							{!! Form::submit('Add New', array('class' => 'fa fa-btn fa-plus')) !!}
							<a href="http://localhost/htms/access/list" style="position: absolute;font-size: large; left: 80%;">Cancel</a>

						</div>
					</div>

					{!! Form::close() !!}

				</div>
			</div>
			
		</div>
		
	</div>


@endsection