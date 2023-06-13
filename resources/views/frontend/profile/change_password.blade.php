@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
<div class="body-content">
  <div class="container">
<div class="row">
<div class="col-md-2">
<br>
<img class="card-img-top" style="border-radius:50%" src="{{(!empty($user->profile_photo_path))?url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.jpg')}}" height="100%" width="100%"><br><br>

<ul class="list-group list-group-flush">
<a href="{{route('dashboard')}}" class="btn btn-primary btn-sm btn-block">Home</a>
<a href="{{route('user.profile')}}" class="btn btn-primary btn-sm btn-block">Profile Update</a>
<a href="{{route('change.password')}}" class="btn btn-primary btn-sm btn-block">Change Password</a>
<a href="{{route('user.logout')}}" class="btn btn-danger btn-sm btn-block">Logout</a>
</ul>


</div>

<div class="col-md-2">

</div>

<div class="col-md-6">
<div class="card">
  <h3 class="text-center"><span class="text-danger"> Change Password</h3>

<div class="caed-body">

<form method="POST" action="{{route('user.password.update')}}" >
@csrf

            <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Current Password</label>
		    <input id="current_password" type="password" name="oldpassword"  class="form-control unicase-form-control text-input"  >
		</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">New Password</label>
		    <input id="password" type="password"  name="password" class="form-control unicase-form-control text-input"  >
		</div>

        <div class="form-group">
		    <label class="info-title" for="exampleInputEmail1">Confirm Password</label>
		    <input id="password_confirmation" type="password" name="password_confirmation"  class="form-control unicase-form-control text-input"  >
		</div>


        <div class="form-group">
		   
		   <button class="btn btn-danger" type ="submit">Update Profile</button>
		</div>
</form>


</div>


</div>


</div>

</div>

  </div>
</div>
<script type="text/javascript">

$(document).ready(function(){
$('#image').change(function(e){
var reader = new FileReader();
reader.onload = function(e){
     let output = document.getElementById('showImage');
      output.src = reader.result;
}  
if(event.target.files[0]){
      reader.readAsDataURL(event.target.files[0]);
    }

});


});

</script>
@endsection