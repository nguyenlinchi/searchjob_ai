<?php

use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\MbtiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SavedJobController;



// Route::get('/', function () {
//     return view('career.index');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

Route::get('/company/{id}', [CompanyController::class, 'show'])
    ->name('company');
Route::get('/career', [CareerController::class, 'index'])->name('career.index');
Route::get('/career/{id}', [CareerController::class, 'show'])->name('career.show');
Route::get('/career/search', [CareerController::class, 'search']);
Route::get('/mbti-test', [MbtiController::class, 'index'])->name('career.test');



// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/candidate/home', [HomeController::class, 'index'])
    ->name('candidate.home');

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// test role
Route::get('/admin', function () {
    return "Trang ADMIN";
});

Route::get('/employer', function () {
    return "Trang EMPLOYER";
});

Route::get('/candidate', function () {
    return "Trang CANDIDATE";
});
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'index'])
        ->name('profile');

    Route::post('/profile/update', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::get('/profile/apply/{id}', [ProfileController::class, 'apply'])
        ->name('profile.apply');
    Route::post('/profile/apply/{id}',[ProfileController::class, 'storeApply']
    )->name('profile.storeApply');
    Route::delete('/application/delete/{id}',[ProfileController::class, 'deleteApplication'])
    ->name('application.delete');





    Route::get('/resume/create', [ProfileController::class, 'createResume'])
        ->name('resume.create');

    Route::post('/resume/store', [ProfileController::class, 'storeResume'])
        ->name('resume.store');

});
Route::post(
    '/save-job/{id}',
    [SavedJobController::class, 'toggle']
)->name('save.job');

Route::get(
    '/saved-jobs',
    [SavedJobController::class, 'index']
)->name('saved.jobs');
