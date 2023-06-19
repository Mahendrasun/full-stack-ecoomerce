@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
            <div class="col-12">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Edit Brand</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form action="{{route('brand.update',$brands->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf

<input type="hidden" name="id" value="{{$brands->id}}">
<input type="hidden" name="old_image"  value="{{$brands->brand_image}}">

                <div class="form-group">
                       <h5>Brand Name English<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="brand_name_en"  class="form-control" value="{{$brands->brand_name_en}}" > <div class="help-block">
@error('brand_name_en')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div>
                        </div>
                   </div>
                     <div class="form-group">
                       <h5>Brand Name Hindi<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input  type="text" name="brand_name_hin" class="form-control" value="{{$brands->brand_name_hin}}" > <div class="help-block">
                           @error('brand_name_hin')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div></div>
                   </div>
                    <!-- <div class="form-group">
                       <h5>Brand Image<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input  type="file" name="brand_image" class="form-control"  > <div class="help-block">
                           @error('brand_image')
            <span class="text-danger">{{$message}}</span>
                            @enderror

                           </div></div>
                   </div> -->


<div class="row">
<div class="col-md-6">
<div class="form-group">
<h5>Brand Image</h5>
<div class="controls">
<input type="file" name="brand_image" class="form-control" id="image"> </div>
</div>
</div>
<div class="col-md-6">

<img id="showImage" src="{{(!empty($brands->brand_image))?url($brands->brand_image):url('upload/no_image.jpg')}}" style="width:100px;height:100px;">



</div>
</div> 

          
                  
                 
                
               <div class="text-xs-right">
                   <button type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">Update</button>
               </div>
           </form>

       
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

 <!-- /.box -->          
</div>









		  </div>
		  <!-- /.row -->
		</section>
		<!-- /.content -->
	  
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
