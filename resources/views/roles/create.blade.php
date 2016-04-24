@extends('layouts.admin')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
              <h1>
                Advanced Form Elements
                <small>Preview</small>
              </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Create Role</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- SELECT2 EXAMPLE -->
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Role</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div><!-- /.box-header -->

                <div class="box-body">
                @include('common.errors')
                    {{ Form::open(['url' => 'role/add', 'method' => 'post', 'role' =>'form']) }}

                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', '', array('class' => 'form-control', 'placeholder'=>'Enter Role Name'))}} 
                            </div><!-- /.form-group -->

                            <div class="form-group has-feedback"> 
                                {{ Form::checkbox('status', 'status') }}&nbsp;&nbsp;&nbsp;
                                {{ Form::label('status', 'Status') }}
                            </div>

                            <div class="form-group">
                                <!--  <label>Access Permissions</label> -->
                                <h3>Access Permissions</h3>
            
                                @foreach($accesses as $access)
                                {{ Form::checkbox('access[]',$access->id) }}
                                {{ $access->name }} 
                                @endforeach

                                <br><br>

                                <div class="row">
                                    <div class="col-xs-8">

                                    </div><!-- /.col -->
           
                                    <div class="col-xs-4">
                                        <a href="../list" style="position: absolute;font-size: large;left: 30%">Cancel</a>
                                    </div>

                                    <div class="col-xs-4">
                                        <button style="height:35px;width:100px" type="submit" class="btn btn-primary btn-block btn-flat" style="right: 60%">Add New</button>
                                    </div>
                                </div>

                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.box-body -->

            </div><!-- /.box -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection