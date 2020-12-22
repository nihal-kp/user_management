@extends("layout.master1")
@section("content")
<div class="container col-12 col-md-10 col-lg-10 center">
    <h2 class="py-4">Welcome Admin</h2>
    <a class="btn btn-primary" href="/add">Add New User</a>
    <h4 class="my-4">Search results . . .</h3>
    <table class="table">
    <tr>
        <th>User ID</th> <th>User Name</th> <th>Actions</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{$user['id']}}</td>
        <td>{{$user['name']}}</td>
        <td>
            <a class="btn btn-info" href="/view/{{$user['id']}}">View</a>
            <a class="btn btn-danger" href="/delete/{{$user['id']}}" onclick="return confirm('Are you sure you want to remove this user?');">Delete</a>
        </td>
    </tr>
    @endforeach
    </table>
</div>
@endsection