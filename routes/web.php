<?php

// გამოუნებელი კლასები უნდა მოშალო აქედან

// use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::name('front.')->group(function(){

    Route::get('/', [PageController::class, 'home'])->name('home');
    Route::get('/about', [PageController::class, 'about'])->name('about');
    Route::get('/contact', [PageController::class, 'contact'])->name('contact');


    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


});



// ეს დაბლაც გაქვს დაწერილი

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');


    // Resource მეთოდს არ ვიყენებს ვწერთ ცალკ ცალკე!!!
    // ნავიგასცისსტვის რთულია
    // დიდ პროექტებში შეიძლება ვერ მოძებნო როუტი სწრაფად
    // თან ეს როუტები Dashboard ფაილშია გასატანი!!!


    Route::resource('services', ServiceController::class);
    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('abouts', \App\Http\Controllers\Admin\AboutController::class);
    Route::resource('team', \App\Http\Controllers\Admin\TeamMemberController::class);

});

require __DIR__.'/auth.php';
