<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\DepartmentController;
use App\Models\department;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $users = user::all();
    return view('dashboard',compact('users'));
})->name('dashboard');

Route::get('/department',[DepartmentController::class,'index'])->name('department');

Route::get('/product',[ProductController::class,'index'])->name('product');

Route::post('/product/add',[ProductController::class,'store'])->name('addProduct');

Route::post('/department/add',[DepartmentController::class,'store'])->name('addDepartment');