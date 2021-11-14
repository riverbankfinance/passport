<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


//Users
Route::prefix('/v1/user')->group( function() {
   Route::post('/login', [LoginController::class,'login']);
    //Route::get('/all', [UserController::class,'index']);
   //Route::get('/all', 'UserController@index');
   Route::middleware('auth:api')->get('/all', [UserController::class,'index']);
});
