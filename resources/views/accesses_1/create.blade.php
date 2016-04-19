@extends('layouts.app')

@section('content')
<div class="register-box">
      <div class="register-logo">
        <a href="access/add"><b>Access</b></a>
      </div>

      <div class="register-box-body">
      
        <p class="login-box-msg">Register a new membership</p>
        @include('common.errors')
        {!! Form::open(['url' => 'access/add', 'method' => 'post', 'role' => 'form']) !!}
		{{ csrf_field() }}
        <!-- <form action="access/add" method="post"> -->
          <div class="form-group has-feedback">
            <!-- <input type="text" class="form-control" placeholder="Full name"> -->
            {{ Form::text('name', '', array('class'=>'form-control', 'placeholder'=>'Name') ) }}
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
          {{ Form::text('action_name', '', array('class'=>'form-control', 'placeholder'=>'Action Name')) }}
           <!--  <input type="email" class="form-control" placeholder="Email"> -->
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          <!--   {{Form::label('name', 'Name')}}
                {{ Form::text('name', '', array('placeholder'=>'Enter Name')) }} -->
          </div>
          <div class="form-group has-feedback">
          {{ Form::text('controller_name', '', array('class'=>'form-control', 'placeholder'=>'Controller Name')) }}
            <!-- <input type="password" class="form-control" placeholder="Password"> -->
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
        
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
            <div class="col-xs-4">
         
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->

          </div>
              
        </form>

      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
@endsection

