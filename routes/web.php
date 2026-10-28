<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserPanel; // <-- Make sure this is at the top

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- BASIC & AUTH ROUTES ---

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Default /home route
Route::get('/home', [HomeController::class, 'index'])->name('home');


// --- ADMIN PANEL ROUTES ---
// All admin routes are protected by auth middleware
Route::middleware(['auth', 'can:access-admin-index'])->group(function () {
    
    // Admin Dashboard
    Route::get('/admin/index', function () {
        return view('admin.index');
    })->name('admin.index');
    Route::get('index', [AdminPanel::class, 'index']);

    // Admin Product
    Route::get('product', [AdminPanel::class, 'product']);
    Route::post('addproduct', [AdminPanel::class, 'addproduct']);
    Route::get('editproduct/{id}', [AdminPanel::class, 'editproduct']);
    Route::post('updateproduct/{id}', [AdminPanel::class, 'updateproduct']);
    Route::get('deleteproduct/{id}', [AdminPanel::class, 'destroy']);

    // Admin Pincode
    Route::get('pincode', [AdminPanel::class, 'pincode']);
    Route::post('addpincode', [AdminPanel::class, 'addpincode']);
    Route::get('editpincode/{id}', [AdminPanel::class, 'editpincode']);
    Route::post('updatepincode/{id}', [AdminPanel::class, 'updatepincode']);
    Route::get('deletepincode/{id}', [AdminPanel::class, 'pop']);

    // Admin Product Entry
    Route::get('productentry', [AdminPanel::class, 'productentry']);
    Route::post('addproductentry', [AdminPanel::class, 'addproductentry']);
    Route::get('editproductentry/{id}', [AdminPanel::class, 'editproductentry']);
    Route::post('updateproductentry/{id}', [AdminPanel::class, 'updateproductentry']);
    Route::get('deleteproductentry/{id}', [AdminPanel::class, 'remove']);
});


// --- USER PANEL & SHOPPING ROUTES ---
// All user routes are protected by auth middleware
Route::middleware(['auth'])->group(function () {

    // Homepage
    Route::get('/userindex', [UserPanel::class, 'index'])->name('user.index');

    // Shop Page (view all products)
    Route::get('/viewproduct', [UserPanel::class, 'viewproduct'])->name('products.shop');

    // Cart Routes
    Route::get('add-to-cart/{id}', [UserPanel::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [UserPanel::class, 'cart'])->name('cart.view');
    Route::get('remove-from-cart/{id}', [UserPanel::class, 'remove'])->name('cart.remove');
    Route::post('update-cart/{id}', [UserPanel::class, 'updateCart'])->name('cart.update');

    // Checkout Routes
    Route::get('/checkout', [UserPanel::class, 'checkout'])->name('checkout');
    Route::post('/place-order', [UserPanel::class, 'placeOrder'])->name('order.place');

    // Static Pages (About, Services, etc.)
    Route::get('/about', function () {
        return view('userpanel.about');
    })->name('about');

    Route::get('/services', function () {
        return view('userpanel.services');
    })->name('services');

    Route::get('/contact', function () {
        return view('userpanel.contact');
    })->name('contact');

    Route::get('/blog', function () {
        return view('userpanel.blog');
    })->name('blog');
});