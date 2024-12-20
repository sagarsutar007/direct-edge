<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OpeningsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\FeedbackController;

use App\Http\Controllers\CompaniesController;

Route::get('/', [WebController::class, 'index'])->name('homepage');
Route::get('/about-us', [WebController::class, 'about'])->name('about');
Route::get('/services', [WebController::class, 'services'])->name('services');
Route::get('/testimonial', [WebController::class, 'testimonial'])->name('testimonial');
Route::get('/about/our-team', [WebController::class, 'team'])->name('team');
Route::get('/about/our-features', [WebController::class, 'features'])->name('features');
Route::get('/partners', [WebController::class, 'partners'])->name('partners');
Route::get('/contact-us', [WebController::class, 'contact'])->name('contact');
Route::get('/faqs', [WebController::class, 'faqs'])->name('faqs');
Route::get('/support', [WebController::class, 'support'])->name('support');
Route::get('/privacy-policy', [WebController::class, 'privacy'])->name('privacy');
Route::get('/terms-and-conditions', [WebController::class, 'terms'])->name('terms');
Route::get('/career', [WebController::class, 'terms'])->name('career');
Route::get('/certification-program', [WebController::class, 'certification'])->name('certification');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs');
Route::get('/jobs/{slug}', [JobController::class, 'show'])->name('jobs.show');

Auth::routes(); 

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/app', [App\Http\Controllers\HomeController::class, 'index'])->name('app');
Route::get('/app/openings', [App\Http\Controllers\HomeController::class, 'openings'])->name('openings');


Route::post('/app/fetch-openings', [App\Http\Controllers\OpeningsController::class, 'index'])->name('openings.fetchOpenings');

Route::delete('app/delete-opening/{opening}', [OpeningsController::class, 'destroy'])->name('openings.destroy');

Route::get('/app/filter-companies', [App\Http\Controllers\CompaniesController::class, 'filter'])->name('companies.filter');

Route::post('/app/openings/store', [App\Http\Controllers\OpeningsController::class, 'store'])->name('openings.store');



Route::get('/app/add-openings', [App\Http\Controllers\OpeningsController::class, 'add'])->name('openings.add');


Route::get('/app/sliders', [SliderController::class, 'index'])->name('sliders');
Route::get('/app/sliders/create', [SliderController::class, 'create'])->name('sliders.create');
Route::post('/app/sliders/store', [SliderController::class, 'store'])->name('sliders.store');
Route::get('/app/sliders/{slider}/edit', [SliderController::class, 'edit'])->name('sliders.edit');
Route::post('/app/sliders/{slider}/update', [SliderController::class, 'update'])->name('sliders.update');
Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('sliders.destroy');
Route::delete('/app/sliders/images/{image}', [SliderController::class, 'deleteImage'])->name('image.delete');


Route::get('/app/feedbacks', [FeedbackController::class, 'index'])->name('feedbacks');
Route::get('/app/feedbacks/create', [FeedbackController::class, 'create'])->name('feedbacks.create');
Route::post('/app/feedbacks/store', [FeedbackController::class, 'store'])->name('feedbacks.store');
Route::post('/app/feedbacks/save', [FeedbackController::class, 'save'])->name('feedbacks.save');
Route::get('/app/feedbacks/{feedback}/edit', [FeedbackController::class, 'edit'])->name('feedbacks.edit');
Route::post('/app/feedbacks/{feedback}/update', [FeedbackController::class, 'update'])->name('feedbacks.update');
Route::delete('/app/feedbacks/{feedback}', [FeedbackController::class, 'destroy'])->name('feedbacks.destroy');
Route::post('/app/feedbacks/search', [FeedbackController::class, 'search'])->name('feedbacks.search');