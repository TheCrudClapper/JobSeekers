<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobOfferController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home']);
Route::get('/account/login', [AccountController::class, 'login']);
Route::get('/account/register', [AccountController::class, 'register']);
Route::post('/account/registerUser', [AccountController::class, 'registerUser']);
Route::post('/account/loginUser', [AccountController::class, 'loginUser']);
Route::get('/account/profile', [AccountController::class, 'profile'])->middleware('auth');
Route::get('/account/logout', [AccountController::class, 'logout'])->middleware('auth');
Route::post('/account/update', [AccountController::class, 'update'])->middleware('auth');
Route::post('/account/changePassword', [AccountController::class, 'changePassword'])->middleware('auth');
Route::get('/account/deleteAccount', [AccountController::class, 'deleteAccount'])->middleware('auth');

//Job Routes
Route::get('/job/create', [JobOfferController::class, 'create'])->middleware('auth');
Route::get('/job/user-jobs', [JobOfferController::class, 'userJobs'])->middleware('auth');
Route::get('/job/edit-job/{id}', [JobOfferController::class, 'edit'])->middleware('auth');
Route::get('/job/show-job/{id}', [JobOfferController::class, 'showJob'])->middleware('auth');
Route::post('/job/edit-job/{id}', [JobOfferController::class, 'editJob'])->middleware('auth');
Route::post('/job/delete-job/{id}', [JobOfferController::class, 'deleteJob'])->middleware('auth');
Route::post('/job/createJob', [JobOfferController::class, 'createJob'])->middleware('auth');
Route::get('/job/job-browser', [JobOfferController::class, 'jobBrowser']);
