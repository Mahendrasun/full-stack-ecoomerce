<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function CategoryView(){

        $categories = Category::latest()->get();
        
        return view('backend.category.category_view',compact('categories'));
    }

    public function CategoryStore(Request $request){

        $validation = $request->validate([
            'category_name_en'=>'required',
            'category_name_hin'=>'required',
            'category_icon'=>'required',
        ],['category_name_en.required'=>'Input Category Name in English',
        'category_name_hin.required'=>'Input Category Name in Hindi',]);
    
    
    
    Category::insert([
        'category_name_en'=>$request->category_name_en,
        'category_name_hin'=>$request->category_name_hin,
        'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
        'category_slug_hind'=>strtolower(str_replace(' ','-',$request->category_name_hin)),
        'category_icon'=>$request->category_icon,
    ]);
    
    
    $notification = [
        'message'=>'Category Added Successfully',
        'alert-type'=>'success'
    ];
    return redirect()->route('all.category')->with($notification);
    
    }

public function CategoryEdit($id){
        $category = Category::findOrFail($id);    
    return view('backend.category.category_edit',compact('category'));
   
}

public function CategoryUpdate(Request $request){
    $category_id = $request->id;
    $validation = $request->validate([
        'category_name_en'=>'required',
        'category_name_hin'=>'required',
        'category_icon'=>'required',
    ],['category_name_en.required'=>'Input Category Name in English',
    'category_name_hin.required'=>'Input Category Name in Hindi',]);



Category::findOrFail($category_id)->update([
    'category_name_en'=>$request->category_name_en,
    'category_name_hin'=>$request->category_name_hin,
    'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
    'category_slug_hind'=>strtolower(str_replace(' ','-',$request->category_name_hin)),
    'category_icon'=>$request->category_icon,
]);


$notification = [
    'message'=>'Category Updated Successfully',
    'alert-type'=>'success'
];
return redirect()->route('all.category')->with($notification);
    }

    public function CategoryDelete($id){
        $brand = Category::findOrFail($id);
    
      
        Category::findOrFail($id)->delete();
    
        $notification = [
            'message'=>'Category Deletd Successfully',
            'alert-type'=>'warning'
        ];
        return redirect()->route('all.category')->with($notification);
     }


 }

