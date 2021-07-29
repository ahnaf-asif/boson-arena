<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleDraftController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogDraftController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolutionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes(['verify'=>true]);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [Homecontroller::class, 'about'])->name('about');
Route::get('/resources',[HomeController::class, 'resources'] )->name('resources');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::get('/test-vue', function(){
    return view('vue-text');
});

Route::prefix('contact')->group(function(){
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    Route::post('/submit', [ContactController::class, 'sendMessage'])->name('send-message');
});

Route::prefix('gallery')->group(function(){
    Route::get('/', [GalleryController::class, 'index'])->name('gallery');
    Route::get('/view/{id}', [GalleryController::class, 'viewGallery'])->name('view.gallery');
});

Route::prefix('blog')->group(function(){
    Route::get('/', [BlogController::class, 'index'])->name('blog');
    Route::get('/view/{id}', [BlogController::class, 'view'])->name('view.blog');
    Route::get('/search', [BlogController::class, 'search'])->name('blog.search');
    Route::get('/filter', [BlogController::class, 'filterBySubject'])->name('blog.filter.by.subject');
});

Route::prefix('article')->group(function(){
    Route::get('/', [ArticleController::class, 'index'])->name('article');
    Route::get('/show/{id}', [ArticleController::class, 'show'])->name('view.article');
});

Route::middleware(['auth', 'verified'])->group(function(){

    Route::prefix('profile')->group(function(){
        Route::get('/{username}/', [ProfileController::class , 'index'])->name('profile');
        route::get('/{username}/edit', [ProfileController::class, 'showProfileEditForm'])->name('profile.edit');
        Route::post('/{username}/edit' , [ProfileController::class, 'editProfile'])->name('profile.edit.backend');
        Route::post('/picture/update', [ProfileController::class, 'updateProfilePicture'])->name('profile.picture.update');
    });

    Route::prefix('problems')->group(function(){
        Route::get('/', [ProblemController::class, 'index'])->name('problems');
        Route::get('/view/{id}', [ProblemController::class, 'show'])->name('show.problem');
        Route::post('/submit/problem',[ProblemController::class, 'submit'])->name('submit.problem');
        Route::get('/filter/',[ProblemController::class, 'filterBySubject'])->name('filter.by.subject');
        Route::get('/search/', [ProblemController::class, 'search'])->name('search.problem.problems');
        Route::get('/unsolved', [ProblemController::class,'showUnsolved'])->name('unsolved.problems');
    });

});
Route::middleware(['author'])->group(function(){

    Route::prefix('draft')->group(function(){
        Route::get('/', [DraftController::class, 'index'])->name('draft');
        Route::get('/new', [DraftController::class, 'showCreateForm'])->name('create.draft');
        Route::post('/new/create',[DraftController::class, 'create'] )->name('create.draft.backend');
        Route::get('/preview/problem/{id}',[DraftController::class, 'preview'])
            ->name('preview.problem');
        Route::get('/problem/edit/{id}', [DraftController::class, 'edit'])
            ->name('edit.problem');
        Route::post('/problem/edit', [DraftController::class,'edit_backend'])
            ->name('edit.problem.backend');
        Route::get('/problem/delete/{id}',[DraftController::class, 'delete'])
            ->name('delete.problem');

        Route::get('/search/problem',[DraftController::class, 'search'])->name('search.problem');
        Route::get('/add-remove-archive/{problem}/{type}', [DraftController::class, 'addRemoveArchive'])
            ->name('add.remove.archive');
        Route::post('/score/update', [DraftController::class, 'updateScore'])->name('update.score');
        Route::post('/solution/add', [SolutionController::class, 'add'])
            ->name('add.solution');
        Route::post('/solution/delete', [SolutionController::class, 'delete'])
            ->name('delete.solution');
        Route::post('/problem/submit', [SolutionController::class, 'test_submit'])
            ->name('test.submit');

    });


    Route::prefix('/blog-draft')->group(function(){
        Route::get('/', [BlogDraftController::class, 'index'] )->name('blog.draft');
        Route::get('/preview/{id}', [BlogDraftController::class, 'preview'])->name('preview.blog');
        Route::get('/create', [BlogDraftController::class, 'showCreateForm'])->name('create.blog');
        Route::post('/create', [BlogDraftController::class, 'createBlog'])->name('create.blog');
        Route::get('/edit/{id}',[BlogDraftController::class, 'editForm'] )->name('edit.blog');
        Route::post('/update', [BlogDraftController::class, 'updateBLog'])->name('update.blog');
        Route::get('/delete/{id}', [BlogDraftController::class, 'deleteBlog'])->name('delete.blog');
        Route::get('/add-remove-archive/{id}/{type}', [BlogDraftController::class, 'addRemoveArchive'])->name('add.remove.archive.blog');
        Route::post('/og-image-update', [BlogDraftController::class,'updateOgImage'] )->name('blog.og.image.update');
        Route::get('/search', [BlogDraftController::class, 'search'])->name('blog.draft.search');
    });

    Route::prefix('/article-draft')->group(function(){
        Route::get('/', [ArticleDraftController::class, 'index'])->name('article.draft');
        Route::get('/create', [ArticleDraftController::class, 'create'])->name('create.article');
        Route::post('/store', [ArticleDraftController::class, 'store'])->name('store.article');
        Route::get('/show/{id}', [ArticleDraftController::class, 'show'])->name('show.article');
        Route::get('/edit/{id}', [ArticleDraftController::class, 'edit'])->name('edit.article');
        Route::post('/update/{id}', [ArticleDraftController::class, 'update'])->name('update.article');
        Route::get('/delete/{id}', [ArticleDraftController::class, 'destroy'])->name('delete.article');
        Route::get('/add/remove/{id}/{type}', [ArticleDraftController::class, 'addRemoveArchive'])->name('add.remove.archive.article');
        Route::get('/search', [ArticleDraftController::class, 'search'])->name('article.draft.search');
        Route::post('/og/image/update', [ArticleDraftController::class, 'updateOgImage'])->name('article.og.image.update');
    });

});
Route::middleware(['moderator'])->group(function(){


});

