<?php

use App\Models\AbsensiMasuk;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\AbsenMasukController;
use App\Http\Controllers\AbsenKeluarController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\JadwalLatihanController;
use App\Http\Controllers\JadwalTurnamenController;
use App\Http\Controllers\ProgramLatihanController;
use App\Http\Controllers\RiwayatLatihanController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\KlasifikasiAtletController;
use App\Http\Controllers\AgendaPertandinganController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\HasilLatihanController;
use App\Http\Controllers\RiwayatController;

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



Route::get('/predict', [KlasifikasiAtletController::class, 'predict']);
Route::get('/train-model', [KlasifikasiAtletController::class, 'trainAndSaveModel']);
Route::get('testModel', [KlasifikasiAtletController::class, 'testModel']);


// frontend
Route::get('/atlet', [FrontendController::class, 'anggota'])->name('anggota');
Route::get('anggota/{slug}', [FrontendController::class, 'detailanggota'])->name('detail-anggota');
Route::get('blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('blog/{slug}', [FrontendController::class, 'detailblog'])->name('detail-blog');
Route::get('coach', [FrontendController::class, 'pelatih'])->name('data-pelatih');
Route::get('pelatih/{slug}', [FrontendController::class, 'detailpelatih'])->name('detail-pelatih');
Route::get('about', [FrontendController::class, 'about'])->name('about');
Route::get('galeri', [FrontendController::class, 'gallery'])->name('galeri');
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
Route::get('form-pendaftaran', [FrontendController::class, 'indexPendaftaran'])->name('form-pendaftaran');
Route::post('form-pendaftaran', [FrontendController::class, 'storePendaftaran'])->name('form-pendaftaran-store');
Route::get('turnamen', [FrontendController::class, 'turnamen'])->name('turnamen');
Route::get('latihan', [FrontendController::class, 'latihan'])->name('latihan');
Route::get('prestasi', [FrontendController::class, 'prestasi'])->name('prestasi');
Route::get('agenda-pertandingan', [FrontendController::class, 'agenda'])->name('agenda');






Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [AdminController::class, 'card'])->name('dashboard');


    Route::group(['middleware' => ['role:admin']], function () {

        Route::resource('/anggota', AnggotaController::class);
        Route::resource('/user', UserController::class);
        Route::resource('/kategori', KategoriController::class);
        Route::resource('/post', PostController::class);
        Route::resource('/pelatih', PelatihController::class);
        Route::resource('/gallery', GalleryController::class);
        Route::resource('/pendaftaran', PendaftaranController::class);
        Route::get('evaluasi', [KlasifikasiAtletController::class, 'Pengujian'])->name('evaluasi');
    });

    Route::resource('/hasil-latihan', HasilLatihanController::class);
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
    Route::get('/statistik-latihan', [RiwayatController::class, 'chartRiwayat'])->name('chart-riwayat');
    Route::resource('jadwal-latihan', JadwalLatihanController::class);
    Route::resource('/agenda', AgendaPertandinganController::class);
    Route::resource('/prestasi', PrestasiController::class);
    Route::resource('/program-latihan', ProgramLatihanController::class);

    Route::get('/data-diri', [AnggotaController::class, 'createAnggota'])->name('data-diri');
    Route::post('/data-diri', [AnggotaController::class, 'storeAnggota'])->name('data-diri.store');




    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/{id}', [AnggotaController::class, 'updateAnggota'])->name('profile.update');

    Route::get('akun', [ProfileController::class, 'akun'])->name('akun');
    Route::put('akun/{id}', [ProfileController::class, 'updateAkun'])->name('akun.update');


    Route::get('chart', [AdminController::class, 'chart'])->name('chart');

    // pdf
    Route::get('pdf', [KategoriController::class, 'view_pdf'])->name('view_pdf');
    Route::get('pdf-user', [UserController::class, 'dwonload_pdf'])->name('dwonload_pdf_user');
    Route::get('pdf-anggota', [AnggotaController::class, 'dwonload_pdf'])->name('dwonload_pdf_anggota');
    Route::get('pdf-pelatih', [PelatihController::class, 'dwonload_pdf'])->name('dwonload_pdf_pelatih');
    Route::get('pdf-pendaftaran', [PendaftaranController::class, 'dwonload_pdf'])->name('dwonload_pdf_pendaftaran');
    Route::get('pdf-prestasi', [PrestasiController::class, 'dwonload_pdf'])->name('dwonload_pdf_prestasi');
});

Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// buatkan route regisester breeze
Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('register', [RegisteredUserController::class, 'store']);


// password reset
Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
Route::post('reset-password', [NewPasswordController::class, 'store'])->name('password.update');
