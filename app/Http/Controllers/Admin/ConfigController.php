<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function index()
    {
        $countries = Country::all();
        $categories = Category::all();
        $products = Product::all();

        return view('admin.config.index', compact('countries', 'categories', 'products'));
    }
}
