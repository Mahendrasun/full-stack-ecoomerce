@extends('admin.admin_master')
@section('admin')
       

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">


            <div class="col-12">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form action="{{route('category.update')}}" method="POST" >
            @csrf
<input type="hidden" name="id" value="{{$category->id}}">

                <div class="form-group">
                       <h5>Category Name English<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="category_name_en"  class="form-control" value="{{$category->category_name_en}}" > <div class="help-block">
@error('category_name_en')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div>
                        </div>
                   </div>
                     <div class="form-group">
                       <h5>Category Name Hindi<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input  type="text" name="category_name_hin" class="form-control" value="{{$category->category_name_hin}}"> <div class="help-block">
                           @error('category_name_hin')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div></div>
                   </div>
                    <div class="form-group">
                       <h5>Category Icon<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input  type="text" name="category_icon" class="form-control" value="{{$category->category_icon}}" > <div class="help-block">
                           @error('category_icon')
<span class="text-danger">{{$message}}</span>
@enderror

                           </div></div>
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
 

@endsection
