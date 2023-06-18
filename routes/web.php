<?php

use Illuminate\Support\Facades\Route;
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
/*
Route::get('/', function () {

    return view('product_view');
});
*/
Route::get('/',[ProductController::class,'productView']);


Route::get('/product_add',[ProductController::class,'addProduct'])->name('add.product');
Route::get('/category/get-subcategory/ajax/{cat_id}',[ProductController::class,'getSubcategory']);
Route::get('/subcategory/getsubsubcategory/ajax/{subcat_id}',[ProductController::class,'getSubSubcategory']);
Route::post('/product_store',[ProductController::class,'storeProduct'])->name('product.store');
Route::get('/product_edit/{id}',[ProductController::class,'editProduct'])->name('edit.product');
Route::post('/product_update',[ProductController::class,'updateProduct'])->name('product.update');
Route::get('/product_delete/{id}',[ProductController::class,'deleteProduct'])->name('delete.product');

