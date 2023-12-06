<?php

use App\Http\Controllers\crudController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
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

Route::resource('users', crudController::class);

Route::get('/', function () {
    return view('Signup');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});



Route::post('/submit', [crudController::class, 'create']);

Route::get('/getdata', [crudController::class, 'showdata'])->name('get');

Route::get('editData/{id}', [crudController::class, 'edit']);

Route::post('update/{id}', [crudController::class, 'update']);

Route::get('deleteData/{id}', [crudController::class, 'destroy']);

Route::post('user', [crudController::class, 'userLogin']);

Route::get('/getdata2', [crudController::class, 'changeStatus'])->name('changeStatus');

Route::post('/login', [crudController::class, 'authenticate'])->name('login');

Route::get('/logout', [crudController::class, 'logout']);

Route::get('/trashData', [crudController::class, 'trash']);

Route::get('/restoreData/{id}', [crudController::class, 'restore'])->name('restoreData');

Route::get('forceDelete/{id}', [crudController::class, 'forceDelete']);

Route::get('/{lang?}', function ($lang = null) {
    if ($lang == 'en' || $lang == 'guj' || $lang == 'hi') {
        App::setlocale($lang);
        return view('Signup');
    }
});