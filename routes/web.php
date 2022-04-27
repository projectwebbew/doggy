<?php

use App\Http\Controllers\Admin\DogController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomesController;
use App\Http\Controllers\StripeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', 'admin']

],
    function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
        Route::get('/dogs', [DogController::class, 'index'])->name('dogs');
        Route::get('/dogs/create', [DogController::class, 'create'])->name('dogs.create');
        Route::post('/dogs/store', [DogController::class, 'store'])->name('dogs.store');
        Route::get('/dogs/{dog}/edit', [DogController::class, 'edit'])->name('dogs.edit');
        Route::put('/dogs/{dog}', [DogController::class, 'update'])->name('dogs.update');
        Route::delete('/dogs/{dog}/', [DogController::class, 'destroy'])->name('dogs.destroy');
        Route::delete('/dogs/{dog}/remove-img', [DogController::class, 'removeImg'])->name('dogs.remove_img');
        Route::delete('/dogs/{dog}/slider-remove', [DogController::class, 'sliderRemove'])->name('dogs.slider_remove');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{user}/', [UserController::class, 'destroy'])->name('users.destroy');
    }
);
Route::group([

],
    function () {
        Route::get('/', [App\Http\Controllers\HomesController::class, 'index'])->name('front-home');
        Route::get('dog', [App\Http\Controllers\HomesController::class, 'dog'])->name('dog');
        Route::get('dog/{dog}', [App\Http\Controllers\Frontend\DogController::class, 'index'])->name('slider');
        Route::get('cart', [App\Http\Controllers\HomesController::class, 'cart']);
        Route::get('add-to-cart/{id}', [App\Http\Controllers\HomesController::class, 'addToCart']);
        Route::patch('update-cart', [App\Http\Controllers\HomesController::class, 'update']);
        Route::delete('remove-from-cart', [App\Http\Controllers\HomesController::class , 'remove']);
        Route::post('/contact', [App\Http\Controllers\ContactFormsController::class, 'ContactUsForm'])->name('contact');
    }
);

Auth::routes();

Route::get('/home-reg', [App\Http\Controllers\HomeController::class, 'index'])->name('home-reg');

Route::get('stripe', [StripeController::class, 'stripe'])->name('stripe');
Route::post('stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
