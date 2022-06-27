<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;

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

// toastr()->warning('My name is Inigo Montoya. You killed my father, prepare to die!');
// toastr()->success('Have fun storming the castle!', 'Miracle Max Says');
// toastr()->error('I do not think that word means what you think it means.', 'Inconceivable!');
// toastr()->success('We do have the Kapua suite available.', 'Turtle Bay Resort', ['timeOut' => 5000]);

Route::get('/', [MainController::class, 'index']);

Route::get('/auth/login', function () {
    return view('login');
})->name('login');

Route::get('/auth/register', function () {
    return view('register');
})->name('register');

Route::post('/auth/storeReg', [MainController::class, 'storeReg'])->name('storeReg');
Route::get('/auth/logout', [MainController::class, 'logout'])->name('logout');

Route::post('/', [MainController::class, 'checkLogin'])->name('checkLogin');

Route::post('/post/add', [PostController::class, 'store']);








