<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\SubcategoryController;
use App\Models\Subcategory;
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
        return redirect('dashboard'); //admin dashboard
    } else
        return redirect('login');
});
Route::get('dashboard', [AuthController::class, 'index']);
Route::view('login', 'login');
Route::post('login', [AuthController::class, 'login']);
Route::get('signout', [AuthController::class, 'signout']);
Route::get('users.changepw', [AuthController::class, 'changepw'])->name('users.changepw');

Route::group(['middleware' => ['role:admin']], function () {

    Route::resource('config', ConfigController::class)->only('index');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);

    Route::get('subcategories.add/{id}', [SubcategoryController::class, 'add'])->name('subcategories.add');
    Route::get('products.add/{id}', [ProductController::class, 'add'])->name('products.add');

    Route::resource('products', ProductController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('couriers', CourierController::class);
    Route::resource('queries', QueryController::class);
});
Route::group(['middleware' => ['role:user']], function () {
    Route::view('user', 'user.index');
});
