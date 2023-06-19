@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

	  <div class="container-full">
		<!-- Content Header (Page header) -->
		

		<!-- Main content -->
		<section class="content">
		  <div class="row">
			  
			
			
			

			<div class="col-8">

			 <div class="box">
				<div class="box-header with-border">
				  <h3 class="box-title">Sub Category List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
                                <th>Category </th>
								<th>Sub Category Name </th>
                                <th>Sub Sub Category Name En</th>
								<th>Sub Sub Category Name Hin</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($subsubCategories as $subsubcategory)
							<tr>
                            <td>{{$subsubcategory['category']['category_name_en']}} </td>
                            <td>{{$subsubcategory['subcategory']['subcategory_name_en']}} </td>
								<td>{{$subsubcategory->subsubcategory_name_en}}</td>
								<td>{{$subsubcategory->subsubcategory_name_hin}}</td>
								
								<td>
                                    <a href="{{route('sub.subcategory.edit',$subsubcategory->id)}}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                    <a href="{{route('sub.subcategory.delete',$subsubcategory->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete Data"></i></a>
                                    
                                </td>
								
							</tr>
							@endforeach
						</tbody>
						
					  </table>
					</div>
				</div>
				<!-- /.box-body -->
			  </div>
			  <!-- /.box -->

			  <!-- /.box -->          
			</div>
			<!-- /.col -->


            <div class="col-4">

<div class="box">
   <div class="box-header with-border">
     <h3 class="box-title">Add Sub Sub Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form action="{{route('sub.subcategory.store')}}" method="POST" >
            @csrf

<div class="form-group">
<h5>Category Select<span class="text-danger">*</span></h5>
<div class="controls">
    <select  name="category_id" class="form-control" >
        <option value="" selected="" disabled>Select Category</option>
        @foreach($categories as $category)

        <option value="{{$category->id}}">{{$category->category_name_en}}</option>
        @endforeach
    </select>
    @error('category_id')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
</div>

<div class="form-group">
<h5>Sub Category Select<span class="text-danger">*</span></h5>
<div class="controls">
    <select  name="subcategory_id" class="form-control" >
        <option value="" selected="" disabled>Select Sub Category</option>
      
    </select>
    @error('subcategory_id')
<span class="text-danger">{{$message}}</span>
@enderror
</div>
</div>

                <div class="form-group">
                       <h5>Sub Sub Category Name English<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="subsubcategory_name_en"  class="form-control" > <div class="help-block">
@error('subsubcategory_name_en')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div>
                        </div>
                   </div>
                     <div class="form-group">
                       <h5>Sub Sub Category Name Hindi<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input  type="text" name="subsubcategory_name_hin" class="form-control" > <div class="help-block">
                           @error('subsubcategory_name_hin')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div></div>
                   </div>
               <div class="text-xs-right">
                   <button type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">Add New</button>
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
    $('select[name="category_id"]').on('change',function(){
        var category_id = $(this).val();
        if(category_id){
            $.ajax({
                url:"{{url('/category/subcategory/ajax')}}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    var d = $('select[name="subcategory_id"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="subcategory_id"]').append('<option value="'+value.id+'">' + value.subcategory_name_en +'</option>');
                    });
                },
            });
        }else{
            alert("No Category Selected")
        }
    });
});

 </script>

@endsection
