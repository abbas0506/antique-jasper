<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController as AdminSubcategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Guest\ProductController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\web\ArticleController;
use App\Http\Controllers\web\CartController;
use App\Models\Product;
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
    } else {
        $products = Product::all();
        $subcategories = Subcategory::with('products')->has('products')->get();
        // return redirect()->route('products.index');
        return view('index', compact('subcategories'));
    }
});
Route::view('login', 'login');
Route::view('policy', 'policy');
Route::view('about', 'about');
Route::view('contact', 'contact');
Route::get('dashboard', [AuthController::class, 'index']);

Route::post('login', [AuthController::class, 'login']);
Route::get('signout', [AuthController::class, 'signout']);

Route::get('users.changepw', [AuthController::class, 'changepw'])->name('users.changepw');

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['role:admin']], function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::resource('config', ConfigController::class)->only('index');
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', AdminSubcategoryController::class);
    Route::resource('products', AdminProductController::class);

    Route::get('subcategories/add/{id}', [AdminSubcategoryController::class, 'add']);
    Route::get('products/add/{id}', [AdminProductController::class, 'add']);

    Route::resource('countries', CountryController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('couriers', CourierController::class);
    Route::resource('queries', QueryController::class);
});
Route::group(['middleware' => ['role:user']], function () {
    Route::view('user', 'user.index');
});

Route::resource('subcategories', SubcategoryController::class);


Route::resource('products', ProductController::class);
Route::get('products/filter/{type}/{val}', [ProductController::class, 'filter'])->name('products.filter');
// Route::post('products/search', [ProductController::class, 'search'])->name('products.search');
Route::post('search', [SearchController::class, 'search']);
Route::resource('articles', ArticleController::class);

Route::get('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/show', [CartController::class, 'show'])->name('cart.show');
Route::patch('update-cart', [CartController::class, 'updateQty'])->name('update.cart');
