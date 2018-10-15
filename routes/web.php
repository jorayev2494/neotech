<?php

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

Route::get("/", ["uses" => "IndexController@index", "as" => "index"]);

Route::get("alias/{alias}", ["uses" => "ShowController@show", "as" => "alias.show"])->where(["alias" => "[0-9]+"]);

Route::get("alias/{groups}", ["uses" => "ShowController@group", "as" => "alias.group"])->where(["group" => '[a-z]+']);

Route::post("subscribe", ["uses" => "SubscribeController@subscribe", "as" => "subscribe"]);

Route::get('profile/{user}', ["uses" => "ProfileController@show", "as" => "profile"]);

Route::post("alias/comment/{user}",["uses" => "CommentController@comment", "as" => "comment"]);/*->where(["id" => "[0-9]+"])*/;

Route::get("contact", ["uses" => "ContactController@show", "as" => "contact"]);

Route::post("contact", ["uses" => "ContactController@post", "as" => "contact"]);


Route::group(["prefix" => "admin", "middleware" => ["auth", "admin"], "as" => "admin."], function() {
    // admin/dashboard
    Route::get("/dashboard", ["uses" => "Admin\IndexController@show", "as" => "dashboard"]);
    
    // /admin/users
    Route::resource("users", "Admin\UserController");

    // /admin/aliases
    Route::resource('aliases', 'Admin\AliasesController');

    // /admin/videos
    Route::resource('videos', 'Admin\VideosController');

    // admin/groups
    Route::resource('groups', 'Admin\GroupsController');

    // admin/subscribes
    Route::resource("subscribes", "Admin\SubscribesController");

    // admin/settings
    Route::resource('settings', 'Admin\SettingsController');

});


Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Auth::routes();
Route::get("/home", function () {
    return redirect()->route("index");
})->name("home");
// Route::get("/home", "HomeController@index")->name("home");
