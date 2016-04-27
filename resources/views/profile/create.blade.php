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
            <li class="active">Advanced Elements</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <!-- SELECT2 EXAMPLE -->
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Doctor Profile</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
               @include('common.errors')
               {{ Form::open(['url'=>'profile/add', 'method'=>'post', 'role'=>'form', 'class'=>'form-horizontal']) }}
               {!! csrf_field() !!}
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Mobile Number</label>
                    {{ Form::text('phone_number', '', array('class'=>'form-control'))}}
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>Education</label>
                    {{ Form::textarea('education', '', array('class'=>'form-control', 'rows'=>'3')) }}
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>Experience</label>
                    {{ Form::textarea('experience', '', array('class'=>'form-control','rows'=>'4'))}}
                  </div>
                  <div class="form-group">
                    <label>Time Slot</label>
                    <select class="form-control select2" name="time_range" multiple="multiple" data-placeholder="Select a time range" style="width: 100%;">
                      <option value="10-11">10-11</option>
                      <option value="11-12">11-12</option>
                      <option value="12-1.00">12-1.00</option>
                      <option value="5-7">5-7</option>
                      <option value="7.30-9.00">7.30-9.00</option>
                    </select>
                  </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Doctor Id</label>
                    {{ Form::text('doctor_id', '', array('class'=>'form-control') )}}
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>Speciality</label>
                    {{ Form::textarea('speciality', '', array('class'=>'form-control', 'rows'=>'3'))}}
                  </div><!-- /.form-group -->
                  <div class="form-group">
                    <label>Designation</label>
                    {{ Form::text('designation', '', array('class'=>'form-control'))}}
                  </div> <!-- /.form-group-->
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control select2" name="category_id" multiple="multiple"  data-placeholder="Select a Category" style="width: 100%;">
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">                                            
                            {{$category->category_name}}
                        </option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                      <div class="col-xs-4">
                      <br>
                       <button style="float: right; height:40px;width:100px" type="submit" class="btn btn-primary btn-block btn-flat" >Add New</button>
                      </div>
                  </div>
                </div><!-- /.col -->
              </div><!-- /.row -->
              {{ Form::close() }}
            </div><!-- /.box-body -->
          </div><!-- /.box -->

          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
@endsection