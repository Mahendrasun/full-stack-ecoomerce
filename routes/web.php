<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\AdminController;
use App\http\Controllers\Backend\AdminProfileController;
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