<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use App\Http\Controllers\Backend\BannerDetailsController;
use App\Http\Controllers\Backend\PressController;
use App\Http\Controllers\Backend\BlogTypesController;
use App\Http\Controllers\Backend\BlogDetailsController;
use App\Http\Controllers\Backend\CocktailsController;


use App\Http\Controllers\Frontend\HomeController;

// Route::get('/', function () {
//     return view('frontend.home');
// });
  
// Authentication Routes
Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/change-password', [LoginController::class, 'change_password'])->name('admin.changepassword');
Route::post('/update-password', [LoginController::class, 'updatePassword'])->name('admin.updatepassword');

// Admin Routes with Middleware
Route::group(['middleware' => ['auth:web', \App\Http\Middleware\PreventBackHistoryMiddleware::class]], function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard'); 
    })->name('admin.dashboard');
});


// ==== Manage Banner Details in Our community
Route::resource('community-banner-details', BannerDetailsController::class);

// ==== Manage Press Releases in Our community
Route::resource('community-press-releases', PressController::class);

// ==== Manage Blogs Types in BLogs Section
Route::resource('blog-types',BlogTypesController::class);

// ==== Manage BLog Details in BLogs Section
Route::resource('blog-detail',BlogDetailsController::class);

// ==== Manage Blogs Types in BLogs Section
Route::resource('cocktails',CocktailsController::class);

// ===================================================================Frontend================================================================


Route::group(['prefix'=> '', 'middleware'=>[\App\Http\Middleware\PreventBackHistoryMiddleware::class]],function(){


    Route::get('/community', [HomeController::class, 'index'])->name('community.page');
    Route::get('/blog-details/{slug}', [HomeController::class, 'blog_details'])->name('blog.details');
    
});