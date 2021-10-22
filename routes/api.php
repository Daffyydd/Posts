<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\MembersController;
use App\Http\Controllers\Api\MemberDependantsController;
use Orion\Facades\Orion;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'auth'

], function ($router) {
   // Route::post('/login', [AuthController::class, 'login']);
    
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/register', [AuthController::class, 'register']);
Route::get('/user-profile', [AuthController::class, 'userProfile'])->middleware('auth:sanctum');    

Route::group([    
   'as' => 'api.'
    ], function() {
    Orion::resource('members', MembersController::class);
    Orion::hasManyResource('members', 'dependants', MemberDependantsController::class);



});