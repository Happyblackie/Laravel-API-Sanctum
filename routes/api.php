<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\AddController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;


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


Route::post("login",[UserController::class,'index']);

Route::group(['middleware' => 'auth:sanctum'], function(){
    //All secure URL's
    Route::apiResource("member",MemberController::class);

    Route::get("data",[dummyAPI::class,'getData']);

    /* Route::get("list",[DeviceController::class,'list']); */

    //video 4
    /* Route::get("list/{id}",[DeviceController::class,'list']); */

    /* making params optional */
    Route::get("list/{id?}",[DeviceController::class,'list']);

    Route::get("names",[DeviceController::class,'nameparams']);

    //put method
    Route::put("update",[DeviceController::class,'update']);


    //save/ass/create
    Route::post("add",[AddController::class,'add']);

    //delete
    Route::delete("delete/{id}",[DeviceController::class,'delete']);

    //search
    Route::get("search/{name}",[DeviceController::class,'search']);

    //file upload
    Route::post("upload",[FileController::class,'uploadFile']);

    //api validation
    Route::post("save",[DeviceController::class,'testData']);
    /* Route::apiResource("member",MemberController::class); */


});
