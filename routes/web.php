<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::prefix('admin')->as('admin.')->middleware('is_admin')->group(function () {
        Route::resource('pages', Admin\PageController::class);
        Route::resource('checklist_groups', Admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklist', Admin\ChecklistController::class);
    });
});