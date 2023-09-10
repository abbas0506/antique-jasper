<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            // 'tracking_id' => 
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'address' => 'required|max:200',
            'city' => 'max:50',
            'phone' => 'required',
        ]);

        $tracking_id = rand(100000, 999999);
        $request->merge(['tracking_id' => $tracking_id]);

        DB::beginTransaction();
        $total = 0;
        try {
            $order = Order::create($request->all());
            if (session('cart')) {
                foreach (session('cart') as $id => $details) {
                    OrderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $details['id'],
                        'qty' => $details['qty'],
                    ]);
                }
            }

            DB::commit();
            return redirect('payment')->with('tracking_id', $tracking_id);;
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function payment()
    {
        if (session('tracking_id')) {
            $order = Order::where('tracking_id', session('tracking_id'))->first();
            $order = Order::where('tracking_id', 507690)->first();
            return view('orders.payment', compact('order'));
        } else {
            return view('orders.tracking');
        }
    }
    public function track(Request $request)
    {
        $order = Order::where('tracking_id', $request->tracking_id)->first();
        $html = '';
        try {
            $html .= '' .
                "<tr>" .
                "<td>" . $order->tracking_id . "</td>" .
                "<td class='text-left'>" . $order->first_name . "</td>" .
                "<td>" . $order->amount() . "</td>" .
                "<td><a href='orders/" . $order->id . "' class='link'>VIEW</a></td>" .
                "</tr>";

            return response()->json([
                'html' => $html,
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'msg' => $ex->getMessage(),
            ]);
        }
    }
}
