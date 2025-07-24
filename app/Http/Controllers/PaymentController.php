<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
        Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default: false)
        Config::$isProduction = config('midtrans.is_production');
        // Set sanitization on (default: true)
        Config::$isSanitized = config('midtrans.is_sanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('midtrans.is_3ds');
    }

    public function pay(Request $request)
    {
        $transaction_details = array(
            'order_id'      => uniqid(),
            'gross_amount'  => 10000, // Example amount
        );

        // Optional
        $item_details = array(
            array(
                'id'       => 'item1',
                'price'    => 10000,
                'quantity' => 1,
                'name'     => 'Example Item'
            )
        );

        // Optional
        $customer_details = array(
            'first_name'    => "Budi",
            'last_name'     => "Utomo",
            'email'         => "budi.utomo@example.com",
            'phone'         => "08111222333",
        );

        $params = array(
            'transaction_details' => $transaction_details,
            'customer_details'    => $customer_details,
            'item_details'        => $item_details,
        );

        try {
            // Get Snap Payment Page URL
            $snapToken = Snap::getSnapToken($params);
            return response()->json(['snap_token' => $snapToken]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}