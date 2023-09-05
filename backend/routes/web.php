<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\trashTypeController;
use App\Http\Controllers\LieuController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     $message = [
//         'message' => 'Welcome to the application!'
//     ];

//     return new Response($message, 200);
// });

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('trashType', trashTypeController::class);
    Route::delete('/lieux/{lieu}', [LieuController::class, 'destroy'])->name('lieux.destroy');
    Route::put('/lieux/{lieu}/custom-update', [LieuController::class, 'customUpdate'])->name('lieux.custom-update');

    Route::get('/generate-pdf', [UserController::class, 'generatePDF'])->name('generate.pdf');


    // Route::get('/', [FrontController::class, 'index'])->name('front-office.index');
     //Route::get('/front-office/lieu', [LieuController::class, 'LieuShow'])->name('lieu.LieuShow');  

     //Route::get('/front-office/index', [LieuController::class, 'frontIndex'])->name('front-office.index');  
     
    Route::resource('lieux', LieuController::class);
});
Route::get('/front-office/lieu', [LieuController::class, 'frontLieu'])->name('front-office.lieux');
Route::get('/front-office/type', [trashTypeController::class, 'frontTrash'])->name('front-office.trashTypes');


