<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministratorController;
use App\Models\Producer;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\PumpController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;

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
Route::get('/producers', [ProducerController::class, 'index']);
Route::post('/producers', [ProducerController::class, 'store']);
Route::get('/pumps', [PumpController::class, 'index']);
Route::get('/dashboard', [AdministratorController::class, 'dashboard']);
Route::get('/types', [TypeController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::put('/companies/{company}', [CompanyController::class, 'update']);
Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);
// Route::get('/companies', function(){
//     return Company::select('id','name')->get();
// });
Route::get('/cars', function(){
    return response()->json(['name' => 'Subaru', 'name2' => 'Mercedes']);
});
Route::get('/test',[AdministratorController::class, 'index'])->name('index');
Route::post('login',[AdministratorController::class, 'login'])->name('administratorLogin');
Route::group( ['prefix' => 'admin','middleware' => ['auth:admin-api','scopes:admin'] ],function(){
   // authenticated staff routes here 
    Route::get('dashboard',[AdministratorController::class, 'dashboard']);
});
