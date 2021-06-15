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

Route::middleware('auth')->group(function () {
    Route::get('welcome', [\App\Http\Controllers\PageController::class, 'welcome'])->name('welcome');
    Route::get('consultation', [\App\Http\Controllers\PageController::class, 'consultation'])->name('consultation');

    Route::prefix('admin')->as('admin.')->middleware('is_admin')->group(function () {
        Route::resource('pages', Admin\PageController::class)->only(['edit', 'update']);
        Route::resource('checklist_groups', Admin\ChecklistGroupController::class);
        Route::resource('checklist_groups.checklist', Admin\ChecklistController::class);
        Route::resource('checklist.tasks', Admin\TaskController::class);
    });
});
