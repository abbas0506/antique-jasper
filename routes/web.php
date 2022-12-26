<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    if (Auth::check()) {
        if (Auth::user()->hasRole('admin'))
            return redirect('admin');
        // elseif(Auth::user()->hasRole('user'))
        // return redirect('user.dashboard');
    } else
        return view('index');
});

Route::get('admin', function () {
    if (Auth::check()) {
        return view('admin.index'); //admin dashboard
    } else
        return redirect('login');
});

Route::view('login', 'auth.login');
Route::post('login', [AuthController::class, 'login']);

Route::get('auth', function () {
    return view('auth.login');
});
Route::group(['middleware' => ['role:admin']], function () {
});
Route::group(['middleware' => ['role:user']], function () {
    // Route::view('user', 'user.index');

});
