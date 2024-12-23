<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialiteController;
use App\Http\Controllers\Frontend\FrProfileController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('auth/google', [SocialiteController::class, 'googleLogin'])->name('auth.google');
Route::get('auth/google-callback', [SocialiteController::class, 'googleAuthentication'])->name('auth.google-callback');
Route::get('auth/facebook', [SocialiteController::class, 'facebookLogin'])->name('auth.facebook');
Route::get('auth/facebook-callback', [SocialiteController::class, 'facebookAuthentication'])->name('auth.facebook-callback');



Route::group(['prefix' => 'admin', 'middleware' => ['admin', 'auth'], 'namespace' => 'Admin'], function () {

    // ------------------------------ Admin Home Page----------------------------------
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // ------------------------------ Admin Profile Page----------------------------------
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('profile/{username}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('profile-info/update/{userId}', [ProfileController::class, 'updateProfileInfo'])->name('profileInfo.update');
    Route::post('address-info/update/{userId}', [ProfileController::class, 'updateAddressInfo'])->name('addressInfo.update');

    Route::get('search-districts', [ProfileController::class, 'searchDistricts']);
    Route::get('search-upazilas', [ProfileController::class, 'searchUpazilas']);
    Route::get('search-unions', [ProfileController::class, 'searchUnions']);
    Route::put('store-address', [ProfileController::class, 'updateAddress'])->name('store.address');


    // ------------------------------ Admin Address Page----------------------------------
    Route::get('address', [AddressController::class, 'index'])->name('address');

    // ------------------------------ Admin Setting Page----------------------------------
    Route::get('setting', [SettingController::class, 'index'])->name('setting');
    Route::post('update/{setting}', [SettingController::class, 'update'])->name('setting.update');



    // Route::get('service', [ServiceController::class, 'index'])->name('service');
    // Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    // Route::post('service/store', [ServiceController::class, 'Store'])->name('service.store');
    // Route::get('service/edit/{id}', [ServiceController::class, 'Edit'])->name('service.edit');
    // Route::post('service/update/{id}', [ServiceController::class, 'Update'])->name('service.update');
    // Route::get('service/destroy/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

});

Route::group(['middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // ------------------------------ Frontend Profile Page----------------------------------

    Route::get('profile', [FrProfileController::class, 'index'])->name('user.profile');

    Route::post('profile/store', [FrProfileController::class, 'Store'])->name('user.profile.store');
});
