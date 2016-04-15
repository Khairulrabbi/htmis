@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="col-sm-offset-2 col-sm-8">
                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')
                </div>

                <!-- Session Work -->


            <script type="text/javascript">
                function ConfirmDelete() {
                    var x = confirm('Are You sure to Delete');
                    if (x)
                        return true;
                    else 
                        return false;
                }
            </script>

            @if(count($users)>0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                       User List
                    </div>

                    <div class="panel-body">
                    	<table class="table table-striped task-table">
                    		<thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Address</th>                   			
                                <th>Role</th>                   			                                                  			
                    		</thead>
                    		<tbody>
                    			@foreach($users as $user)
                    				<tr>
                    					<td class="table-text"><div><a href={{ $user->id}}{{'/edit'}}> {{ $user->name }}</a></div></td>
                    					<td class="table-text"><div>{{ $user->email }}</div></td>
                    					<td class="table-text"><div>{{ $user->password }}</div></td>
                    					<td class="table-text"><div>{{ $user->address }}</div></td>
                    					<td class="table-text"><div>{{ $user->role}}</div></td>
                    					<td>
                    						{!! Form::open(['url'=>'user/'.$user->id, 'files'=>true, 'onsubmit'=>'return ConfirmDelete()']) !!}
                    							{{ csrf_field() }}
                    							{{ method_field('DELETE')}}
                    						{!! Form::submit('DELETE',array('class'=>'btn btn-danger')) !!}
                    						{!! Form::close() !!}
                    					</td>

                    				</tr>
                    			@endforeach
                    		</tbody>
                    		
                    	</table>
                    	{{ $users->render() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection