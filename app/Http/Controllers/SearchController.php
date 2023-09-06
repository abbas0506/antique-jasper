<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $searchby = $request->searchby;
        $products = Product::where('name', 'like', '%' . $searchby . '%')->get();

        return view('search', compact('products', 'searchby'));
    }
}
