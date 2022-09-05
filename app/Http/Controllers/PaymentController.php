<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Purchase;
use Error;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function browse()
    {

    }

    public function read()
    {

    }

    public function edit(Request $request, $itemId)
    {
        $itemId = Purchase::find($itemId);
    }

    public function add(Request $request)
    {
        $validate =  validator($request->all([
            "transactionId" => "required|string",
            "totalPrice" => "required|number",
            "paymentMethod" =>"required|string"
        ]));
        if(!$validate)
        {
            return response()->json(["message"=>"validation error","error"=>$validate()->errors()]);
        }
        $payment = Payment::create(
            [
                "transactionId"=>$request->transactionId,
                "totalPrice"=>$request->totalPrice,
                "paymentMethod"=>$request->paymentMethod,
            ]
            );

            return response()->json(["message" =>"Payment added", "payment"=>$payment]);
    }

    public function delete()
    {

    }

    public function receipt()
    {

    }
}
