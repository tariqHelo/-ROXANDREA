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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("admin")->namespace("Admin")->group(function(){
    Route::resource("blogs",'BlogController');
    Route::resource("comments",'CommentController');
    Route::resource("offers",'OfferController');
    Route::resource("rooms",'RoomController');
    Route::resource("categories",'CategoryController');
    Route::resource("sliders",'SliderController');
    Route::get("/sliders/{id}/delete","SliderController@destroy")->name('delete-Slider');


    Route::resource("foods",'FoodController');

    Route::get("/rooms/{id}/delete","RoomController@destroy")->name('delete-rooms');
    Route::get("/rooms/{id}/edit","RoomController@edit");


    Route::get("admin/settings",'SettingController@store')->name('post-settings');

    Route::post("admin/settings",'SettingController@setting')->name('settings');


    Route::resource("bookings",'BookingController');

});