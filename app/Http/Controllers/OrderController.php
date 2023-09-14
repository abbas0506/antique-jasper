<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

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
            'customer_name' => 'required|max:100',
            'city' => 'max:50',
            'shipping_address' => 'required|max:200',
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
            session()->forget('cart');
            DB::commit();
            return redirect()->route('orders.payment', $order->id)->with('success', 'Shipping information successfully saved');
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
        $request->validate([
            'receipt_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        try {
            $receipt_name = '';

            //if user has changed image, replace existing image 
            if ($request->hasFile('receipt_image')) {
                $existing_receipt_url = public_path('images/payment/receipt/') . $order->receipt;

                //remove existing image
                if (File::exists($existing_receipt_url)) {
                    File::delete($existing_receipt_url);
                }

                //save uploaded image
                $receipt_name = $order->id . '.' . $request->receipt_image->extension();
                $request->file('receipt_image')->move(public_path('images/payment/receipt/'), $receipt_name);
            }

            //if image has been changed by user
            //replace uploaded image name by its formatted name
            if ($receipt_name != '')
                $order->receipt = $receipt_name;

            $order->update();

            return redirect()->route('orders.thanks', $order->id)->with('success', 'Successfully uploaded');
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
            // something went wrong
        }
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
    public function payment(Request $request, $id)
    {

        $order = Order::find($id);
        return view('orders.payment', compact('order'));
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
    public function thanks(Request $request, $id)
    {
        $order = Order::find($id);
        return view('orders.thanks', compact('order'));
    }
    public function paylater(Request $request, $id)
    {
        $order = Order::find($id);
        return view('orders.paylater', compact('order'));
    }
}
