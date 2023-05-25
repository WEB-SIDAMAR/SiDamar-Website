<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresentController;
use App\Http\Controllers\BulanKasController;

use App\Http\Controllers\PembayaranKasController;
use App\Http\Controllers\ArsipFilmController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\ArsipFilm;
use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\FillPDFController;


use App\Http\Controllers\EventMemberController;
use App\Http\Controllers\PresentMemberController;
use App\Models\Event;
use App\Models\Present;

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

// Home
Route::get('/', function () {
    return view('index');
});

// login logout
Route::get('/login',[LoginController::class, 'index'])->name('login');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::get('/logout',[LoginController::class, 'logout']);

// blog
// Route::get('/posts', [PostController::class, 'index']);
Route::get('/blog/{slug}',[PostController::class, 'show'])->name('isi');
Route::get('/blog/category/{category}',[PostController::class, 'listCategory'])->name('list.category');

Route::resource('/blog',PostController::class);


// Route::middleware(['auth'])->group(function () {
//     // Semua route yang perlu di-authenticate akan ditempatkan di dalam grup ini
// });
/****/

// Dashboard Member Start
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');
Route::get('/merchandise', function(){
    return view('merchandise');
});
Route::get('/donation', function(){
    return view('donation');
});
Route::get('/form-donation', function(){
    return view('form-donation');
});

// Route::get('/dashboard/event', function(){ return view('dashboard.event'); });
// Route::get('/dashboard/event//{year}/{month}', [EventMemberController::class, 'showCalendar'])->name('calendar');
Route::get('/dashboard/event', [EventMemberController::class, 'index']);


Route::get('/dashboard/kas', function(){
    return view('dashboard.kas');
});
Route::get('/dashboard/present', [PresentMemberController::class, 'show']);
Route::get('/dashboard/donasi', function(){
    return view('dashboard.donasi');
});
Route::get('/dashboard/merch', function(){
    return view('dashboard.merch');
});
Route::get('/dashboard/finance', function(){
    return view('dashboard.finance');
});

Route::get('/dashboard/statuscertificate',[CertificatesController::class, 'admin']);

Route::get('/dashboard/statuscertificate/approved/{id}',[CertificatesController::class, 'approved']);
Route::get('/dashboard/statuscertificate/rejected/{id}',[CertificatesController::class, 'rejected']);
Route::resource('/dashboard/certificate',CertificatesController::class);
// Dashboard Member End

// Dashboard Template Start
Route::get('/dashboard/template/form', function(){
    return view('dashboard.template.form');
});
// Dashboar Template End

/****/

// Dashboard Admin Start
Route::get('/dashboard/events/deleted',[EventController::class, 'deleted']);
Route::get('/dashboard/events/restore/{id}',[EventController::class, 'restore'])->name('events.restore');
Route::delete('/dashboard/events/kill/{id}',[EventController::class, 'kill'])->name('events.kill');
Route::resource('/dashboard/events', EventController::class);
// Route::resource('/dashboard/presents', PresentController::class);

// Present Route
Route::get('/dashboard/presents', [PresentController::class,'index']);
Route::get('/dashboard/present/{id}', [PresentController::class, 'show']);
Route::post('/dashboard/present/{present}/', [PresentController::class, 'store']);
Route::delete('/dashboard/present/delete/{id}/{user}', [PresentController::class, 'destroy']);




// Dashboard Admin End

/****/

// Dashboard Author Start
Route::get('/dashboard/posts/deleted',[DashboardPostController::class, 'deleted']);
Route::get('/dashboard/posts/restore/{id}',[DashboardPostController::class, 'restore'])->name('posts.restore');
Route::delete('/dashboard/posts/kill/{id}',[DashboardPostController::class, 'kill'])->name('posts.kill');
Route::resource('/dashboard/posts',DashboardPostController::class);
Route::resource('/dashboard/posts',DashboardPostController::class);
Route::resource('dashboard/categories',PostCategoryController::class);
// Route::get('/dashboard/posts/checkSlug',[DashboardPostController::class, 'checkSlug']);
Route::post('/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])->name('posts.checkSlug');


// Route::get('/posts', [PostController::class, 'index']);
// Dashboard Author End

//Dashboard Bulan Kas
Route::resource('/dashboard/bulanKas', BulanKasController::class);

//Dashboard Pembayaran Kas
Route::resource('/dashboard/pembayaranKas', PembayaranKasController::class);
Route::get('/dashboard/pembayaranKas/create/{bulanKasId}', [PembayaranKasController::class, 'create']);
Route::post('/dashboard/pembayaranKas/{id}', [PembayaranKasController::class, 'store']);
Route::get('/dashboard/pembayaranKas/{bulanKasId}/{pembayaranKasId}/edit', [PembayaranKasController::class, 'edit']);


//Dashboard Arsip Film
Route::resource('/dashboard/arsipFilm', ArsipFilmController::class);
//the /arsipFilm is the path, ArsipFilmController is the controller
//i want the create2.blade.php to connected to ArsipFilmController in create method
Route::get('/arsipFilm', [ArsipFilmController::class, 'create2']);
//the forrm is in create2.blade.php
//the form is connected to ArsipFilmController in store method
Route::get('/arsipFilm/{id}', [ArsipFilmController::class, 'show']);
//if user not doing login, they can fill form from arsipfil.blade.php
//if they login, they can fill form from dashboard/arsipFilm/create.blade.php

//About Page
Route::get('/about', function () {
    return view('about');
});

//if request from button Diterima then run method diterima() else ditolak()
Route::post('/buat',[FillPDFController::class, 'process'])->name('buat');
