@extends('layouts.app')

@section('content')
<div class="register-box">
	<div class="register-logo">
		
	</div>

	<div class="register-box-body">
        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register')}}">
            {!! csrf_field() !!}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="password">

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <label class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input type="password" class="form-control" name="password_confirmation">

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('address') ? 'has-error' : ''}}">
                <label class="col-md-4 control-label">Address</label>

                <div class="col-md-6">
                    <input type="text" class="form-control" name="address" value="{{ old('address') }}"></input>
                    
                    @if($errors->has('address'))
                        <span class="help-block">
                            <strong>{{ $errors->first('address')}}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('role_id') ? 'has-error' : ''}}">
                <label class="col-md-4 control-label">Role</label>

                <div class="col-md-6">
                    <select class="form-control" name="role_id">
                        <option value="">Choose Role Type</option>
                            @foreach($roles as $role) 
                                <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                    </select>
                    
                    @if($errors->has('role_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('role_id')}}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-btn fa-user"></i>Register
                    </button>
                </div>
            </div>
        </form>
  	
	</div>
</div>
@endsection
