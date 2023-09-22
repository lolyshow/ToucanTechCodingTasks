<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\SchoolController;

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


Route::get('/',[ MemberController::class,'chartpage']);


// members routes
Route::resource('/members', MemberController::class);
Route::get('/member/create', [
    App\Http\Controllers\MemberController::class,
    'create_form',
])->name('member.create');
Route::post('/member/create', [
    App\Http\Controllers\MemberController::class,
    'store',
])->name('member.create');
// Route::post('/member/create', function () {
//     return view('members.create');
// });

// School route
Route::resource('/schools', SchoolController::class);
Route::get('/school/create', [
    App\Http\Controllers\SchoolController::class,
    'create_form',
])->name('school.create');
Route::post('/school/create', [
    App\Http\Controllers\SchoolController::class,
    'store',
])->name('school.create');


// countries routes
Route::resource('/countries', CountryController::class);
Route::get('/country/create', [
    App\Http\Controllers\CountryController::class,
    'create_form',
])->name('country.create');
Route::post('/country/create', [
    App\Http\Controllers\CountryController::class,
    'store',
])->name('country.create');
