<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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

Route::post('login',[CompanyController::class, 'login'])->name('companyLogin');
Route::group( ['prefix' => 'compa','middleware' => ['auth:compa-api','scopes:compa'] ],function(){
   // authenticated staff routes here 
    Route::get('dashboard',[CompanyController::class, 'dashboard']);
});