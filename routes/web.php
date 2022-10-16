<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormPageController;

Route::get('/', [FormPageController::class,'index'])->name('form.index');
Route::post('/', [FormPageController::class,'submit'])->name('form.submit');

use App\Http\Controllers\RedirectController;
Route::get('/{token}', [RedirectController::class,'index'])->name('redirect.index');
