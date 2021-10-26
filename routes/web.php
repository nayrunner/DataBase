<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\DepartmentController;
use App\Models\department;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\promotionController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = user::all();
    return view('dashboard',compact('users'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){

    Route::get('/alluser',function(){
        $users = user::all();
        return view('profile.alluser',compact('users'));
    })->name('alluser');

    //product
    Route::get('/product',[ProductController::class,'index'])->name('product');
    Route::post('/product/add',[ProductController::class,'store'])->name('addProduct');
    Route::get('/product/customer',[ProductController::class,'productCus'])->name('productCus');
    Route::get('/product/edit/{id}',[ProductController::class,'edit']);
    Route::post('/product/update/{id}',[ProductController::class,'update']);
    Route::get('/product/purchase/{id}{user_id}',[ProductController::class,'purchase']);


    //department
    Route::get('/department',[DepartmentController::class,'index'])->name('department');
    Route::post('/department/add',[DepartmentController::class,'store'])->name('addDepartment');
    Route::get('/department/edit/{user_id}',[DepartmentController::class,'edit']);
    Route::post('/department/update/{user_id}',[DepartmentController::class,'update']);
    Route::get('/department/softdelete/{user_id}',[DepartmentController::class,'softdelete']);
    Route::get('/department/restore/{user_id}',[DepartmentController::class,'restore']);
    Route::get('/department/forcedelete/{user_id}',[DepartmentController::class,'forcedelete']);

    //order
    Route::get('/order',[OrderController::class,'index'])->name('order');
    Route::get('/order/edit/{id}',[OrderController::class,'edit']);
    Route::post('/order/update/{id}',[OrderController::class,'update']);
    Route::get('/ordercus',[OrderController::class,'ordercus'])->name('ordercus');
    Route::get('/ordercus/edit/{id}',[OrderController::class,'cusedit']);
    Route::post('/ordercus/update/{id}{user_id}',[OrderController::class,'cusupdate']);

    //promotion
    Route::get('/promotion',[promotionController::class,'promotion'])->name('promotion');
    Route::post('/promotion/add',[promotionController::class,'store'])->name('addPromotion');
    Route::get('/promotion/edit/{id}',[promotionController::class,'edit']);
    Route::post('/promotion/update/{id}',[promotionController::class,'update']);
});
