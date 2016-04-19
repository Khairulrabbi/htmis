@extends('layouts.app')

@section('content')
<div class="register-box">
      <div class="register-logo">
        <a href=""><b>Update Access</b></a>
      </div>

      <div class="register-box-body">
      
        <!-- <p class="login-box-msg">Register a new membership</p> -->
        @include('common.errors')
        {!! Form::open(['url' =>'access/update/'.$access->id, 'method' => 'post', 'role' => 'form']) !!}
        {{ csrf_field() }}
   
          <div class="form-group has-feedback">
            {!! Form::label('name', 'Name:') !!}
            {{ Form::text('name', $access->name, array('class'=>'form-control', 'placeholder'=>'Name') ) }}
          <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
          </div>
          <div class="form-group has-feedback">
          {!! Form::label('action_name', 'Action Name:') !!}
          {{ Form::text('action_name', $access->action_name, array('class'=>'form-control', 'placeholder'=>'Action Name')) }}
         
            <!-- <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
          
          </div>
          <div class="form-group has-feedback">
          {!! Form::label('controller_name', 'Controller Name:') !!}
          {{ Form::text('controller_name', $access->controller_name, array('class'=>'form-control', 'placeholder'=>'Controller Name')) }}
         
          <!--   <span class="glyphicon glyphicon-user form-control-feedback"></span> -->
          </div>
        
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
           
            <div class="col-xs-4">
                <a href="../list" style="position: absolute;font-size: large;left: 30%">Cancel</a>
            </div>

            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat" style="right: 80%">Edit
                    
                </button>
            </div>
          </div>
              
        </form>

      </div><!-- /.form-box -->
    </div><!-- /.register-box -->
@endsection

