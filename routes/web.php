<?php

use App\Http\Controllers\Backend\ClientController;
use App\Http\Controllers\Backend\ConfigurationController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\HomepageController;
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

Route::get('/',[HomepageController::class,'index'] );

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/admin/dashboard',[DashboardController::class,'index']);

// to display form



Route::name('admin.')->prefix('admin')->group(function () {

    Route::get('/create-user',[UserController::class,'create']);
    Route::get('/user-slider',[UserController::class,'user_slider']);
    Route::get('/slider',[SliderController::class,'index'])->name('slider.index');
    Route::get('/slider/create',[SliderController::class,'create'])->name('slider.create');
    Route::post('/slider/store',[SliderController::class,'store'])->name('slider.store');
    Route::get('/slider/edit/{id}',[SliderController::class,'edit'])->name('slider.edit');
    Route::get('/slider/delete/{id}',[SliderController::class,'destroy'])->name('slider.delete');
    Route::post('/slider/update',[SliderController::class,'update'])->name('slider.update');
    Route::get('/categories/all-college/{university}/{college}',[SliderController::class,'test'])->name('slider.test');

    Route::resource('product',ProductController::class);
    Route::resource('client',ClientController::class);
    Route::get('/client/delete/{id}',[SliderController::class,'destroy'])->name('client.delete');


    Route::get('/configuration',[ConfigurationController::class,'index'])->name('configuration.index');
    Route::post('/post-configuration',[ConfigurationController::class,'update'])->name('configuration.update');

    //route ma resource controller resource
});




// display list



