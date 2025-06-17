<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UmkmController;

// Halaman public
Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'index']);
Route::get('/contact', [HomeController::class, 'index']);
Route::get('/event', [HomeController::class, 'event']);
Route::get('/umkm', [HomeController::class, 'umkm']);
Route::get('/umkm/{umkm}', [HomeController::class, 'umkmDetail'])->name('umkm.detail');
Route::get('/galeri', [HomeController::class, 'galeri']);
Route::get('/datadesa', [HomeController::class, 'data']);
Route::get('/berita', [HomeController::class, 'news']);
Route::get('/sotk', [HomeController::class, 'perangkat']);
Route::post('/product/{id}/click', [ProductController::class, 'incrementClick']);// web.php
Route::get('/product/{product}', [HomeController::class, 'product'])->name('product.show');



// Halaman login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticated']);
Route::get('/logout', [AuthController::class, 'logout']);

// Halaman dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);

// Route untuk semua level yang login: superadmin, admin, user
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
    Route::delete('products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');
});

// Hanya untuk admin & superadmin
Route::middleware(['auth', 'ceklevel:admin,superadmin'])->prefix('admin')->group(function () {
    Route::resource('sliders', \App\Http\Controllers\SliderController::class);
    Route::resource('services', \App\Http\Controllers\ServiceController::class);
    Route::resource('umkm', UmkmController::class);
    Route::resource('perangkat', \App\Http\Controllers\PerangkatController::class);
    Route::resource('sambutan', \App\Http\Controllers\SambutanController::class);
    Route::resource('data', \App\Http\Controllers\DataController::class);
    Route::resource('testimoni', \App\Http\Controllers\TestimoniController::class);
    Route::resource('news', \App\Http\Controllers\NewsController::class);
    Route::resource('galeri', \App\Http\Controllers\GaleriController::class);
    Route::resource('event', \App\Http\Controllers\EventController::class);
});

// Hanya untuk superadmin
Route::middleware(['auth', 'ceklevel:superadmin'])->prefix('admin')->group(function () {
    Route::resource('user', \App\Http\Controllers\UserController::class);
});

Route::middleware(['auth', 'ceklevel:user'])->prefix('user')->group(function () {
    Route::get('/umkm/edit', [UmkmController::class, 'editByUser'])->name('umkm.user.edit');
    Route::put('/umkm/update', [UmkmController::class, 'updateByUser'])->name('umkm.user.update');
});

Route::prefix('informasi')->group(function () {
    Route::view('/', 'home.informasi');
    Route::view('/beranda', 'home.index');
    Route::view('/kk', 'home.kk');
    Route::view('/aktekelahiran', 'home.aktekelahiran');
    Route::view('/aktekematian', 'home.informasi');
    Route::view('/pindahdomisili', 'home.pindahdomisili');
    Route::view('/izinkeramaian', 'home.izinkeramaian');
    Route::view('/ktp', 'home.ktp');
});

Route::prefix('profil')->group(function () {
    Route::view('/', 'profil.profil');
    Route::view('/asetdesa', 'profil.aset');
    Route::view('/kelembagaan', 'profil.kelembagaan');
    Route::view('/potensi', 'profil.potensi');
    Route::view('/sejarah', 'profil.sejarah');
    Route::view('/visimisi', 'profil.visimisi');
});

