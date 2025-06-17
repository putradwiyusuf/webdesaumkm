<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::middleware(['auth', 'ceklevel:admin,superadmin'])->group(function () {
    Route::resource('admin/sliders', \App\Http\Controllers\SliderController::class);
    Route::resource('admin/services', \App\Http\Controllers\ServiceController::class);
    Route::resource('admin/umkm', \App\Http\Controllers\UmkmController::class);
    Route::resource('admin/perangkat', \App\Http\Controllers\PerangkatController::class);
    Route::resource('admin/sambutan', \App\Http\Controllers\SambutanController::class);
    Route::resource('admin/data', \App\Http\Controllers\DataController::class);
    Route::resource('admin/testimoni', \App\Http\Controllers\TestimoniController::class);
    Route::resource('admin/news', \App\Http\Controllers\NewsController::class);
    Route::resource('admin/galeri', \App\Http\Controllers\GaleriController::class);
    Route::resource('admin/event', \App\Http\Controllers\EventController::class);
    Route::resource('admin/products', ProductController::class);
    Route::delete('admin/products/bulk-delete', [ProductController::class, 'bulkDelete'])->name('products.bulkDelete');
    // Route::get('/products/export', [ProductController::class, 'export'])->name('products.export');
    // Route::get('/products/import', [ProductController::class, 'import'])->name('products.import');
});

Route::middleware(['auth', 'ceklevel:superadmin'])->group(function () {
    Route::resource('admin/user', \App\Http\Controllers\UserController::class);
});

// Route::middleware(['auth', 'ceklevel:user'])->group(function () {
//     Route::resource('admin/products', ProductController::class);
// });

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

