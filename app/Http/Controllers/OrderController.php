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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5000',
        ]);

        try {
            $image_name = '';

            //if user has changed image, replace existing image 
            if ($request->hasFile('image')) {
                $existing_image_url = public_path('images/payment/receipt/') . $order->image;

                //remove existing image
                if (File::exists($existing_image_url)) {
                    File::delete($existing_image_url);
                }

                //save uploaded image
                $image_name = $order->id . '.' . $request->image->extension();
                $request->file('image')->move(public_path('images/payment/receipt/'), $image_name);
            }

            //update by raw input as it is
            $order->update($request->all());

            //if image has been changed by user
            //replace uploaded image name by its formatted name
            if ($image_name != '')
                $order->image = $image_name;

            $order->save();

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
