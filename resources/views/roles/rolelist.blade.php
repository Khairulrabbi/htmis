<table border="1">
	@foreach($roles as $role)

		<th>{{ $role->name }}</th>
	@endforeach
	
		
		@foreach($x as $y)
				<tr><td>{{$y->role_id}}</td></tr>
		@endforeach
			@foreach($x as $y)
				<tr><td>{{$y->role_id}}</td></tr>
		@endforeach
		
</table>