Route::middleware(['admin'])->group(function(){

    Route::prefix('admin')->group(function(){

        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/about', [AdminController::class, 'about'])->name('admin.about');
        Route::post('/about/update', [AdminController::class, 'updateAbout'])->name('update.about');
        Route::get('/resources',[AdminController::class, 'resources'])->name('admin.resources');
        Route::post('/resources/update', [AdminController::class, 'updateResources'])->name('admin.update.resources');
        Route::get('/faq', [AdminController::class, 'faq'])->name('admin.faq');
        Route::post('/faq/update', [AdminController::class, 'updateFaq'])->name('admin.update.faq');
        Route::get('/normal-users', [AdminController::class, 'normalUsers'])->name('admin.normal.users');
        Route::get('/all-authors', [AdminController::class, 'allAuthors'])->name('admin.all.authors');

        Route::get('/add-remove-author/{id}/{type}', [AdminController::class, 'addAuthor'])->name('admin.add.author');


        Route::prefix('contact')->group(function(){
            Route::get('/', [AdminController::class, 'contact'])->name('admin.contact');
            Route::get('/all', [AdminController::class, 'allContact'])->name('admin.all.contact');
            Route::get('/mark-as-read/{id}/{type}', [AdminController::class, 'markAsRead'])->name('admin.contact.mark');
        });

        Route::prefix('gallery')->group(function(){
            Route::get('/', [AdminController::class, 'gallery'])->name('admin.gallery');
            Route::get('/new', [AdminController::class, 'newGallery'])->name('admin.new.gallery');
            Route::post('/new/add', [AdminController::class, 'addNewGallery'])->name('admin.add.new.gallery');
            Route::get('/view/{id}', [AdminController::class, 'viewGallery'])->name('admin.view.gallery');
            Route::post('/add/image',[AdminController::class, 'addGalleryImage'])->name('admin.add.new.gallery-image');
            Route::get('/delete/image/{id}/{gallery_id}', [AdminController::class, 'deleteGalleryImage'])->name('delete.gallery.image');
            Route::get('/delete/gallery/{id}', [AdminController::class, 'deleteGallery'])->name('admin.delete.gallery');
        });




    });



});
