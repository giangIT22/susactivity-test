<?php

use App\Http\Controllers\Admin\EntryController;
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
Route::get('/', function() {
    return redirect()->route('entry.index');
});

Route::prefix('admin')->group(function() {
    Route::get('/member', [EntryController::class, 'getAll'])->name('entry.index');
    Route::get('/member/form/{id}', [EntryController::class, 'findMember'])->name('entry.edit');
    Route::get('/member/download-csv', [EntryController::class, 'downloadCsv'])->name('entry.download-csv');
});
