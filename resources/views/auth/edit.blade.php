@extends('layouts.app')

@section('content')

  <div class="register-box">
  <div class="register-logo">
    <a href="#"><b>Edit User</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Edit User Information</p>
       @include('common.errors')
    {{ Form::open(['url'=>'user/update/'.$user->id, 'method'=>'post', 'role'=>'form']) }}
     {!! csrf_field() !!}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" value="{{ $user->name }}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" value="{{ $user->email }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" value="{{ $user->password }}"">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" value="{{ $user->password }}">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
          <input type="text" class="form-control" value="{{ $user->address }}" >
          <span class="glyphicon glyphicon-user form-control-feedback"></span> 
      </div>
      <div class="form-group">
        <select class="form-control select2" style="width: 100%;">
            <option value="">
                Choose Role Type
            </option>
            @foreach($roles as $role) 
                <option value="{{$role->id}}">{{$role->name}}</option>
            @endforeach        
        </select>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
      <!--       <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label> -->
          </div>
        </div><!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Edit</button>
        </div><!-- /.col -->
      </div>
   {{ Form::close() }}
  </div><!-- /.form-box -->
  </div><!-- /.register-box -->

@endsection


