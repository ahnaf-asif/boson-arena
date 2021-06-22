<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify'=>true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function(){

    Route::get('profile/{username}', [ProfileController::class , 'index'])->name('profile');
    route::get('profile/{username}/edit', [ProfileController::class, 'showProfileEditForm'])->name('profile.edit');
    Route::post('profile/{username}/edit' , [ProfileController::class, 'editProfile'])->name('profile.edit.backend');
    Route::post('profile/picture/update', [ProfileController::class, 'updateProfilePicture'])->name('profile.picture.update');

});
Route::middleware(['author'])->group(function(){


});
Route::middleware(['moderator'])->group(function(){


});

Route::middleware(['admin'])->group(function(){




});
