<div class="container">
	 <a href="add" style="position: absolute; left: 80%; font-size: large;">Add New</a>
		<div class="col-sm-offset-2 col-sm-8" >
			<div class="panel-body">
				@include('common.errors')
			</div>

			@if(Session::has('message'))
				<div class="alert alert-info">
					{{ Session::get('message') }}
				</div>
			@endif

			<script type="text/javascript">
				
				function ConfirmDelete() {
					var x = confirm('Are you sure to delete');
					if(x)
						return true;
					else
						return false;
				}	
				
			</script>

			@if(count($roles)>0) 
				<div class="panel panel-default">
					<div class="panel-heading">
						Role List
					</div>
					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Name</th>
								<th>Status</th>
							</thead>

							<tbody>
								@foreach($roles as $role)
									<tr>
										<td class="table-text"><div><a href= {{ $role->id}}{{'/edit'}} > {{ $role->name }}</a></div></td>
										<td class="table-text"><div>{{ $role->status }}</div></td>

                                        <td>       
                                            {!! Form::open(['url' =>'role/'.$role->id, 'files'=>true , 'onsubmit' => 'return ConfirmDelete()']) !!}
                                                    {{ csrf_field() }}
                                                     {{ method_field('DELETE')}}
                                            {!! Form::submit('DELETE', array('class' => 'btn btn-danger')) !!}
                                            
                                            {!! Form::close() !!}                          
                                        </td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{!! $roles->render() !!}
					</div>
				</div>
			@endif
		</div>


	</div>	
	<a href="../access/list" style="position: absolute;float: right;">Access List</a>