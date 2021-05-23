<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCatgeoryController;
use App\Http\Controllers\ProductController;

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

Route::get('/category/index',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store',[CategoryController::class,'store'])->name('category.store');
Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::put('/category/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::post('/category/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');

Route::get('/subcategory/index',[SubCatgeoryController::class,'index'])->name('subcategory.index');
Route::get('/subcategory/create',[SubCatgeoryController::class,'create'])->name('subcategory.create');
Route::post('/subcategory/store',[SubCatgeoryController::class,'store'])->name('subcategory.store');
Route::get('/subcategory/edit/{id}',[SubCatgeoryController::class,'edit'])->name('subcategory.edit');
Route::put('/subcategory/update/{id}',[SubCatgeoryController::class,'update'])->name('subcategory.update');
Route::post('/subcategory/delete/{id}',[SubCatgeoryController::class,'destroy'])->name('subcategory.delete');


Route::get('/product/index',[ProductController::class,'index'])->name('product.index');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::post('/product/delete/{id}',[ProductController::class,'destroy'])->name('product.delete');