<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id)
    {
        //
        $product = Product::find($id);
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product

        if (!$cart) {
            $cart = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->name,
                    'code' => $product->code,
                    "qty" => 1,
                    "price" => $product->price,
                    'image' => $product->image,

                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Successfully added to cart!');
        }
        // if cart not empty then check if this product exist then increment qty
        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Successfully add to cart!');
        }
        // if item not exist in cart then add to cart with qty = 1
        $cart[$id] = [
            "id" => $product->id,
            "name" => $product->name,
            'code' => $product->code,
            "qty" => 1,
            "price" => $product->price,
            'image' => $product->image,
        ];
        session()->put('cart', $cart);
        // return redirect()->back()->with('success', 'Product added to cart successfully!');
        return redirect()->back()->with(['success', 'Successfully added to cart']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        //

    }


    public function show()
    {
        //

        return view('cart.show');
    }

    public function updateQty(Request $request)
    {
        //
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["qty"] += $request->inc;
            session()->put('cart', $cart);
        }
    }

    public function checkout()
    {
        return view('cart.checkout');
    }
}
