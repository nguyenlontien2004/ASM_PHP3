<?php

use App\Http\Controllers\BinhLuanController;
use App\Http\Controllers\DanhMucTinTucController;
use App\Http\Controllers\TinTucController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// ADMIN

//Danh Mục
Route::get('/danh-muc', [DanhMucTinTucController::class, 'index'])->name('danhmuc.trangchu');
Route::get('/them-danh-muc', [DanhMucTinTucController::class, 'create'])->name('danhmuc.create');
Route::post('/them-danh-muc', [DanhMucTinTucController::class, 'store'])->name('danhmuc.store');
Route::get('/sua-danh-muc/{id}', [DanhMucTinTucController::class, 'edit'])->name('danhmuc.edit');
Route::put('/sua-danh-muc/{id}', [DanhMucTinTucController::class, 'update'])->name('danhmuc.update');
Route::delete('/xoa-danh-muc/{id}', [DanhMucTinTucController::class, 'destroy'])->name('danhmuc.destroy');

//Tin Tức
Route::get('/tin-tuc', [TinTucController::class, 'index'])->name('tintuc.trangchu');
Route::get('/them-tin-tuc', [TinTucController::class, 'create'])->name('tintuc.create');
Route::post('/them-tin-tuc', [TinTucController::class, 'store'])->name('tintuc.store');
Route::get('/xem-tin-tuc/{id}', [TinTucController::class, 'show'])->name('tintuc.show');
Route::get('/tin-tuc/{id}/edit', [TinTucController::class, 'edit'])->name('tintuc.edit');
Route::put('/tin-tuc/{id}/edit', [TinTucController::class, 'update'])->name('tintuc.update');
Route::delete('/xoa-tin-tuc/{id}', [TinTucController::class, 'destroy'])->name('tintuc.destroy');
Route::get('/binh-luan', [BinhLuanController::class, 'index'])->name('binhluan.trangchu');

// USERR

Route::get('/trang-chu', [TinTucController::class, 'indexUser'])->name('user.trangchu');
Route::get('/tin-loai/{id}', [TinTucController::class, 'tinLoai']);
Route::get('/tin/{id}', [TinTucController::class, 'chiTietTin'])->name('tin.chitiet');
Route::get('/tin-moi', [TinTucController::class, 'tinMoi'])->name('tin.tinmoi');
Route::get('/timkiem', [TinTucController::class, 'timkiem'])->name('timkiem');
Route::post('/binhluan', [BinhLuanController::class, 'store'])->name('binhluan.store');
// Route::get('/tin/{id}', [TinTucController::class, 'dSBL']);