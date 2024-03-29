<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\SubcategoryController as AdminSubcategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
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
    Route::resource('orders', AdminOrderController::class);
    Route::get('orders/ship/{order}', [AdminOrderController::class, 'ship']);
    Route::get('orders/receipt/accept/{order}', [AdminOrderController::class, 'accept']);
    Route::get('orders/receipt/reject/{order}', [AdminOrderController::class, 'reject']);
    Route::get('pending', [AdminOrderController::class, 'pending']);
    Route::get('shipped', [AdminOrderController::class, 'shipped']);
    Route::get('rejected', [AdminOrderController::class, 'rejected']);

    Route::get('subcategories/add/{id}', [AdminSubcategoryController::class, 'add']);
    Route::get('products/add/{id}', [AdminProductController::class, 'add']);
});

Route::group(['middleware' => ['role:user']], function () {
    Route::view('user', 'user.index');
});

Route::resource('subcategories', SubcategoryController::class);
Route::resource('products', ProductController::class);
Route::get('products/filter/{filter}', [ProductController::class, 'filter'])->name('products.filter');
// Route::post('products/search', [ProductController::class, 'search'])->name('products.search');
Route::post('search', [SearchController::class, 'search']);
// Route::resource('articles', ArticleController::class);

Route::get('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::get('cart/show', [CartController::class, 'show'])->name('cart.show');
Route::patch('cart/update', [CartController::class, 'updateQty'])->name('cart.update');
Route::get('cart/checkout', [CartController::class, 'checkout']);
Route::get('cart/clear', [CartController::class, 'clear']);

Route::resource('orders', OrderController::class);
Route::view('tracking', 'orders.tracking');
Route::post('orders/track', [OrderController::class, 'track']);
Route::get('orders/thanks/{order}', [OrderController::class, 'thanks'])->name('orders.thanks');
Route::get('orders/paylater/{order}', [OrderController::class, 'paylater'])->name('orders.paylater');
Route::get('orders/payment/{order}', [OrderController::class, 'payment'])->name('orders.payment');
Route::patch('order/details/update', [OrderDetailController::class, 'update']);
