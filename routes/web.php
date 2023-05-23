<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SessionController;

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

Route::get('/', [ProgramController::class, 'home']); 


Route::get('/lab', [GalleryController::class, 'index']);
Route::get('/galleries/trash', [GalleryController::class, 'trash'])->middleware('admin'); 
Route::get('/gallery/create', [GalleryController::class, 'create'])->middleware('admin'); 
Route::post('/gallery/restore/{slug}', [GalleryController::class, 'restore'])->middleware('admin'); 
Route::get('/gallery/edit/{slug}', [GalleryController::class, 'edit'])->middleware('admin'); 
Route::post('/gallery/update/{slug}', [GalleryController::class, 'update'])->middleware('admin'); 
Route::post('/gallery/store', [GalleryController::class, 'store'])->middleware('admin');
Route::post('/gallery/delete/{slug}', [GalleryController::class, 'destroy'])->middleware('admin');
Route::post('/gallery/destroy/{slug}', [GalleryController::class, 'delete'])->middleware('admin');
Route::get('/gallery/{slug}', [GalleryController::class, 'show']); 

Route::get('/programs', [ProgramController::class, 'index']); 
Route::get('/programs/trash', [ProgramController::class, 'trash'])->middleware('admin'); 
Route::get('/program/create', [ProgramController::class, 'create'])->middleware('admin'); 
Route::post('/program/restore/{slug}', [ProgramController::class, 'restore'])->middleware('admin'); 
Route::get('/program/edit/{slug}', [ProgramController::class, 'edit'])->middleware('admin'); 
Route::post('/program/update/{slug}', [ProgramController::class, 'update'])->middleware('admin');
Route::post('/program/store', [ProgramController::class, 'store'])->middleware('admin');
Route::post('/program/delete/{slug}', [ProgramController::class, 'destroy'])->middleware('admin');
Route::post('/program/destroy/{slug}', [ProgramController::class, 'delete'])->middleware('admin');
Route::get('/program/{slug}', [ProgramController::class, 'show']); 

Route::get('/apply/{slug}', [ApplicantController::class, 'create']); 
Route::post('/application/store', [ApplicantController::class, 'store']); 
Route::get('/applicants', [ApplicantController::class, 'index']); 

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');
Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::post('/session/create', [SessionController::class, 'store']);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// is_active
// trash
// data is not kept after submiting in case something went wrong. poster photo is required for some reason
//validator->fails, redirect()->withInput(), old('title')
// applicants need more fields
// deleting and editing tabs needs to be implemented