@extends('layouts.app')

@section('content')
    <div class="container">

    <a href="http://localhost/htms/access/add" style="position: absolute; left: 10%; font-size: large;">Add New</a>

    <!-- Downloading csv data link -->
    <a href="http://localhost/htms/csv-data" style="position: absolute; font-size: large; float: left;">Download Data</a>
    <a href="http://localhost/htms/role/list">Role List</a>
        <div class="col-sm-offset-2 col-sm-8">
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                </div>

                <!-- Session Work -->
            @if (Session::has('message'))
                 <div class="alert alert-info">
                    {{ Session::get('message') }}
                 </div>
            @endif

            <script type="text/javascript">
                function ConfirmDelete() {
                    var x = confirm('Are You sure to Delete');
                    if (x)
                        return true;
                    else 
                        return false;
                }
            </script>

            @if(count($accesses)>0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                       Access List
                    </div>

                    <div class="panel-body">
                    	<table class="table table-striped task-table">
                    		<thead>
                                <th>Action Name</th>
                                <th>Name</th>
                                <th>Control Name</th>                   			
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
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection