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
     <h3 class="box-title">Edit Sub Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form action="{{route('sub.subcategory.update')}}" method="POST" >
            @csrf
            <input type="hidden" name="id" value="{{$subsubCategories->id}}">
            <div class="form-group">
<h5>Category Select<span class="text-danger">*</span></h5>
<div class="controls">
    <select  name="category_id" class="form-control" >
        <option value="" selected="" disabled>Select Category</option>
        @foreach($categories as $category)

        <option value="{{$category->id}}" {{$category->id == $subsubCategories->category_id ?'selected':'' }}>{{$category->category_name_en}}</option>
        @endforeach
    </select>
    @error('category_id')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
</div>
<div class="form-group">
<h5>Category Select<span class="text-danger">*</span></h5>
<div class="controls">
    <select  name="subcategory_id" class="form-control" >
        <option value="" selected="" disabled>Select Category</option>
        @foreach($subcategories as $subategory)

        <option value="{{$subategory->id}}" {{$subategory->id == $subsubCategories->subcategory_id ?'selected':'' }} >{{$subategory->subcategory_name_en}}</option>
        @endforeach
    </select>
    @error('subcategory_id')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
</div>

                <div class="form-group">
                       <h5>Sub Category Name English<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="subsubcategory_name_en"  class="form-control" value="{{$subsubCategories->subsubcategory_name_en}}"> <div class="help-block">
@error('subsubcategory_name_en')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div>
                        </div>
                   </div>
                     <div class="form-group">
                       <h5>Sub Category Name Hindi<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input  type="text" name="subsubcategory_name_hin" class="form-control" value="{{$subsubCategories->subsubcategory_name_hin	}}" > <div class="help-block">
                           @error('subsubcategory_name_hin')
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