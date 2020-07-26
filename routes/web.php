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



Route::get("/",'FrontEnd\HomeController@index')->name("home-view");


Route::get("/contact",'FrontEnd\HomeController@contact')->name("contact");
Route::post("/contact",'FrontEnd\HomeController@postContact')->name("contactus");

Route::get("/comment/create",'FrontEnd\CommentController@create')->name("comment_create");
Route::post("/comment/{id}",'FrontEnd\CommentController@store')->name("comment_store");


Route::get("/about",'FrontEnd\HomeController@about')->name("about");
Route::get("/comment",'FrontEnd\HomeController@about');

Route::get("/foods",'FrontEnd\HomeController@foods')->name("food");

Route::get("/blogs",'FrontEnd\BlogController@blogs')->name("blogs");
Route::get("/blogs/{id}",'FrontEnd\BlogController@blog')->name("blog");

Route::post("/comments/{id}",'FrontEnd\BlogController@storeComment')->name("add_comment");
Route::get("/blogs/{id}/show",'FrontEnd\BlogController@blog')->name("blogshow");

Route::get("/rooms",'FrontEnd\HomeController@rooms')->name("rooms");

Route::post("/booking",'FrontEnd\BookingController@postCreate')->name("post-booking");




Route::prefix("admin")->namespace("Admin")->middleware(["auth",'permissions'])->group(function(){

    Route::resource("blogs",'BlogController');
    Route::resource("comments",'CommentController');
    Route::resource("rooms",'RoomController');
    Route::resource("categories",'CategoryController');
    Route::resource("sliders",'SliderController');
    Route::resource("bookings",'BookingController');
    Route::resource("foods",'FoodController');
    Route::resource("menus",'MenuController');
    Route::resource("category",'CateFoodsController');
    Route::resource("users",'UserController');

    Route::resource("about",'AboutController');
    Route::resource("vision",'VisionController');
    Route::resource("service",'ServiceController');
    Route::get("service/{id}/delete",'ServiceController@destroy')->name('delete-services');

   // Route::get("/about/{id}/edit","AboutController@edit");
    //Route::post("/about/{id}","AboutController@update");


    Route::get("/menus/{menu}/delete","MenuController@destroy")->name('menus.destroy');
    Route::get("/sliders/{id}/delete","SliderController@destroy")->name('delete-Slider');


    Route::get("/users/{id}/permissions","UserController@permissions")->name('permissions');
    Route::post("/users/{id}/permissions","UserController@postPermissions")->name('permissions-post');

    Route::get('/active_fd/{id}','CateFoodsController@active')->name('categorys.confirm');
    Route::get('/disactive_fd/{id}','CateFoodsController@pending')->name('categorys.pending');

    Route::get("/users/{id}/delete","UserController@destroy")->name('delete-user');

    Route::get("/comments/{id}/delete","CommentController@destroy")->name('delete-comment');
    Route::get('/active/{id}','CommentController@status')->name('comment.status');

    Route::get("/rooms/{id}/delete","RoomController@destroy")->name('delete-rooms');
    Route::get("/rooms/{id}/edit","RoomController@edit");


    Route::get("settings",'SettingController@setting')->name('settings');
    Route::post(" settings",'SettingController@postsetting')->name('post-settings');

    
    Route::resource("contact_me",'ContactMeController');


 

    Route::get('/active_blog/{id}','BlogController@active')->name('blog.confirm');
    Route::get('/disactive_blog/{id}','BlogController@pending')->name('blog.pending');

    Route::get('/active_cat/{id}','CategoryController@active')->name('category.confirm');
    Route::get('/disactive_cat/{id}','CategoryController@pending')->name('category.pending');

    Route::get("/change-password",'UserController@changePassword')->name("change-password");
    Route::put("/change-password",'UserController@postChangePassword')->name("post-change-password");

    Route::get("no-access","HomeController@noAccess")->name("admin.no-access");
    Route::get("/","HomeController@index")->name("admin.home");


    Route::get("/",'HomeController@index')->name("home");


});

