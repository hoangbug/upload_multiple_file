<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/customer', [HomeController::class, 'viewCustomer'])->name('customer.index');
Route::get('/add-data', [HomeController::class, 'viewAddData'])->name('view.add');
Route::post('/add-data', [HomeController::class, 'addData'])->name('add.data');

Route::get('/test-image', [HomeController::class, 'viewTestImage'])->name('view.testimage');
Route::post('/get-image', [HomeController::class, 'getImage'])->name('get.image');

Route::get('/test-multiple-image', [HomeController::class, 'viewTestMultipleImage'])->name('view.testmultipleimage');

Route::get('/test-multiple-image-base64', [HomeController::class, 'viewTestMultipleImageBase'])->name('view.testmultiple.imagebase');

