<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();});
     //// route user//////////
    Route::get("/profile","UserController@profile");
    Route::get("/logout","UserController@logout");
    Route::post("update_password","UserController@update_password");
 ////////route post auth////
    Route::post("/new_post","PostController@new_post");
    Route::post("update_post","PostController@update_post");
    Route::get("/me_post","PostController@post_user");
    Route::get("/delete_post/{id}","PostController@delete_post");
});

///////// insrci et login et validation ////////
Route::post("/register","UserController@register");
Route::post('/login','UserController@login');
Route::post("code_validation","UserController@validation");

/////////// route public////////

Route::get("/recherche_post_mot_cle","PostController@recherche_post_mot_cle");



////////////exercice

Route::post("/exe_post","ExerciceController@new_post");
Route::get("/exe_get","ExerciceController@tous_post");
