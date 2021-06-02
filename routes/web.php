<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Slider;
use App\Models\HomeAbout;
use App\Models\Service;
use App\Models\Multipic;
use App\Models\ChangePasswordController;







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

Route::get('/', function () {
    $brands=Brand::all();
    $sliders=Slider::all();
    $abouts=HomeAbout::all()->first();
    $services=Service::all();
    $multiimg=Multipic::all();

    return view('home',['brands'=>$brands,'sliders'=>$sliders,'abouts'=>$abouts,'services'=>$services,'multiimg'=>$multiimg]);
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // $users=User::all();
    
        return view('admin.index');
})->name('dashboard');

Route::get('/category/all','App\Http\Controllers\CategoryController@index')->name('all.category');
Route::post('/category/store','App\Http\Controllers\CategoryController@store')->name('category.store');
Route::get('/category/{id}/edit','App\Http\Controllers\CategoryController@edit')->name('category.edit');
Route::post('/category/{id}/update','App\Http\Controllers\CategoryController@update')->name('category.update');

Route::get('/category/{id}/delete','App\Http\Controllers\CategoryController@delete')->name('category.delete');
Route::get('/category/{id}/restore','App\Http\Controllers\CategoryController@restore')->name('category.restore');
Route::get('/category/{id}/fdelete','App\Http\Controllers\CategoryController@fdelete')->name('category.fdelete');

// Brand Route

Route::get('/brand/all','App\Http\Controllers\BrandController@index')->name('all.brand');
Route::post('/brand/add','App\Http\Controllers\BrandController@store')->name('store.brand');
Route::get('/brand/{id}/edit','App\Http\Controllers\BrandController@edit')->name('brand.edit');
Route::get('/brand/{id}/delete','App\Http\Controllers\BrandController@delete')->name('brand.delete');
Route::post('/brand/{id}/update','App\Http\Controllers\BrandController@update')->name('brand.update');

// Multi image route
Route::get('/multi/image','App\Http\Controllers\BrandController@multipic')->name('multi.image');
Route::post('/multi/add','App\Http\Controllers\BrandController@storeimg')->name('store.image');

//logout
Route::get('/user/logout','App\Http\Controllers\BrandController@logout')->name('user.logout');

//Admin all routes
Route::get('/home/slider','App\Http\Controllers\HomeController@homeslider')->name('home.slider');
Route::get('/add/slider','App\Http\Controllers\HomeController@addslider')->name('add.slider');
Route::post('/store/slider','App\Http\Controllers\HomeController@storeslider')->name('store.slider');
Route::get('/slider/{id}/edit','App\Http\Controllers\HomeController@edit')->name('slider.edit');
Route::post('/slider/{id}/update','App\Http\Controllers\HomeController@update')->name('slider.update');
Route::get('/slider/{id}/delete','App\Http\Controllers\HomeController@delete')->name('slider.delete');

//Home About
Route::get('/home/about','App\Http\Controllers\AboutController@index')->name('home.about');
Route::get('/add/about','App\Http\Controllers\AboutController@addabout')->name('add.about');
Route::post('/store/about','App\Http\Controllers\AboutController@storeabout')->name('store.about');
Route::get('/about/{id}/edit','App\Http\Controllers\AboutController@edit')->name('about.edit');
Route::post('/about/{id}/update','App\Http\Controllers\AboutController@update')->name('about.update');
Route::get('/about/{id}/delete','App\Http\Controllers\AboutController@delete')->name('about.delete');

//Home Service
Route::get('/home/service','App\Http\Controllers\ServiceController@index')->name('home.service');
Route::get('/add/service','App\Http\Controllers\ServiceController@addservice')->name('add.service');
Route::post('/store/service','App\Http\Controllers\ServiceController@storeservice')->name('store.service');
Route::get('/service/{id}/edit','App\Http\Controllers\ServiceController@edit')->name('service.edit');
Route::post('/service/{id}/update','App\Http\Controllers\ServiceController@update')->name('service.update');
Route::get('/service/{id}/delete','App\Http\Controllers\ServiceController@delete')->name('service.delete');

//porfolio page
Route::get('/portfolio','App\Http\Controllers\HeaderController@portfolio')->name('portfolio');

//Admin contact page
Route::get('/admin/contact','App\Http\Controllers\HeaderController@admincontact')->name('admin.contact');
Route::get('/add/admin/contact','App\Http\Controllers\HeaderController@adminaddcontact')->name('add.contact');
Route::post('/store/admin/contact','App\Http\Controllers\HeaderController@storeadmincontact')->name('store.admincontact');
Route::get('/contact/{id}/edit','App\Http\Controllers\HeaderController@admincontactedit')->name('contact.edit');
Route::post('/contact/{id}/update','App\Http\Controllers\HeaderController@admincontactupdate')->name('admincontact.update');
Route::get('/contact/{id}/delete','App\Http\Controllers\HeaderController@admincontactdelete')->name('contact.delete');
Route::get('/admin/message','App\Http\Controllers\HeaderController@adminmessage')->name('admin.message');
Route::get('/admin/message/{id}/delete','App\Http\Controllers\HeaderController@adminmessagedelete')->name('admin.message.delete');



//Home contact page
Route::get('/home/contact','App\Http\Controllers\HeaderController@homecontact')->name('contact');
Route::post('/contact/form','App\Http\Controllers\HeaderController@contactform')->name('contact.form');

//change password and user profile route
Route::get('/user/password','App\Http\Controllers\ChangePasswordController@cpassword')->name('change.password');
Route::post('/password/update','App\Http\Controllers\ChangePasswordController@updatepassword')->name('password.update');


//user profile
Route::get('/user/profile','App\Http\Controllers\ChangePasswordController@pupdate')->name('profile.update');
Route::post('/user/profile/update','App\Http\Controllers\ChangePasswordController@updateprofile')->name('update.user.profile');


















// Route::middleware(['auth:sanctum', 'verified'])->group(function(){

//     Route::get('/dashboard',function(){
//         $users=User::all();
//         return view('dashboard',['users'=>$users]);

//     });

// });
