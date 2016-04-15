@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    Update Access
                </div>

                <div class="panel-body">
                	@include('common.errors')
                </div>

                <div class="panel-body">
                	{!! Form::open(['url'=>'access/update/'.$access->id, 'method'=>'post', 'role'=>'form']) !!}
                		{{ csrf_field() }}
               
                    <div class="form-group">
                         {!! Form::label('name', 'Name:', ['class' => 'col-sm-3 control-label']) !!}
                         {!! Form::text('name', $access->name, ['class' => 'form-control']) !!}
                        
                    </div>
                	<div class="form-group">
    					 {!! Form::label('action_name', 'Action Name:', ['class' => 'col-sm-3 control-label']) !!}
    					 {!! Form::text('action_name', $access->action_name, ['class' => 'form-control']) !!}
    					
    				</div>
    				<div class="form-group">
    					{!! Form::label('controller_name', 'Controller Name', ['class' => 'col-sm-3 controller-label']) !!}
    					{!! Form::text('controller_name', $access->controller_name, ['class' => 'form-control']) !!}

                    </div>

                    {!! Form::submit('Edit') !!}
                    {!! Form::close() !!}

                    <a href="list" style="position: absolute;font-size: large;left: 80%">Cancel</a>
    			</div>	

            </div>
        </div>
    </div>

@endsection