<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use Exception;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function update(Request $request)
    {
        //
        $request->validate([
            'id' => 'required',
            'inc' => 'required',
        ]);

        try {
            $orderDetail = OrderDetail::find($request->id);
            $orderDetail->qty += $request->inc;
            $orderDetail->update();
            // return response()->json(['msg' => "Successfully updated"]);
        } catch (Exception  $e) {
            return response()->json(['msg' => "Some error"]);
            // something went wrong
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
