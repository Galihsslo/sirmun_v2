<?php

use App\Http\Controllers\PembayaranController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArtikelController;
use PHPUnit\Framework\Constraint\Operator;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;

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


// Guest
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return view('index');
    });
});

// Auth
Route::get('auth/login',[AuthController::class, 'index']);
Route::POST('auth/login',[AuthController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin')->middleware('userAkses:admin');
    Route::get('/bendahara', [BendaharaController::class, 'index'])->name('bendahara')->middleware('userAkses:bendahara');
    Route::get('/operator', [OperatorController::class, 'index'])->name('operator')->middleware('userAkses:operator');
    Route::get('register',[AuthController::class, 'create'])->name('register');

});
// Admin Group
Route::middleware(['auth'])->group(function () {
    // User Resource
    Route::get('admin/user', [UserController::class, 'index'])->name('admin.user')->middleware('userAkses:admin', );
    Route::get('admin/user/tambah', [UserController::class, 'create'])->name('tambah.user')->middleware('userAkses:admin', );
    Route::post('admin/user/tambah', [UserController::class, 'store'])->name('user.store')->middleware('userAkses:admin', );
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit'])->name('edit.user')->middleware('userAkses:admin', );
    Route::put('admin/user/update/{id}', [UserController::class, 'update'])->name('update.user')->middleware('userAkses:admin', );
    Route::delete('admin/user/delete/{id}', [UserController::class, 'destroy'])->name('delete.user')->middleware('userAkses:admin', );
    Route::get('profile', [AdminController::class, 'profile'])->name('profile')->middleware('userAkses:admin', );
    Route::get('/search', [UserController::class, 'search'])->name('search')->middleware('userAkses:admin', );

    // Artikel Resource
    Route::get('admin/artikel', [ArtikelController::class, 'index'])->name('artikel')->middleware('userAkses:admin', );
    Route::get('admin/artikel/tambah', [ArtikelController::class, 'create'])->name('tambah.artikel')->middleware('userAkses:admin', );
    Route::post('admin/artikel/tambah', [ArtikelController::class, 'store'])->name('artikel.store')->middleware('userAkses:admin', );
    Route::get('admin/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('edit.artikel')->middleware('userAkses:admin', );
    Route::POST('admin/artikel/edit/{id}', [ArtikelController::class, 'update'])->name('artikel.update')->middleware('userAkses:admin', );
    Route:: DELETE('admin/artikel/delete/{title}', [ArtikelController::class, 'destroy'])->name('delete.artikel')->middleware('userAkses:admin', );
});
    //admin group
    Route::group(['middleware' => ['auth', 'userAkses:admin']], function () {
        // Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    });
    //Bendahara Group
Route::group(['middleware' => ['auth', 'userAkses:bendahara']], function () {
    Route::get('bendahara/tambah', [BendaharaController::class, 'create'])->name('bendahara');
    Route::get('bendahara/profile', [BendaharaController::class, 'profile'])->name('profile');
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi');


});


    //Operator Group
Route::group(['middleware' => ['auth', 'userAkses:operator']], function () {
    Route::get('pembayaran', [OperatorController::class, 'pembayaran'])->name('pembayaran');
    Route::get('pembayaran/view/{id}', [OperatorController::class, 'view'])->name('view');
    Route::post('bayar', [OperatorController::class, 'bayar'])->name('bayar');
    Route::get('invoice/{id}', [OperatorController::class, 'invoice'])->name('invoice');
});

    //operator
Route::middleware(['guest'])->group(function () {
    Route::get('halaman',[AdminController::class, 'halaman'])->name('halaman');

});



Route::get('logout',[AuthController::class, 'logout']);
