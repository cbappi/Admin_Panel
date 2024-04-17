<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ModuleController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\PermissionController;

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

//Route::get('{page_slug}', [FrontendController::class, 'index']);



Auth::routes();

/*Backend Routes */
Route::prefix('admin')->middleware(['auth'])->group(function(){

    // Dashboard
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Resource Routes
    Route::resource('/module', ModuleController::class);
    Route::resource('/permission', PermissionController::class);
    Route::resource('/role', RoleController::class);

    Route::get('check/user/is_active/{user_id}', [UserController::class, 'checkActive'])->name('user.is_active.ajax');
    Route::get('check/page/is_active/{page_id}', [PageController::class, 'checkActive'])->name('page.is_active.ajax');

    Route::resource('/users', UserController::class);
    Route::resource('/page', PageController::class);


});
