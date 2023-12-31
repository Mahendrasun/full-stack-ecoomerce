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
				  <h3 class="box-title">Brand List</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
					  <table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>Brand Name En</th>
								<th>Brand Name Hin</th>
								<th>Image</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                            @foreach($brands as $brand)
							<tr>
								<td>{{$brand->brand_name_en}}</td>
								<td>{{$brand->brand_name_hin}}</td>
								<td><img src="{{asset($brand->brand_image)}}" style="width:70px;height:40px;"></td>
								<td>
                                    <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-info"><i class="fa fa-pencil" title="Edit Data"></i></a>
                                    <a href="{{route('brand.delete',$brand->id)}}" id="delete" class="btn btn-danger"><i class="fa fa-trash" title="Delete Data"></i></a>
                                    
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
     <h3 class="box-title">Add Brand</h3>
   </div>
   <!-- /.box-header -->
   <div class="box-body">
       <div class="table-responsive">
       <form action="{{route('brand.store')}}" method="POST" enctype="multipart/form-data" >
            @csrf
                <div class="form-group">
                       <h5>Brand Name English<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="text" name="brand_name_en"  class="form-control" > <div class="help-block">
@error('brand_name_en')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div>
                        </div>
                   </div>
                     <div class="form-group">
                       <h5>Brand Name Hindi<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input  type="text" name="brand_name_hin" class="form-control" > <div class="help-block">
                           @error('brand_name_hin')
<span class="text-danger">{{$message}}</span>
@enderror
                           </div></div>
                   </div>
                    <div class="form-group">
                       <h5>Brand Image<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input  type="file" name="brand_image" class="form-control"  > <div class="help-block">
                           @error('brand_image')
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
