<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisitController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReporterController;

Route::get('/', function () {
    return view('front.home');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//GoogleSignup Route
Route::get('/login/google',[GoogleController::class,'redirectToGoogle'])->name('login.google');
Route::get('auth/google/callback',[GoogleController::class,'handleGoogleCallback']);


//Frontend page related route
Route::get('/',[VisitController::class,'site_index'])->name('site.index');
Route::get('/about',[VisitController::class,'about'])->name('visit.about');
Route::post('/new-category',[VisitController::class,'whats_category'])->name('whats.category');
Route::get('/news/details/{id}',[VisitController::class,'news_details'])->name('news.details');
Route::get('/visitor/view',[VisitController::class,'visited_views'])->name('visitors.view');
Route::post('/pagination/paginate',[VisitController::class,'pagination']);
Route::get('/contact-us',[VisitController::class,'contact_page'])->name('contact.page');

//Admin related route
Route::get('/admin/dashboard',[AdminController::class,'admin_home'])->name('admin.dashboard')->middleware(['auth','admin']);
Route::get('/post/done/{id}',[AdminController::class,'accept_post'])->name('active.post')->middleware(['auth','admin']); //post active(accepted)
Route::get('/active/undo/{id}',[AdminController::class,'undo_post'])->name('pending.post')->middleware(['auth','admin']); //post pending(undo active)
Route::get('/tranding/active/{id}',[AdminController::class,'tranding_do'])->name('tranding.active');//post doing tranding
Route::get('/tranding/inactive/{id}',[AdminController::class,'tranding_die'])->name('tranding.inactive');//post is not tranding
Route::Post('/first-carousel',[AdminController::class,'sltcat_fstcarosel'])->name('select.fstcarousel');//select category for first carousel
Route::Post('/first-sidebar',[AdminController::class,'sltcat_firstsidebar'])->name('select.firstsidebar');//select category for first sidebar
Route::Post('/second/sidebar',[AdminController::class,'sltcat_secondsidebar'])->name('select.secondsidebar');//select category for 2nd sidebar



//Reporter related route
Route::get('/reporter/dashboard',[ReporterController::class,'reporter_home'])->name('reporter.dashboard')->middleware(['auth','reporter']);
Route::get('/reporter/add-post',[ReporterController::class,'reported_speech'])->name('reporter.post')->middleware(['auth','reporter']);
Route::get('/reporter/add-video',[ReporterController::class,'youtube_video'])->name('youtube.video');
Route::post('/add-youtube-video',[ReporterController::class,'addyoutube_video'])->name('createyoutube.video');
Route::get('all-video',[ReporterController::class,'all_video'])->name('all.video');
Route::get('update/video/{id}',[ReporterController::class,'update_video'])->name('update.video');
Route::PUT('updated/video/{id}',[ReporterController::class,'updated_video'])->name('updated.video');
Route::get('delete/video/{id}',[ReporterController::class,'deleted_video'])->name('delete.video');

//category related route
Route::get('/all-category',[CategoryController::class,'category'])->name('all.category')->middleware(['auth','admin']);
Route::post('/add/category',[CategoryController::class,'add_category'])->name('add.category')->middleware(['auth','admin']);
Route::post('/update/category',[CategoryController::class,'updated_category'])->name('updated.category')->middleware(['auth','admin']);
Route::post('/delete/category',[CategoryController::class,'deleted_category'])->name('deleted.category')->middleware(['auth','admin']);

//Posts related route
Route::get('/all/post',[PostController::class,'posts'])->name('all.posts')->middleware(['auth','admin']);
Route::post('/add/post',[PostController::class,'add_post'])->name('add.posts')->middleware(['auth','visitor']);
Route::post('/update/post',[PostController::class,'update_post'])->name('update.posts')->middleware(['auth','visitor']);
Route::post('/delete/post',[PostController::class,'delete_post'])->name('delete.posts')->middleware(['auth','admin']);
Route::get('/single/post/{id}',[PostController::class,'singleshow_post'])->name('single.posts')->middleware(['auth','visitor']);
