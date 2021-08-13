<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewerAddProfile;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\SuscriptionController;
use App\Http\Controllers\StoreSuscriptionController;
use App\Http\Controllers\StorePackController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlockUserController;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/admin', function () {
    return view('admin.login');
});

// ADMIN
Route::middleware(['auth', 'admin.auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard-admin');
    })->name('admin.dashboard');

    Route::get('/suscriptions', function () {
        return view('admin.managment-suscriptions');
    })->name('admin.suscriptions');

    Route::get('/users', function () {
        return view('admin.managment-users');
    })->name('admin.users');

    // Route::get('/account', function () {
    //     return view('reviewer.account');
    // })->name('reviewer.account');

    // Route::get('/store', function () {
    //     return view('reviewer.store');
    // })->name('reviewer.store');
    
});


// END ADMIN

// EMPLOYEE
// Route::middleware(['auth', 'reviewer.auth'])->prefix('reviewer')->group(function () {

//     Route::get('/dashboard', function () {
//         return view('reviewer.dashboard-reviewer');
//     })->name('reviewer.dashboard');

//     Route::get('/profile', function () {
//         return view('reviewer.profile');
//     })->name('reviewer.profile');

//     Route::get('/account', function () {
//         return view('reviewer.account');
//     })->name('reviewer.account');

//     Route::get('/store', function () {
//         return view('reviewer.store');
//     })->name('reviewer.store');
    
// });
// END EMPLOYEE

// REVIEWERS
Route::middleware(['auth', 'reviewer.auth'])->prefix('reviewer')->group(function () {

    Route::get('/dashboard', function () {
        return view('reviewer.dashboard-reviewer');
    })->name('reviewer.dashboard');

    Route::get('/profile', function () {
        return view('reviewer.profile');
    })->name('reviewer.profile');

    Route::get('/account', function () {
        return view('reviewer.account');
    })->name('reviewer.account');

    Route::get('/store', function () {
        return view('reviewer.store');
    })->name('reviewer.store');
    
});
// END REVIEWERS

// BUSINESS
Route::middleware(['auth', 'business.auth'])->prefix('business')->group(function () {

    Route::get('/dashboard', function () {
        return view('business.dashboard-business');
    })->name('business.dashboard');

    Route::get('/profile', function () {
        return view('business.profile');
    })->name('business.profile');

    Route::get('/account', function () {
        return view('business.account');
    })->name('business.account');

    Route::get('/store', function () {
        return view('business.store');
    })->name('business.store');
    
});
// END BUSINESS

/*---------------- RESOURCES ----------------*/

// SUSCRIPTIONS RESOURCE
Route::resource('/users', UserController::class);

// SUSCRIPTIONS RESOURCE
Route::resource('/suscriptions', SuscriptionController::class);

// STORE SUSCRIPTIONS RESOURCE
Route::resource('/store-suscriptions', StoreSuscriptionController::class);

// STORE PACKS RESOURCE
Route::resource('/store-packs', StorePackController::class);

// PACKS RESOURCE
Route::resource('/packs', PackController::class);

// PROFILES RESOURCE
Route::resource('/profile', ReviewerAddProfile::class);

// ACCOUNT RESOURCE
Route::resource('/account', AccountController::class);

// BLOCK USERS RESOURCE
Route::put('/block/{id}', [BlockUserController::class, 'block']);

Route::put('/desblock/{id}', [BlockUserController::class, 'desblock']);

/* STATIC ROUTES */

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');