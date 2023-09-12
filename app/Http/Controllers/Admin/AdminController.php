<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $orders = Order::all();
        return view('admin.index', compact('orders'));
    }
}
