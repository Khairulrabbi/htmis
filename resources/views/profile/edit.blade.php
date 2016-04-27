@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Doctor Profile</div>
                <div class="panel-body">            
                        {{ Form::open(['url'=>'profile/add', 'method'=>'post', 'role'=>'form', 'class'=>'form-horizontal']) }}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                            {{ Form::label('phone_number', 'Mobile Number', array('class'=>'col-md-4 control-label'))}}

                            <div class="col-md-6">
                                {{ Form::text('phone_number', $doctor->phone_number, array('class'=>'form-control'))}}
                                @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('doctor_id') ? ' has-error' : '' }}">                         
                            {{ Form::label('doctor_id', 'Doctor Id', array('class'=>'col-md-4 control-label')) }}
                            <div class="col-md-6">
                                {{ Form::text('doctor_id', $doctor->doctor_id, array('class'=>'form-control') )}}
                                @if ($errors->has('doctor_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('doctor_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('education') ? ' has-error' : '' }}">
                            {{ Form::label('education', 'Education', array('class'=>'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::textarea('education', $doctor->education, array('class'=>'form-control')) }}

                                @if ($errors->has('education'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('speciality') ? 'has-error' : ''}}">
                            {{ Form::label('speciality', 'Speciality', array('class'=>'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::textarea('speciality', $doctor->speciality, array('class'=>'form-control'))}}
                                @if($errors->has('speciality'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('speciality')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>     

                        <div class="form-group{{ $errors->has('experience') ? 'has-error' : ''}}">
                            {{ Form::label('experience', 'Experience', array('class'=>'col-md-4 control-label')) }}

                            <div class="col-md-6">
                                {{ Form::textarea('experience', $doctor->experience, array('class'=>'form-control'))}}
                                @if($errors->has('experience'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('experience')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            {{ Form::label('designation', 'Designation', array('class'=>'col-md-4 control-label'))}}

                            <div class="col-md-6">
                                {{ Form::text('designation', $doctor->designation, array('class'=>'form-control'))}}
                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            {{ Form::label('category', 'Category', array('class'=>'col-md-4 control-label')) }}
                        </div>

                        <br><br><br>
                        <div class="from-group">
                            {{ Form::label('time_range', 'Time Range', array('class'=>'col-md-4 control-label') )}}
                           <div class="col-md-6">
                           {{ Form::select('time_range', ['Select time', '4.15-4.30', '4.35-4.50','5.30-5.45', '5.50-6.10'], array('class'=>'form-control')) }}
                            </div>
                        </div>
                        <br></br>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">
                                    Submit
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
