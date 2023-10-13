<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\NoteContentController;
use App\Http\Controllers\NoteColorController;
use App\Http\Controllers\Controller;

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

Route::get('/', [Controller::class, 'index']);

Route::get('/login', [SessionsController::class, 'create'])->name('login')->middleware('guest');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/notes', [NotesController::class, 'index'])->name('home')->middleware('auth');
Route::post('/notes', [NotesController::class, 'store'])->middleware('auth');
Route::get('/notes/{note:slug}', [NotesController::class, 'show'])->middleware('auth');
Route::delete('/notes/{note:slug}', [NotesController::class, 'destroy'])->middleware('auth');
Route::patch('/notes/{note:slug}', [NotesController::class, 'update'])->middleware('auth');
Route::get('/notes/edit/{note:slug}', [NotesController::class, 'edit'])->middleware('auth');
Route::patch('notes/{note:slug}/color', [NoteColorController::class, 'update'])->middleware('auth');

Route::post('/notes/{note:slug}', [NoteContentController::class, 'store'])->middleware('auth');
Route::delete('notes/content/{content:id}', [NoteContentController::class, 'delete'])->middleware('auth');
Route::patch('notes/content/{content:id}', [NoteContentController::class, 'update'])->middleware('auth');