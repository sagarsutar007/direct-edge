<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WebController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\OpeningsController;

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

Route::get('/app/companies', [App\Http\Controllers\OpeningsController::class, 'fetchCompanies'])->name('companies.fetch');

Route::post('/app/openings/store', [App\Http\Controllers\OpeningsController::class, 'store'])->name('openings.store');



Route::get('/app/add-openings', [App\Http\Controllers\OpeningsController::class, 'add'])->name('openings.add');