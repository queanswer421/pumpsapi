<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;

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
Route::get('/test',[EmployerController::class, 'index'])->name('index');
Route::post('login',[EmployerController::class, 'login'])->name('employerLogin');
Route::group( ['prefix' => 'emplo','middleware' => ['auth:emplo-api','scopes:emplo'] ],function(){
   // authenticated staff routes here 
    Route::get('dashboard',[EmployerController::class, 'dashboard']);
});
Route::get('/cars', function(){
    return response()->json(['name' => 'Subaru', 'name2' => 'Mercedes']);
});
