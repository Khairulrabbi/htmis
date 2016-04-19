@extends('layouts.app')

@section('content')
<div class="register-box">
      <div class="register-logo">
        <a href="add"><b>Access</b></a>
      </div>

      <div class="register-box-body">
      
        <p class="login-box-msg">Register a new membership</p>
        @include('common.errors')
        {!! Form::open(['url' => 'access/add', 'method' => 'post', 'role' => 'form']) !!}
	     	{{ csrf_field() }}
        
          <div class="form-group has-feedback">
              
            {{ Form::text('name', '', array('class'=>'form-control', 'placeholder'=>'Name') ) }}
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
          {{ Form::text('action_name', '', array('class'=>'form-control', 'placeholder'=>'Action Name')) }}
         
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          
          </div>
          <div class="form-group has-feedback">
          {{ Form::text('controller_name', '', array('class'=>'form-control', 'placeholder'=>'Controller Name')) }}
            <!-- <input type="password" class="form-control" placeholder="Password"> -->
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
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

