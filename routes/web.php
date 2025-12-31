<?php

use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


Route::get('/', function () {
    return view('welcome');
});

//Testing purpose of mail sending - GMAIL - SMTP
// Route::get('/test-mail', function () {
//     Mail::raw('Gmail SMTP working 🔥', function ($message) {
//         $message->to('manojmariadass25@gmail.com')
//                 ->subject('Laravel Gmail Test');
//     });

//     return 'Mail sent';
// });
//Testing purpose of mail sending - GMAIL - SMTP

//Basic Routing Examples
// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });
//Basic Routing Examples

//Router to Controller Examples
// Route::get('/about',[DemoController::class,'Index']);
// Route::get('/contact',[DemoController::class,'ContactMethod']);
//Router to Controller Examples

//Routes Grouping Examples
// Route::controller(DemoController::class)->group(function(){
// Route::get('/about','Index');
// Route::get('/contact','ContactMethod');
// });
//Routes Grouping Examples

//Routing Grouping with route name Examples - when route is directly used we can name it , if used by url method we can remove that name

// <a href="{{route('about.page')}}">About</a> - this is used in view while using the name method

// Route::controller(DemoController::class)->group(function(){
// Route::get('/about','Index')->name('about.page');
// Route::get('/contact','ContactMethod')->name('contact.page');
// });
//Routing Grouping with route name Examples

//Routing Grouping with route name Examples - With using URL method in view "Removing the Name Method"
// Route::controller(DemoController::class)->group(function(){
// Route::get('/about','Index'); //This is the Example of this method
// Route::get('/contact','ContactMethod')->name('contact.page');
// });
//Routing Grouping with route name Examples - With using URL method in view "Removing the Name Method"

//Middleware Inclusion in the Routes
//Middleware is mainly used for the url which needs any protection based on your conditions
Route::controller(DemoController::class)->group(function(){
Route::get('/about','Index')->middleware('check'); //This is the Example of this method
Route::get('/contact','ContactMethod')->name('contact.page');
});
//Middleware Inclusion in the Routes

//Logout Dynamic Route Creation - Admin All Route
Route::controller(AdminController::class)->group(function(){
Route::get('/admin/logout','destroy')->name('admin.logout');
Route::get('/admin/profile','Profile')->name('admin.profile');
Route::get('/edit/profile','EditProfile')->name('edit.profile');
Route::post('/store/profile','StoreProfile')->name('store.profile');
Route::get('/change/password','ChangePassword')->name('change.password');
Route::post('/update/password','UpdatePassword')->name('update.password');
});
//Logout Dynamic Route Creation

Route::get('/dashboard', function () {
    return view('admin.index'); //This means "admin" -> folder , "index" -> file
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
