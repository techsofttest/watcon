<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SummaryController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\WorkPackageController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\DatabaseController;



Route::get('/',[HomeController::class,'index']);

Route::get('/summary',[SummaryController::class,'index']);

Route::get('/team',[TeamController::class,'index']);

Route::get('/contact',[ContactController::class,'index']);

Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

Route::get('/jobs',[JobController::class,'index']);

Route::get('/books',[PublicationController::class,'books']);

Route::get('/articles-book-chapters',[PublicationController::class,'articles']);

Route::get('/publications/{slug}',[PublicationController::class,'detail']);

Route::get('/blogs',[BlogController::class,'index']);
Route::get('/blogs/{slug}',[BlogController::class,'detail']);


Route::get('/news',[EventController::class,'index']);
Route::get('/news/{slug}',[EventController::class,'detail']);

Route::get('/work-packages',[WorkPackageController::class,'index']);


Route::get('/database',[DatabaseController::class,'index']);

Route::get('/search',[DatabaseController::class,'search']);

Route::get('/load-more-documents', [DatabaseController::class, 'loadMoreDocuments']);


use Illuminate\Support\Facades\Artisan;

Route::get('/live', function () {
    Artisan::call('optimize');
    //Artisan::call('storage:link');
    return '<h3>Optimized & Linked successfully!</h3>';
});

Route::get('/clear', function () {
    Artisan::call('optimize:clear');
    return '<h3>Optimization cache cleared!</h3>';
});
