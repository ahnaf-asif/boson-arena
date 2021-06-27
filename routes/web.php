<?php

use App\Http\Controllers\DraftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify'=>true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function(){

    Route::prefix('profile')->group(function(){
        Route::get('/{username}/', [ProfileController::class , 'index'])->name('profile');
        route::get('/{username}/edit', [ProfileController::class, 'showProfileEditForm'])->name('profile.edit');
        Route::post('/{username}/edit' , [ProfileController::class, 'editProfile'])->name('profile.edit.backend');
        Route::post('/picture/update', [ProfileController::class, 'updateProfilePicture'])->name('profile.picture.update');
    });

});
Route::middleware(['author'])->group(function(){

    Route::prefix('draft')->group(function(){
        Route::get('/', [DraftController::class, 'index'])->name('draft');
        Route::get('/new', [DraftController::class, 'showCreateForm'])->name('create.draft');
        Route::post('/new/create',[DraftController::class, 'create'] )->name('create.draft.backend');
    });

});
Route::middleware(['moderator'])->group(function(){


});

Route::middleware(['admin'])->group(function(){




});
