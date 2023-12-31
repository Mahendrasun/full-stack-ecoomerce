<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\Backend\AdminProfileController;
use App\http\Controllers\Backend\BrandController;
use App\http\Controllers\Backend\CategoryController;
use App\http\Controllers\Backend\SubCategoryController;
use App\http\Controllers\Backend\ProductController;
use App\http\Controllers\Frontend\IndexController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['prefix'=>'admin','middleware'=>['admin:admin']],function(){
    Route::get('/login',[AdminController::class,'AdminLogin']);
    Route::post('/login',[AdminController::class,'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin','verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

// Admin All Route
Route::get('/admin/logout',[AdminController::class,'destroy'])->name('admin.logout');

Route::get('/admin/profile',[AdminProfileController::class,'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit',[AdminProfileController::class,'AdminProfileEdit'])->name('admin.profile.edit');
Route::POST('/admin/profile/store',[AdminProfileController::class,'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/password/change',[AdminProfileController::class,'AdminPasswordChange'])->name('admin.change.password');
Route::POST('/admin/update/password',[AdminProfileController::class,'AdminUpdatePassword'])->name('admin.update.password');



//  User All Routes
Route::middleware(['auth:sanctum,web','verified'])->group(function () {
    Route::get('/dashboard', function () {
        $id = Auth::user()->id;
    $user = User::find($id);
        return view('dashboard',compact('user'));
    })->name('dashboard');
});
Route::get('/',[IndexController::class,'Index']);
Route::get('/user/logout',[IndexController::class,'UserLogout'])->name('user.logout');
Route::get('/user/profile',[IndexController::class,'UserProfile'])->name('user.profile');
Route::post('/user/profile/store',[IndexController::class,'UserProfileStore'])->name('user.profile.store');
Route::get('/user/changepassword',[IndexController::class,'UserpasswordChange'])->name('change.password');
Route::post('/user/password/update',[IndexController::class,'UserPasswordUpdate'])->name('user.password.update');



//Admin Brand All route
Route::prefix('brand')->group(function(){
    Route::get('/view',[BrandController::class,'BrandView'])->name('all.brand');
    Route::post('/store',[BrandController::class,'BrandStore'])->name('brand.store');
    Route::get('/edit/{id}',[BrandController::class,'BrandEdit'])->name('brand.edit');
    Route::post('/update',[BrandController::class,'BrandUpdate'])->name('brand.update');
    Route::get('/delete/{id}',[BrandController::class,'BrandDelete'])->name('brand.delete');
});

//Admin Category All route
Route::prefix('category')->group(function(){
    Route::get('/view',[CategoryController::class,'CategoryView'])->name('all.category');
    Route::post('/store',[CategoryController::class,'CategoryStore'])->name('category.store');
    Route::get('/edit/{id}',[CategoryController::class,'CategoryEdit'])->name('category.edit');
    Route::post('/update',[CategoryController::class,'CategoryUpdate'])->name('category.update');
    Route::get('/delete/{id}',[CategoryController::class,'CategoryDelete'])->name('category.delete');



// Admin Sub Category All Routes
    Route::get('/sub/view',[SubCategoryController::class,'SubCategoryView'])->name('all.subcategory');
    Route::post('/sub/store',[SubCategoryController::class,'SubCategoryStore'])->name('sub.category.store');
    Route::get('/sub/edit/{id}',[SubCategoryController::class,'SubCategoryEdit'])->name('sub.category.edit');
    Route::post('/sub/update',[SubCategoryController::class,'SubCategoryUpdate'])->name('sub.category.update');
    Route::get('/sub/delete/{id}',[SubCategoryController::class,'SubCategoryDelete'])->name('sub.category.delete');

// Admin Sub Category All Routes
    Route::get('/sub/sub/view',[SubCategoryController::class,'SubSubCategoryView'])->name('all.sub.subcategory');
    Route::get('/subcategory/ajax/{category_id}',[SubCategoryController::class,'GetSubCategoty']);
    Route::post('/sub/sub/store',[SubCategoryController::class,'SubSubCategoryStore'])->name('sub.subcategory.store');
    Route::get('/sub/sub/edit/{id}',[SubCategoryController::class,'SubSubCategoryEdit'])->name('sub.subcategory.edit');
    Route::post('/sub/sub/update',[SubCategoryController::class,'SubSubCategoryUpdate'])->name('sub.subcategory.update');
    Route::get('/sub/sub/delete/{id}',[SubCategoryController::class,'SubSubCategoryDelete'])->name('sub.subcategory.delete');
    Route::get('/sub-subcategory/ajax/{subcategory_id}',[SubCategoryController::class,'GetSubSubCategoty']);
    
});


//Admin Product All route
Route::prefix('product')->group(function(){
    Route::get('/add',[ProductController::class,'AddProduct'])->name('add-product');
    Route::post('/store',[ProductController::class,'ProductStore'])->name('product-store');
});

