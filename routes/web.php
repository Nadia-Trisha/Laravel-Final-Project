<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//frontend
Route::get('/', function () {
    return view('frontend.home');
});

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/menu', function () {
    return view('frontend.menu');
})->name('menu');

Route::get('/master', function () {
    return view('frontend.master');
})->name('master');


Route::get('/services', function () {
    return view('frontend.services');
})->name('services');


Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');





//backend

Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile', [CategoryController::class, 'delete'])->name('profile.delete');
});


Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login']);
    Route::post('/login', [AdminController::class, 'store'])->name('adminLogin');
   
});

Route::middleware('admin')->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
});


//search
Route::get('findproducts', [SearchController::class, 'Search']);


//cart
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');
  


Route::resource('brands', BrandController::class);


//contact
Route::get('/contact', [ContactController::class, 'allContact'])->name('allContact');



require __DIR__.'/auth.php';
