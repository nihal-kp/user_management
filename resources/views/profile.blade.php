@extends("layout.master2")
@section("content")
<div class="container col-9">
    <h3 class="py-4">Welcome {{$user->name}}</h3>
    <table class="table">
    <tr>
        <th>User ID:</th> <td>{{$user->id}}</td>
    </tr>
    <tr>
        <th>Name:</th> <td>{{$user->name}}</td>
    </tr>
    <tr>
        <th>Profile Picture:</th>   <td><img width="30%" class="img-circle" src="{{ asset('/images/'.$user->image) }}" alt="user_image"></td>
    </tr>
    <tr>
        <th>Email:</th> <td>{{$user->email}}</td>
    </tr>
    <tr>
        <th>Phone number:</th> <td>{{$user->phone}}</td>
    </tr>
    <tr>
        <th>Address:</th> <td>{{$user->address}}</td>
    </tr>
    </table>
    <a class="btn btn-info mx-3" href="/edit">Edit</a>
    <a class="btn btn-danger mx-3" href="/logout">Logout</a>
</div>
@endsection