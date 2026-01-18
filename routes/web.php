<?php

use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Home\HomeSliderController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\PortfolioController;
use App\Http\Controllers\Home\BlogCategoryController;
use App\Http\Controllers\Home\BlogController;
use App\Http\Controllers\Home\FooterController;
use App\Http\Controllers\Home\ContactController;
use App\Http\Controllers\Home\WorkHistoryController;
use App\Http\Controllers\Home\EducationDetailsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;


Route::get('/', function () {
    return view('frontend.index');
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
Route::middleware(['auth'])->group(function(){
Route::controller(AdminController::class)->group(function(){
Route::get('/admin/logout','destroy')->name('admin.logout');
Route::get('/admin/profile','Profile')->name('admin.profile');
Route::get('/edit/profile','EditProfile')->name('edit.profile');
Route::post('/store/profile','StoreProfile')->name('store.profile');
Route::get('/change/password','ChangePassword')->name('change.password');
Route::post('/update/password','UpdatePassword')->name('update.password');
});
});
//Logout Dynamic Route Creation

//Home Slider Route
Route::controller(HomeSliderController::class)->group(function(){
    Route::get('/home/slide','HomeSlider')->name('home.slide');
    Route::post('/update/slider','UpdateSlider')->name('update.slider');
});

//About Section Route
Route::controller(AboutController::class)->group(function(){
    Route::get('/home/pages','AboutPage')->name('about.pages');
    Route::post('/update/about','UpdateAbout')->name('update.about');
    Route::get('/about','HomeAbout')->name('home.about');
    Route::get('/about/multi/image','AboutMultiImage')->name('about.multi.image');
     Route::post('/store/multi/image','StoreMultiImage')->name('store.multi.image');
     Route::get('/all/multi/image','AllMultiImage')->name('all.multi.image');
     //Below is the example of passing the id to route and setting it so that when clicked the id can be passed for edit or delete purpose
     Route::get('/edit/multi/image/{id}','EditMultiImage')->name('edit.multi.image');
     Route::get('/delete/multi/image/{id}','DeleteMultiImage')->name('delete.multi.image');
     Route::post('/update/multi/image','UpdateMultiImage')->name('update.multi.image'); 
});

//Portfolio All Route
Route::controller(PortfolioController::class)->group(function(){
    Route::get('/all/portfolio','AllPortfolio')->name('all.portfolio');
    Route::get('/add/portfolio','AddPortfolio')->name('add.portfolio');
    Route::post('/store/portfolio','StorePortfolio')->name('store.portfolio');
    Route::get('/edit/portfolio/{id}','EditPortfolio')->name('edit.portfolio');
    Route::get('/delete/portfolio/{id}','DeletePortfolio')->name('delete.portfolio');
    Route::post('/update/portfolio','UpdatePortfolio')->name('update.portfolio');
    Route::get('/portfolio/details/{id}','PortfolioDetails')->name('portfolio.details'); 
    Route::get('/home/portfolio','HomePortfolio')->name('home.portfolio');
    
});

//Blog Category All Routes
Route::controller(BlogCategoryController::class)->group(function(){
     Route::get('/all/blog/category','AllBlogCategory')->name('all.blog.category');
     Route::post('/store/blog/category','StoreBlogCategory')->name('store.blog.category');
     Route::get('/add/blog/category','AddBlogCategory')->name('add.blog.category');
     Route::get('/edit/blog/category/{id}','EditBlogCategory')->name('edit.blog.category');
     Route::get('/delete/blog/category/{id}','DeleteBlogCategory')->name('delete.blog.category');
     Route::post('/update/blog/category','UpdateBlogCategory')->name('update.blog.category');  
});

//Blog All Routes
Route::controller(BlogController::class)->group(function(){
    Route::get('/all/blog','AllBlog')->name('all.blog');
    Route::get('/add/blog','AddBlog')->name('add.blog');
    Route::get('/edit/blog/{id}','EditBlog')->name('edit.blog');
    Route::get('/delete/blog/{id}','DeleteBlog')->name('delete.blog');
    Route::post('/store/blog','StoreBlog')->name('store.blog');
    Route::post('/update/blog','UpdateBlog')->name('update.blog');
    Route::get('/blog/details/{id}','BlogDetails')->name('blog.details');
    Route::get('/category/post/{id}','CategoryPost')->name('category.post');
    Route::get('/blog','HomeBlog')->name('home.blog'); 
});

Route::controller(FooterController::class)->group(function(){
    Route::get('/footer','Footer')->name('footer');
    Route::get('/edit/footer','EditFooter')->name('edit.footer');
    Route::post('/update/footer','UpdateFooter')->name('update.footer');
});

Route::controller(ContactController::class)->group(function(){
    Route::get('/contact','Contact')->name('contact.me');
    Route::post('/store/contact','StoreContact')->name('store.contact');
});

//Work History Controller
Route::controller(WorkHistoryController::class)->group(function(){
    Route::get('/work/history','WorkHistory')->name('all.work.history');
    Route::post('/store/work/history','StoreWorkHistory')->name('store.work.history');
    Route::get('/edit/work/history/{id}','EditWorkHistory')->name('edit.work.history');
    Route::get('/delete/work/history/{id}','DeleteWorkHistory')->name('delete.work.history');
    Route::post('/update/work/history','UpdateWorkHistory')->name('update.work.history');
    Route::get('/add/work/history','AddWorkHistory')->name('add.work.history');
    
});

//Education Details Controller
Route::controller(EducationDetailsController::class)->group(function(){
    Route::get('/education/details','EducationDetails')->name('education.details');
    Route::post('/store/education/details','StoreEducationDetails')->name('store.education.details');
    Route::get('/edit/education/details/{id}','EditEducationDetails')->name('edit.education.details');
    Route::get('/delete/education/details/{id}','DeleteEducationDetails')->name('delete.education.details');
    Route::post('/update/education/details','UpdateEducationDetails')->name('update.education.details');
    Route::get('/add/education/details','AddEducationDetails')->name('add.education.details');
    
});

Route::get('/dashboard', function () {
    return view('admin.index'); //This means "admin" -> folder , "index" -> file
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
