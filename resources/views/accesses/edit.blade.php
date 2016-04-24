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
                <li class="active">Update Access</li>
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
                    {!! Form::open(['url' =>'access/update/'.$access->id, 'method' => 'post', 'role' => 'form']) !!}
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('name', 'Name') }}
                                {{ Form::text('name', $access->name, array('class'=>'form-control') ) }}
                            </div><!-- /.form-group -->
                            <div class="form-group">
                                {{ Form::label('action_name', 'Action Name')}}
                                {{ Form::text('action_name', $access->action_name, array('class'=>'form-control')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('controller_name', 'Controller Name')}}
                                {{ Form::text('controller_name', $access->controller_name, array('class'=>'form-control')) }}
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-8">

                                    </div><!-- /.col -->
           
                                    <div class="col-xs-4">
                                        <a href="../list" style="position: absolute;font-size: large;left: 30%">Cancel</a>
                                    </div>

                                    <div class="col-xs-4">
                                        <button style="height:35px;width:100px" type="submit" class="btn btn-primary btn-block btn-flat" style="right: 60%">Edit</button>
                                    </div>
                                </div>

                            </div><!-- /.form-group -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                    {{ Form::close() }}
                </div><!-- /.box-body -->

            </div><!-- /.box -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection