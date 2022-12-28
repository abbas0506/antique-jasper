<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
    //
    public function index()
    {
        $countries = Country::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();

        return view('admin.config.index', compact('countries', 'categories', 'subcategories'));
    }
}
