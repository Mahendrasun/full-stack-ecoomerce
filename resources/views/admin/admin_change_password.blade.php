@extends('admin.admin_master')
       @section('admin')
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> 
       <div class="container-full">

            <!-- Main content -->
            <section class="content">

<!-- Basic Forms -->
 <div class="box">
   <div class="box-header with-border">
     <h4 class="box-title">Admin Change Password</h4>
    
   </div>
   <!-- /.box-header -->
   <div class="box-body">
     <div class="row">
       <div class="col">
           <form action="{{route('admin.update.password')}}" method="POST" >
            @csrf
             <div class="row">
               <div class="col-12">						    
                 
<div class="row">
    <div class="col-md-6">
    <div class="form-group">
                       <h5>Current password<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input type="password" name="oldpassword" id="current_password" class="form-control" required="" > <div class="help-block"></div></div>
                   </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6">
    <div class="form-group">
                       <h5>New password<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input id="password" type="password" name="password" class="form-control" required="" > <div class="help-block"></div></div>
                   </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-6">
    <div class="form-group">
                       <h5>Confirm password<span class="text-danger">*</span></h5>
                       <div class="controls">
                           <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" required="" > <div class="help-block"></div></div>
                   </div>
    </div>
</div>          
                  
                 
                
               <div class="text-xs-right">
                   <button type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">Submit</button>
               </div>
           </form>


       </div>
       <!-- /.col -->
     </div>
     <!-- /.row -->
   </div>
   <!-- /.box-body -->
 </div>
 <!-- /.box -->

</section>
            <!-- /.content -->
            </div>



            @endsection