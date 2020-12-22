@extends("layout.master2")
@section("content")
<div class="container col-9 col-md-7 col-lg-7 center">
    <h3 class="py-4">Welcome {{$user->name}}</h3>
    <form action="/update" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" placeholder="Enter full name" name="name" value="{{$user->name}}" required>
            @error("name")
            <p style="color:red">{{$errors->first("name")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{$user->email}}" required>
            @error("email")
            <p style="color:red">{{$errors->first("email")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{$user->password}}" required>
        </div>
        <div class="form-group">
            <label for="cpwd">Confirm password:</label>
            <input type="password" class="form-control" placeholder="Enter password again" name="password_confirmation" value="{{$user->password}}" required>
            @error("password")
            <p style="color:red">{{$errors->first("password")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" placeholder="Enter phone number" name="phone_number" value="{{$user->phone}}" required>
            @error("phone_number")
            <p style="color:red">{{$errors->first("phone_number")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" placeholder="Enter address" name="address" rows="4" required>{{$user->address}}</textarea>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image" required>
            <label class="custom-file-label" for="customFile">{{$user->image}}</label>
            @error("image")
            <p style="color:red">{{$errors->first("image")}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-success m-3">Update</button>
        <a class="btn btn-info m-3" href="/profile">Go back</a>
    </form>
</div>
<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>
@endsection