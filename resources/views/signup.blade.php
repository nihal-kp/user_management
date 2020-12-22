@extends("layout.master2")
@section("content")
<div class="container col-9 col-md-7 col-lg-7 center mt-4">
    <form class="form-horizontal" action="/signup" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" class="form-control" placeholder="Enter full name" name="name" value="{{ old('name') }}" required>
            @error("name")
            <p style="color:red">{{$errors->first("name")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{ old('email') }}" required>
            @error("email")
            <p style="color:red">{{$errors->first("email")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{ old('password') }}" required>
        </div>
        <div class="form-group">
            <label for="cpwd">Confirm password:</label>
            <input type="password" class="form-control" placeholder="Enter password again" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
            @error("password")
            <p style="color:red">{{$errors->first("password")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" class="form-control" placeholder="Enter phone number" name="phone_number" value="{{ old('phone_number') }}" required>
            @error("phone_number")
            <p style="color:red">{{$errors->first("phone_number")}}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea class="form-control" placeholder="Enter address" name="address" rows="4" required>{{ old('address') }}</textarea>
        </div>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image" required>
            <label class="custom-file-label" for="customFile">Upload Profile Picture</label>
            @error("image")
            <p style="color:red">{{$errors->first("image")}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-success my-4 mx-3">Signup</button>
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