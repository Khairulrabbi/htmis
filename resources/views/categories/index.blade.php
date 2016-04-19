@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="col-sm-offset-2 col-sm-8">
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

			@if(count($categories)>0)
				<div class="panel panel-default">
					<div class="panel-heading">
						Category List
					</div>

					<div class="panel-body">
						<table class="table table-striped task-table">
							<thead>
								<th>Id</th>
								<th>Category Name</th>
							</thead>

							<tbody>
								@foreach($categories as $category)
									<tr>
										<td class="table-text"><a href={{$category->id }}{{'/edit'}}><div>{{ $category->id }}</div></a></td>
										<td class="table-text"><div>{{ $category->category_name }}</div></td>
										<td>
											{{ Form::open(['url'=>'category/'.$category->id, 'files'=>'true', 'onsubmit'=>'return ConfirmDelete()']) }}
											{{ csrf_field() }}
											{{ method_field('DELETE') }}
											{{ Form::submit('DELETE', array('class'=>'btn btn-danger')) }}
											{{ Form::close() }}
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ $categories->render() }}
					</div>
				</div>
			@endif
		</div>
		
	</div>
@endsection