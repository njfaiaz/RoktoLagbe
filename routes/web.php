<?php

use App\Http\Controllers\Admin\AddressController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DonateHistoryController;
use App\Http\Controllers\Admin\PasswordChangeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialiteController;
use App\Http\Controllers\Admin\UserListController;
use App\Http\Controllers\Frontend\FrDonateInfoController;
use App\Http\Controllers\Frontend\FrHistoryController;
use App\Http\Controllers\Frontend\FrProfileController;
use App\Http\Controllers\Frontend\FrSearchController;
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

Route::fallback(function () {
    return view('404');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('404', [UserController::class, 'notFound'])->name('notFound');


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
    Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('profile/address/update', [ProfileController::class, 'addressUpdate'])->name('address.update');
    Route::post('profile/name/change', [ProfileController::class, 'nameChange'])->name('admin.name.change');

    Route::post('password/change', [PasswordChangeController::class, 'ChangeStore'])->name('admin.password.change');


    Route::get('search-districts', [ProfileController::class, 'searchDistricts']);
    Route::get('search-upazilas', [ProfileController::class, 'searchUpazilas']);
    Route::get('search-unions', [ProfileController::class, 'searchUnions']);


    // ------------------------------ Admin Address Page----------------------------------
    Route::get('address', [AddressController::class, 'index'])->name('address');


    // ------------------------------ Admin User List Page----------------------------------
    Route::get('all/user', [UserListController::class, 'index'])->name('user.list');
    Route::get('all/userInactive', [UserListController::class, 'userInactive'])->name('inactive.user');
    Route::get('all/userActive', [UserListController::class, 'userActive'])->name('active.user');
    Route::get('active/inactive/{id}', [UserListController::class, 'inActiveApprove'])->name('inactive.approve');
    Route::get('active/active/{id}', [UserListController::class, 'ActiveApprove'])->name('active.approve');

    Route::get('user-search-districts', [UserListController::class, 'searchDistricts']);
    Route::get('user-search-upazilas', [UserListController::class, 'searchUpazilas']);
    Route::get('user-search-unions', [UserListController::class, 'searchUnions']);

    // ------------------------------ Admin Setting Page----------------------------------
    Route::get('setting', [SettingController::class, 'index'])->name('setting');


    // ------------------------------ All User Blood Donate History Page----------------------------------
    Route::get('donate/history', [DonateHistoryController::class, 'index'])->name('donate.history');



    // Route::get('service', [ServiceController::class, 'index'])->name('service');
    // Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    // Route::post('service/store', [ServiceController::class, 'Store'])->name('service.store');
    // Route::get('service/edit/{id}', [ServiceController::class, 'Edit'])->name('service.edit');
    // Route::post('service/update/{id}', [ServiceController::class, 'Update'])->name('service.update');
    // Route::get('service/destroy/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

});

Route::group(['middleware' => ['user', 'auth'], 'namespace' => 'User'], function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/profile/{username}', [UserController::class, 'show'])->name('user.profile.show');

    // ------------------------------ Frontend Profile Page----------------------------------
    Route::get('profile', [FrProfileController::class, 'index'])->name('user.profile');
    Route::get('profile/edit', [FrProfileController::class, 'Edit'])->name('user.profile.edit');

    // ------------------------------ Frontend Search Page----------------------------------
    Route::get('search', [FrSearchController::class, 'index'])->name('user.search');

    Route::get('/search-districts', [FrSearchController::class, 'searchDistricts']);
    Route::get('/search-upazilas', [FrSearchController::class, 'searchUpazilas']);
    Route::get('/search-unions', [FrSearchController::class, 'searchUnions']);

    // ------------------------------ Frontend Search Page----------------------------------
    Route::get('history', [FrHistoryController::class, 'index'])->name('user.history');
    Route::get('history.store', [FrHistoryController::class, 'Store'])->name('user.history.store');

    // ------------------------------ Frontend Search Page----------------------------------

    Route::get('profile/{username}/edit', [FrDonateInfoController::class, 'edit']);
    Route::get('/next-donate', [FrDonateInfoController::class, 'next'])->name('next.donate');
});
