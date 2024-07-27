<?php

use App\Http\Controllers\LandingPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DonasiController;
use PHPUnit\Framework\Constraint\Operator;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\BendaharaController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PembayaranController;

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
    // Route::get('/', function () {
    //     return view('index');
    // });
    Route::get('/', [LandingPage::class, 'index'])->name('home');
    Route::get('/readmore/{id}', [LandingPage::class, 'readmore'])->name('home');
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
        //berita resource
        Route::get('berita', [BeritaController::class, 'index'])->name('berita');
        Route::get('berita/tambah', [BeritaController::class, 'create'])->name('tambah.berita');
        Route::post('berita/tambah', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('berita/edit/{id}', [BeritaController::class, 'edit'])->name('edit.berita');
        Route::POST('berita/edit/{id}', [BeritaController::class, 'update'])->name('berita.update');
        Route:: DELETE('berita/delete/{id}', [BeritaController::class, 'destroy'])->name('delete.berita');

        //kegiatan resource
        Route::get('kegiatan', [KegiatanController::class, 'index'])->name('kegiatan');
        Route::get('kegiatan/tambah', [KegiatanController::class, 'create'])->name('tambah.kegiatan');
        Route::post('kegiatan/tambah', [KegiatanController::class, 'store'])->name('kegiatan.store');
        Route::get('kegiatan/edit/{id}', [KegiatanController::class, 'edit'])->name('edit.kegiatan');
        Route::POST('kegiatan/edit/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
        Route:: DELETE('kegiatan/delete/{id}', [KegiatanController::class, 'destroy'])->name('delete.kegiatan');
    });
    //Bendahara Group
Route::group(['middleware' => ['auth', 'userAkses:bendahara']], function () {
    Route::get('bendahara/tambah', [BendaharaController::class, 'create'])->name('bendahara');
    Route::get('bendahara/profile', [BendaharaController::class, 'profile'])->name('profile');
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    // Route::get('laporan/invoice/{id}', [TransaksiController::class, 'invoice'])->name('invoice');

    //pembayaran
    Route::get('kategori', [KategoriController::class, 'kategori'])->name('kategori');
    Route::get('kategori/edit/{id}',[KategoriController::class, 'edit'])->name('edit.kategori');
    Route::post('kategori/edit/{id}',[KategoriController::class, 'update'])->name('update.kategori');
    Route::get('kategori/create', [KategoriController::class, 'create'])->name('create.kategori');
    Route::POST('kategori/create', [KategoriController::class, 'store'])->name('create.kategori');
    Route::DELETE('kategori/delete/{id}',[KategoriController::class, 'destroy'])->name('delete.kategori');
    //pembayaran
    Route::get('bendahara/tagihan', [TagihanController::class,'index'])->name('tagihan');
    // Route::get('bendahara/tagihan/create', [TagihanController::class,'create'])->name('create.tagihan');
    // Route::post('bendahara/tagihan/create', [TagihanController::class,'store'])->name('store.tagihan');
    Route::get('bendahara/tagihan/edit/{id}', [TagihanController::class,'edit'])->name('edit.tagihan');
    Route::post('bendahara/tagihan/edit/{id}', [TagihanController::class,'update'])->name('update.tagihan');
    Route::DELETE('bendahara/tagihan/delete/{id}', [TagihanController::class,'destroy'])->name('destroy.tagihan');


});

Route::group(['middleware' => ['auth', 'userAkses:bendahara,operator']], function () {

    Route::get('bendahara/tagihan/create', [TagihanController::class,'create'])->name('create.tagihan');
    Route::post('bendahara/tagihan/create', [TagihanController::class,'store'])->name('store.tagihan');
});

    //Operator Group
Route::group(['middleware' => ['auth', 'userAkses:operator']], function () {
    // Route::get('pembayaran', [OperatorController::class, 'pembayaran'])->name('pembayaran');
    // Route::get('pembayaran/view/{id}', [OperatorController::class, 'view'])->name('view');
    // Route::post('bayar/{id}', [OperatorController::class, 'bayar'])->name('bayar');
    // Route::get('invoice/{id}', [OperatorController::class, 'invoice'])->name('invoice');

    Route::get('pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('pembayaran/view/{id}', [PembayaranController::class, 'view'])->name('view');
    Route::post('bayar/{id}', [PembayaranController::class, 'bayar'])->name('bayar');
    Route::get('invoice/{id}', [PembayaranController::class, 'invoice'])->name('invoice');

    //Donasi
    Route::get('operator/donasi', [DonasiController::class, 'index'])->name('donasi');
    // Route::get('operator/donasi', [OperatorController::class, 'bayar'])->name('bayar');
    Route::get('donasi/tambah', [DonasiController::class, 'create'])->name('tambah.donasi');
    Route::post('donasi/tambah', [DonasiController::class, 'store'])->name('donasi.store');
    Route::get('donasi/edit/{id}', [DonasiController::class, 'edit'])->name('edit.donasi');
    Route::POST('donasi/edit/{id}', [DonasiController::class, 'update'])->name('donasi.update');
    Route:: DELETE('donasi/delete/{id}', [DonasiController::class, 'destroy'])->name('delete.donasi');

    // Inventaris
    Route::get('inventaris', [InventarisController::class, 'index'])->name('view');
    Route::get('inventaris/tambah', [InventarisController::class, 'create'])->name('tambah.inventaris');
    Route::post('inventaris/tambah', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::get('inventaris/edit/{id}', [InventarisController::class, 'edit'])->name('edit.inventaris');
    Route::POST('inventaris/edit/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
    Route:: DELETE('inventaris/delete/{id}', [InventarisController::class, 'destroy'])->name('delete.inventaris');
});

    //operator
Route::middleware(['guest'])->group(function () {
    Route::get('halaman',[AdminController::class, 'halaman'])->name('halaman');

});



Route::get('logout',[AuthController::class, 'logout']);
