<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\PassController;
use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\ProduitController;
// use App\Http\Controllers\CartController;

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
    return redirect('catalogue');
});

// Route::get('/admin', function () {
//     return view('admin');
// })->name('admin');

Route::get('/catalogue', function () {
    return view('catalogue');
});

Route::get('/produit', function () {
    return view('catalogue');
});


Route::get('/register', function () {
    return view('register');
})->name('register');

// register
Route::get('/catalogue', [CatalogueController::class, 'show'])->name('catalogue');

// route register
Route::post('/register', [UserController::class, 'create'])->middleware('guest')->name('user.create');
// Route::resource('product', ProductController::class);

// route login
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest')->name('login');

// Logout
Route::post('/catalogue', [LogoutController::class, 'logout'])->name('logout');

//reset
Route::get('/reset', [ResetController::class, 'show'])->middleware('guest')->name('reset');
Route::post('/reset', [ResetController::class, 'forgot'])->middleware('guest')->name('reset');

Route::get('/reset/password/{token}',[PassController::class, 'access'])->middleware('guest')->name('reset/password/{token}');

Route::get('/reset/password', [PassController::class, 'show'])->middleware('guest')->name('reset/password');
Route::post('/reset/password', [PassController::class, 'update'])->middleware('guest')->name('pass.update');
// admin
Route::get('/admin', [ProductController::class, 'show'])->middleware('admin')->name('admin');
Route::post('/admin', [ProductController::class, 'create'])->middleware('admin')->name('create.product');
// produit 
Route::get('/produit/{id}',[ProduitController::class, 'show'])->name('produit/{id}');
Route::post('/produit/{id}',[ProductController::class, 'update'])->middleware('admin')->name('update.product/{id}');

//panier
// Route::get('/panier',[CartController::class, 'show'])->middleware('auth')->name('panier');