
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update User </div>
                <div class="panel-body">            
                        {{ Form::open(['url'=>'user/addorupdate', 'method'=>'post', 'role'=>'form', 'class'=>'form-horizontal']) }}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            {{ Form::label('name', 'Name', array('class'=>'col-md-4 control-label'))}}

                            <div class="col-md-6">
                                {{ Form::text('name', $user->name, array('class'=>'form-control'))}}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">                         
                            {{ Form::label('email', 'E-Mail Address', array('class'=>'col-md-4 control-label')) }}
                            <div class="col-md-6">
                                {{ Form::text('email', $user->email, array('class'=>'form-control') )}}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            {{ Form::label('password', 'Password', array('class'=>'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::text('password', $user->password, array('class'=>'form-control')) }}

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address') ? 'has-error' : ''}}">
                            {{ Form::label('address', 'Address', array('class'=>'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::text('address', $user->address, array('class'=>'form-control'))}}
                                @if($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('role') ? 'has-error' : ''}}">

                            {{ Form::label('role', 'Role', array('class'=>'col-md-4 control-label') )}}
                            <div class="col-md-6">
                               {{ Form::select('role', ['--Choose Role--','Admin', 'Manager','Doctor', 'HR', 'Operator'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
