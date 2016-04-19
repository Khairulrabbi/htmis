@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					New Category
				</div>

				<div class="panel-body">
					@include('common.errors')

					{{ Form::open(['url'=>'category/add', 'method'=>'post', 'role'=>'form']) }}
						{{ csrf_field() }}

						<div class="form-group">
							{{ Form::label('category_name', 'Name') }}
							{{ Form::text('category_name','', array('class'=>'form-control', 'placeholder'=>'Enter Category Name', 'required'=>'required')) }}
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-6">
								{{ Form::submit('Add New', array('class'=>'fa fa-btn fa-plus')) }}
							</div>
						</div>
					{{ Form::close() }}
				</div>
				
			</div>
			
		</div>
	</div>

@endsection