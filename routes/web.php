<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\ResumeController;

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

Route::middleware(['user.redirect', 'admin.redirect'])->group(function () {
    Route::get('forgotPassword', [AuthenticationController::class, 'forgotpassword_page'])->name('forgotPassword.page');
    Route::get('contact', [UserController::class, 'contactUs'])->name('contact.page');
    Route::get('register', [AuthenticationController::class, 'registerPage'])->name('register.page');
});
Route::middleware('admin.redirect')->get('/', [AuthenticationController::class, 'welcomePage'])->name('welcome.page');
Route::middleware('user.redirect')->get('login', [AuthenticationController::class, 'loginPage'])->name('login.page');
Route::post('login', [AuthenticationController::class, 'login'])->name('login');
Route::middleware('admin.redirect')->get('admin/login', [AdminController::class, 'loginPage'])->name('admin.login');
Route::post('admin/login', [AdminController::class, 'login'])->name('admin.actionLogin');
Route::post('register', [AuthenticationController::class, 'register'])->name('register');
Route::post('contact', [UserController::class, 'contact'])->name('user.contact');
Route::post('forgotPassword', [AuthenticationController::class, 'forgotpassword'])->name('forgotPassword');
Route::get('resetPassword/{token}', [AuthenticationController::class, 'resetPassword_page'])->name('resetPassword.page');
Route::post('resetPassword', [AuthenticationController::class, 'resetPassword'])->name('resetPassword');
Route::middleware(['user.middleware'])->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('list', [UserController::class, 'list'])->name('list');
        Route::get('profile', [UserController::class, 'profile'])->name('profile');
        Route::post('update/{id}', [UserController::class, 'updateProfile'])->name('profile.update');
        Route::get('password', [UserController::class, 'password'])->name('password');
        Route::post('password', [UserController::class, 'updatePassword'])->name('password.update');
        Route::get('resume/create', [ResumeController::class, 'create'])->name('resume.create');
        Route::post('resume/store', [ResumeController::class, 'store'])->name('resume.store');
        Route::get('resume/preview', [ResumeController::class, 'show'])->name('resume.show');
        Route::get('resume/data', [ResumeController::class, 'getData'])->name('resume.data');
        Route::get('resume/edit', [ResumeController::class, 'edit'])->name('resume.edit');
        Route::get('resume/temp1', [ResumeController::class, 'temp1'])->name('resume.temp1');
        Route::get('resume/temp2', [ResumeController::class, 'temp2'])->name('resume.temp2');
        Route::get('resume/temp3', [ResumeController::class, 'temp3'])->name('resume.temp3');
        Route::get('resume/change', [ResumeController::class, 'change'])->name('resume.change');
        Route::get('resume/generate-pdf/{id}', [ResumeController::class, 'generatePDF'])->name('resume.generatepdf');
    });
});
Route::get('/user/logout', [AuthenticationController::class, 'logout'])->name('user.logout');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['admin.middleware'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('userList', [AdminController::class, 'userList'])->name('userList');
        Route::get('adminList', [AdminController::class, 'adminList'])->name('adminList');
        Route::get('account/create', [AdminController::class, 'adminAccountCreate'])->name('account.create');
        Route::post('account/create', [AdminController::class, 'createAdminAccount'])->name('create.admin.account');
        Route::get('account/delete/{id}', [AdminController::class, 'adminDelete'])->name('account.delete');
        Route::get('profile', [AdminController::class, 'adminProfile'])->name('profile');
        Route::post('update/{id}', [AdminController::class, 'adminProfileUpdate'])->name('profile.update');
        Route::get('user/account/create', [AdminController::class, 'accountCreate'])->name('create.account');
        Route::post('user/account/create', [AdminController::class, 'createAccount'])->name('create.user.account');
        Route::get('user/account/delete/{id}', [AdminController::class, 'userDelete'])->name('user.account.delete');
        Route::get('password', [AdminController::class, 'password'])->name('password');
        Route::post('password', [AdminController::class, 'updatePassword'])->name('password.update');
        Route::get('chart/weekly', [AdminController::class, 'weeklychart'])->name('weekly.chart');
        Route::get('weekly', [AdminController::class, 'weeklychartdata'])->name('weekly.chart.data');
        Route::get('chart/monthly', [AdminController::class, 'monthlychart'])->name('monthly.chart');
        Route::get('monthly', [AdminController::class, 'monthlychartdata'])->name('monthly.chart.data');
    });
});
