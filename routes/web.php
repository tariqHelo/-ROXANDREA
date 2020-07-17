<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();


Route::get('/', function () {
    return view('website.index');
});





Route::prefix("admin")->namespace("Admin")->middleware(["auth","permissions"])->group(function(){

    Route::resource("blogs",'BlogController');
    Route::resource("comments",'CommentController');
    Route::resource("offers",'OfferController');
    Route::resource("rooms",'RoomController');
    Route::resource("categories",'CategoryController');
    Route::resource("sliders",'SliderController');
    Route::resource("bookings",'BookingController');
    Route::resource("foods",'FoodController');
    Route::resource("menus",'MenuController');

    Route::get("/sliders/{id}/delete","SliderController@destroy")->name('delete-Slider');


    Route::get("/users/{id}/permissions","UserController@permissions")->name('permissions');
    Route::post("/users/{id}/permissions","UserController@postPermissions")->name('permissions-post');

    
    Route::resource("users",'UserController');
    Route::get("/users/{id}/delete","UserController@destroy")->name('delete-user');

    Route::get("/comments/{id}/delete","CommentController@destroy")->name('delete-comment');
    Route::get('/active/{id}','CommentController@status')->name('comment.status');

    Route::get("/rooms/{id}/delete","RoomController@destroy")->name('delete-rooms');
    Route::get("/rooms/{id}/edit","RoomController@edit");


    Route::get("settings",'SettingController@update')->name('post-settings');
    Route::post("admin/settings",'SettingController@setting')->name('settings');
    
    Route::resource("contact_me",'ContactMeController');

    Route::get('/active_cat/{id}','CategoryController@active')->name('category.confirm');
    Route::get('/disactive_cat/{id}','CategoryController@pending')->name('category.pending');

    Route::get('/active_blog/{id}','BlogController@active')->name('blog.confirm');
    Route::get('/disactive_blog/{id}','BlogController@pending')->name('blog.pending');

    Route::get("/change-password",'UserController@changePassword')->name("change-password");
    Route::put("/change-password",'UserController@postChangePassword')->name("post-change-password");

    Route::get("no-access","HomeController@noAccess")->name("admin.no-access");
    Route::get("/","HomeController@index")->name("admin.home");


    Route::get("/",'HomeController@index')->name("home");


});

