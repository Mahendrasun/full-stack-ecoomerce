@extends('admin.admin_master')
@section('admin')
       

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
								<th>Sub Category Name En</th>
								<th>Sub Category Name Hin</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($subCategories as $subcategory)
							<tr>
                            <td>{{$subcategory['category']['category_name_en']}} </td>
								<td>{{$subcategory->subcategory_name_en}}</td>
								<td>{{$subcategory->subcategory_name_hin}}</td>
								
								<td>
                                    <a href="{{route('sub.category.edit',$subcategory->id)}}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                    <a href="{{route('sub.category.delete',$subcategory->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete Data"></i></a>
                                    
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
     <h3 class="box-title">Add Sub Category</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form action="{{route('sub.category.store')}}" method="POST" >
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
                       <h5>Sub Category Name English<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="subcategory_name_en"  class="form-control" > <div class="help-block">
@error('subcategory_name_en')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div>
                        </div>
                   </div>
                     <div class="form-group">
                       <h5>Sub Category Name Hindi<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input  type="text" name="subcategory_name_hin" class="form-control" > <div class="help-block">
                           @error('subcategory_name_hin')
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
 

@endsection
