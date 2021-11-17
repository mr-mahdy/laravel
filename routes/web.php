<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/student', [CrudController::class, 'index']);
Route::post('/student', [CrudController::class, 'store']);
Route::get('/student/create', [CrudController::class, 'create']);
Route::delete('/student/{student}', [CrudController::class, 'destroy']);
Route::get('/student/{student}', [CrudController::class, 'show']);
Route::get('/student/{student}/edit', [CrudController::class, 'edit']);
Route::put('/student/{student}', [CrudController::class, 'update']);
