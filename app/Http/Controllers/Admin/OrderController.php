<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $orders = Order::all();
        // return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $order = Order::find($id);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $order = Order::find($id);
        return view('admin.orders.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'shipping_address' => 'required',
        ]);

        try {
            $order = Order::find($id);
            $order->update($request->all());

            return redirect()->route('admin.orders.show', $order->id)->with('success', 'Successfully uploaded');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pending()
    {
        //
        $orders = Order::whereNull('shipped_at')->get();
        return view('admin.orders.pending', compact('orders'));
    }
    public function shipped()
    {
        //
        $orders = Order::whereNotNull('shipped_at')->get();
        return view('admin.orders.shipped', compact('orders'));
    }
    public function rejected()
    {
        //
        $orders = Order::where('receipt_accepted', false)->get();
        return view('admin.orders.rejected', compact('orders'));
    }

    public function ship($id)
    {
        $order = Order::find($id);
        $order->update([
            'shipped_at' => now(),
        ]);
        return redirect()->route('admin.orders.show', $order)->with('success', 'Order shipment status changed!');
    }

    public function accept($id)
    {
        $order = Order::find($id);
        $order->update([
            'receipt_accepted' => true,
        ]);
        return redirect()->route('admin.orders.show', $order)->with('success', 'Receipt accepted');
    }

    public function reject($id)
    {
        $order = Order::find($id);
        $order->update([
            'receipt_accepted' => false,
        ]);
        return redirect()->route('admin.orders.show', $order)->with('success', 'Receipt rejected');
    }
}
