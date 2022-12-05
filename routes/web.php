<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\thuonghieuController;;
use App\Http\Controllers\productController;
/*úe
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//front-end
Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'index']);

Route::get('/contact',[HomeController::class,'contact']);

Route::get('/login',[HomeController::class,'login']);
//category

Route::get('/danh-muc/{cate_id}',[categoryController::class,'danh_muc']);


//back-end
Route::get('/admin',[adminController::class,'index']);
//Route::get('/dashboard',[adminController::class,'show_dashboard']);
Route::post('/dashboard',[adminController::class,'dashboard']);


//category

Route::get('/add_category',[categoryController::class,'add_category']);
Route::get('/all_category',[categoryController::class,'all_category']);
Route::post('/save_category',[categoryController::class,'save_category']);

Route::get('/status_category_up/{cate_id}',[categoryController::class,'status_category_up']);
Route::get('/status_category_down/{cate_id}',[categoryController::class,'status_category_down']);

Route::get('/edit_category/{cate_id}',[categoryController::class,'edit_category']);
Route::post('/update_category/{cate_id}',[categoryController::class,'update_category']);
Route::get('/delete_category/{cate_id}',[categoryController::class,'delete_category']);

//thuong hieu

Route::get('/add_thuonghieu',[thuonghieuController::class,'add_thuonghieu']);
Route::post('/save_thuonghieu',[thuonghieuController::class,'save_thuonghieu']);
Route::get('/all_thuonghieu',[thuonghieuController::class,'all_thuonghieu']);

Route::get('/status_trade_up/{trade_id}',[thuonghieuController::class,'status_trade_up']);
Route::get('/status_trade_down/{trade_id}',[thuonghieuController::class,'status_trade_down']);
Route::get('/delete_thuonghieu/{trade_id}',[thuonghieuController::class,'delete_thuonghieu']);
Route::get('/edit_thuonghieu/{trade_id}',[thuonghieuController::class,'edit_thuonghieu']);
Route::get('/update_thuonghieu/{trade_id}',[thuonghieuController::class,'update_thuonghieu']);



//san pham

Route::get('/add_product',[productController::class,'add_product']);
Route::post('/save_product',[productController::class,'save_product']);
Route::get('/all_product',[productController::class,'all_product']);
Route::get('/status_pro_up/{pro_id}',[productController::class,'status_pro_up']);
Route::get('/status_pro_down/{pro_id}',[productController::class,'status_pro_down']);
Route::get('/edit_sanpham/{pro_id}',[productController::class,'edit_sanpham']);
Route::post('/update_product/{pro_id}',[productController::class,'update_sanpham']);
Route::get('/delete_sanpham/{pro_id}',[productController::class,'delete_sanpham']);