<?php

namespace App\Http\Controllers\Backend;
use App\Models\SubSubCategory;
use App\Models\SubCategory;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function SubCategoryView(){

        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subCategories = SubCategory::latest()->get();
        return view('backend.category.subcategory_view',compact('subCategories','categories'));
    }

    public function SubCategoryStore(Request $request){

        $validation = $request->validate([
            'category_id'=>'required',
            'subcategory_name_en'=>'required',
            'subcategory_name_hin'=>'required',
        ],['category_id.required'=>'Please Select Category','category_name_en.required'=>'Input Category Name in English',
        'category_name_hin.required'=>'Input Category Name in Hindi',]);
    
    
    
        SubCategory::insert([
            'category_id'=>$request->category_id,
        'subcategory_name_en'=>$request->subcategory_name_en,
        'subcategory_name_hin'=>$request->subcategory_name_hin,
        'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
        'subcategory_slug_hin'=>strtolower(str_replace(' ','-',$request->subcategory_name_hin)),
    ]);
    
    
    $notification = [
        'message'=>'Sub Category Added Successfully',
        'alert-type'=>'success'
    ];
    return redirect()->route('all.subcategory')->with($notification);
    
    }

    public function SubCategoryEdit($id){
        $categories = Category::orderBy('category_name_en','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);    
    return view('backend.category.sub_category_edit',compact('subcategory','categories'));
   
}

public function SubCategoryUpdate(Request $request){
    $subcategory_id = $request->id;
$validation = $request->validate([
    'category_id'=>'required',
    'subcategory_name_en'=>'required',
    'subcategory_name_hin'=>'required',
],['category_id.required'=>'Please Select Category','category_name_en.required'=>'Input Category Name in English',
'category_name_hin.required'=>'Input Category Name in Hindi',]);



SubCategory::findOrFail($subcategory_id)->update([
    'category_id'=>$request->category_id,
'subcategory_name_en'=>$request->subcategory_name_en,
'subcategory_name_hin'=>$request->subcategory_name_hin,
'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
'subcategory_slug_hin'=>strtolower(str_replace(' ','-',$request->subcategory_name_hin)),
]);
$notification = [
'message'=>'Sub Category Updated Successfully',
'alert-type'=>'success'
];
return redirect()->route('all.subcategory')->with($notification);
    }


    public function SubCategoryDelete($id){
        SubCategory::findOrFail($id)->delete();
    
        $notification = [
            'message'=>'Sub Category Deletd Successfully',
            'alert-type'=>'warning'
        ];
        return redirect()->route('all.subcategory')->with($notification);
     }


// SUb Sub Category Start Here

public function SubSubCategoryView(){
    
    $categories = Category::orderBy('category_name_en','ASC')->get();
    $subsubCategories = SubSubCategory::latest()->get();
    return view('backend.category.sub_subcatrgory_view',compact('subsubCategories','categories'));
}

public function GetSubCategoty($category_id){
    $subCategories = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();

    return json_encode($subCategories);
}


public function SubSubCategoryStore(Request $request){

    $validation = $request->validate([
        'category_id'=>'required',
         'subcategory_id'=>'required',
        'subsubcategory_name_en'=>'required',
        'subsubcategory_name_hin'=>'required',
    ],['category_id.required'=>'Please Select Category',
    'subcategory_id.required'=>'Please Select Sub Category',
    'subsubcategory_name_en.required'=>'Please Enter Sub Sub Category Name in English',
    'subsubcategory_name_hin.required'=>'Please Enter Sub Sub Category Name in Hindi',]);



    SubSubCategory::insert([
        'category_id'=>$request->category_id,
        'subcategory_id'=>$request->subcategory_id,
    'subsubcategory_name_en'=>$request->subsubcategory_name_en,
    'subsubcategory_name_hin'=>$request->subsubcategory_name_hin,
    'subsubcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
    'subsubcategory_slug_hin'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_hin)),
]);


$notification = [
    'message'=>'Sub Sub Category Added Successfully',
    'alert-type'=>'success'
];
return redirect()->route('all.sub.subcategory')->with($notification);

}
public function SubSubCategoryEdit($id){

    $categories = Category::orderBy('category_name_en','ASC')->get();
    $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
    $subsubCategories = SubSubCategory::findOrFail($id);
    return view('backend.category.sub_subcatrgory_edit',compact('categories','subcategories','subsubCategories'));
}

public function SubSubCategoryUpdate(Request $request){
    
    $subsubcategory_id = $request->id;
    $validation = $request->validate([
        'category_id'=>'required',
         'subcategory_id'=>'required',
        'subsubcategory_name_en'=>'required',
        'subsubcategory_name_hin'=>'required',
    ],['category_id.required'=>'Please Select Category',
    'subcategory_id.required'=>'Please Select Sub Category',
    'subsubcategory_name_en.required'=>'Please Enter Sub Sub Category Name in English',
    'subsubcategory_name_hin.required'=>'Please Enter Sub Sub Category Name in Hindi',]);



    SubSubCategory::findOrFail($subsubcategory_id)->update([
        'category_id'=>$request->category_id,
        'subcategory_id'=>$request->subcategory_id,
    'subsubcategory_name_en'=>$request->subsubcategory_name_en,
    'subsubcategory_name_hin'=>$request->subsubcategory_name_hin,
    'subsubcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
    'subsubcategory_slug_hin'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_hin)),
]);


$notification = [
    'message'=>'Sub Sub Category Updated Successfully',
    'alert-type'=>'success'
];
return redirect()->route('all.sub.subcategory')->with($notification);

}

public function SubSubCategoryDelete($id){

    SubSubCategory::findOrFail($id)->delete();
    
        $notification = [
            'message'=>'Sub Sub Category Deletd Successfully',
            'alert-type'=>'warning'
        ];
        return redirect()->route('all.sub.subcategory')->with($notification);
}

}
