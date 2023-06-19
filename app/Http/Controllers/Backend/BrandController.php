<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    //


    public function BrandView(){

        $brands = Brand::latest()->get();
        
        return view('backend.brand.brand_view',compact('brands'));

    }
public function BrandStore(Request $request){

    $validation = $request->validate([
        'brand_name_en'=>'required',
        'brand_name_hin'=>'required',
        'brand_image'=>'required',
    ],['brand_name_en.required'=>'Input Brand Name in English',
    'brand_name_hin.required'=>'Input Brand Name in Hindi',]);

$image  = $request->file('brand_image');
$name_gen =  hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
$save_url = 'upload/brand/'.$name_gen;

Brand::insert([
    'brand_name_en'=>$request->brand_name_en,
    'brand_name_hin'=>$request->brand_name_hin,
    'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
    'brand_slug_hin'=>strtolower(str_replace(' ','-',$request->brand_name_hin)),
    'brand_image'=>$save_url,
]);


$notification = [
    'message'=>'Brand Added Successfully',
    'alert-type'=>'success'
];
return redirect()->route('all.brand')->with($notification);

}
 public function BrandEdit($id){

    $brands = Brand::findOrFail($id);


return view('backend.brand.brand_edit',compact('brands'));

 }

 public function BrandUpdate(Request $request){
    $brand_id = $request->id;
    $old_img = $request->old_image;

    if($request->file('brand_image')){
        unlink($old_img);
        $image  = $request->file('brand_image');
$name_gen =  hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
$save_url = 'upload/brand/'.$name_gen;

Brand::findOrFail($brand_id)->update([
    'brand_name_en'=>$request->brand_name_en,
    'brand_name_hin'=>$request->brand_name_hin,
    'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
    'brand_slug_hin'=>strtolower(str_replace(' ','-',$request->brand_name_hin)),
    'brand_image'=>$save_url,
]);


$notification = [
    'message'=>'Brand Added Successfully',
    'alert-type'=>'info'
];
return redirect()->route('all.brand')->with($notification);

    }else{


        Brand::findOrFail($brand_id)->update([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_hin'=>$request->brand_name_hin,
            'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_hin'=>strtolower(str_replace(' ','-',$request->brand_name_hin)),
        ]);
        $notification = [
            'message'=>'Brand Added Successfully',
            'alert-type'=>'info'
        ];
        return redirect()->route('all.brand')->with($notification);


    }

 }
 public function BrandDelete($id){
    $brand = Brand::findOrFail($id);

    $image = $brand->brand_image;
    unlink($image);
    Brand::findOrFail($id)->delete();

    $notification = [
        'message'=>'Brand Deletd Successfully',
        'alert-type'=>'warning'
    ];
    return redirect()->route('all.brand')->with($notification);
 }



}
