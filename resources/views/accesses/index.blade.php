@extends('layouts.admin')

@section('content')

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Data Tables
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              

              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Table With Access List</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Action Name</th>
                        <th>Name</th>
                        <th>Control Name</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($accesses as $access)
                        <tr>
                            <td class="table-text"><div><a href={{ $access->id}}{{'/edit'}}> {{ $access->action_name }}</a></div></td>
                            <td class="table-text"><div>{{ $access->name }}</div></td>
                            <td class="table-text"><div>{{ $access->controller_name }}</div></td>
                            <td>
                                {!! Form::open(['url'=>'access/'.$access->id, 'files'=>true, 'onsubmit'=>'return ConfirmDelete()']) !!}
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE')}}
                                {!! Form::submit('DELETE',array('class'=>'btn btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>

                        </tr>
                    @endforeach                            
                    </tbody>
                  </table>
                   {{ $accesses->render() }}
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     

      <!-- Control Sidebar -->
      
      <div class="control-sidebar-bg"></div>
          <script type="text/javascript">
              function ConfirmDelete() {
                  var x = confirm('Are you sure to delete');
                  if(x)
                      return true;
                  else 
                      return false;
              }
          </script>
    
@endsection
