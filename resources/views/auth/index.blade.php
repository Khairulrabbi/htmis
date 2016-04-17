@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">User List</div>
                <div class="panel-body">
                @if(count($users)>0)
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>                            
                            <th>User Role</th>     
                        </thead>

                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td class="table-text"><div><a href={{ $user->id}}{{'/edit'}}> {{ $user->name }}</a></div></td>
                                <td class="table-text"><div>{{$user->email}}</div></td>
                                <td class="table-text"><div>{{$user->address}}</div></td>
                                <td class="table-text"><div>{{$user->role_id}}</div></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
