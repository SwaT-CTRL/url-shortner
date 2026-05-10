<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Superadmin\SuperadminAuthController;
use App\Http\Controllers\Superadmin\AdminManageController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\UrlController as AdminUrlController;
use App\Http\Controllers\Admin\MemberController as AdminMemberController;
use App\Http\Controllers\Member\MemberAuthController;
use App\Http\Controllers\Member\UrlController as MemberUrlController;
use App\Http\Controllers\Superadmin\UrlController as SuperadminUrlController;
use App\Http\Controllers\PublicUrlController;



Route::get('/', function () {
    return view('welcome');
});

// Public Redirection Route
Route::get('/s/{code}', [PublicUrlController::class, 'redirect'])->name('url.redirect');


Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::middleware('superadmin.guest')->group(function () {
        Route::get('/login', [SuperadminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [SuperadminAuthController::class, 'login'])->name('login.post');
    });

    Route::middleware('superadmin.auth')->group(function () {
        Route::get('/dashboard', [SuperadminAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [SuperadminAuthController::class, 'logout'])->name('logout');

        // Admin Management
        Route::get('/admins', [AdminManageController::class, 'index'])->name('admins.index');
        Route::get('/members', [AdminManageController::class, 'membersIndex'])->name('members.index');
        Route::get('/admins/invite', [AdminManageController::class, 'showInvite'])->name('admins.invite');
        Route::post('/admins/invite', [AdminManageController::class, 'sendInvite'])->name('admins.invite.post');

        // URL Management
        Route::get('/urls', [SuperadminUrlController::class, 'index'])->name('urls.index');
        Route::get('/urls/pdf', [SuperadminUrlController::class, 'downloadPdf'])->name('urls.pdf');
    });
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('admin.guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    });

    Route::middleware('admin.auth')->group(function () {
        Route::get('/dashboard', [AdminAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        // Member Management
        Route::get('/members', [AdminMemberController::class, 'index'])->name('members.index');
        Route::get('/members/invite', [AdminMemberController::class, 'showInvite'])->name('members.invite');
        Route::post('/members/invite', [AdminMemberController::class, 'sendInvite'])->name('members.invite.post');

        // URL Generation
        Route::get('/generate-url', [AdminUrlController::class, 'showGenerate'])->name('urls.generate');
        Route::post('/generate-url', [AdminUrlController::class, 'store'])->name('urls.generate.post');
        Route::get('/urls', [AdminUrlController::class, 'index'])->name('urls.index');
        Route::get('/urls/pdf', [AdminUrlController::class, 'downloadPdf'])->name('urls.pdf');
    });
});

Route::prefix('member')->name('member.')->group(function () {
    Route::middleware('member.guest')->group(function () {
        Route::get('/login', [MemberAuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [MemberAuthController::class, 'login'])->name('login.post');
    });

    Route::middleware('member.auth')->group(function () {
        Route::get('/dashboard', [MemberAuthController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [MemberAuthController::class, 'logout'])->name('logout');

        // URL Generation
        Route::get('/generate-url', [MemberUrlController::class, 'showGenerate'])->name('urls.generate');
        Route::post('/generate-url', [MemberUrlController::class, 'store'])->name('urls.generate.post');
        Route::get('/urls', [MemberUrlController::class, 'index'])->name('urls.index');
        Route::get('/urls/pdf', [MemberUrlController::class, 'downloadPdf'])->name('urls.pdf');
    });
});

