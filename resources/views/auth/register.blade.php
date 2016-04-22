@extends('layouts.app')
 
@section('content')
<div class="register-box">
	<div class="register-logo">
		
	</div>

	<div class="register-box-body">
		<p class="login-box-msg">Register a new membership</p>

        @include('common.errors')

        {{ Form::open(['url'=>'register', 'method' =>'post', 'role'=>'form']) }}
        {{ csrf_field() }}

        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Enter Your Name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>         
        </div>

        <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Enter Your Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Enter Your Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>            
        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>

        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Enter your Address" >
            <span class="glyphicon glyphicon-user form-control-feedback"></span> 
        </div>
        <div class="form-group has-feedback">
            <select class="form-control">
                <option value="">
                    Choose Role Type
                </option>
                @foreach($roles as $role) 
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach        
            </select>
        </div>

          <div class="row">
             <div class="col-xs-4">
                 <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
             </div><!-- /.col -->
          </div>
	</div>
</div>

  
@endsection
