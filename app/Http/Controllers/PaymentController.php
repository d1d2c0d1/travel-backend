<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{

    /**
     * Payment check
     *
     * @param Request $request
     * @return Response
     */
    public function check(Request $request): Response
    {

        Log::debug('Payment Check: ' . json_encode($request));

        $paymentData = [
            'transaction_id' => (int) $request->input('transaction_id'),
            'status' => (int) $request->input('status'),
            'invoice_id' => (int) $request->input('invoice_id'),
            'account_id' => (int) $request->input('account_id'),
            'item_id' => (int) $request->input(''),
            'amount' => (int) $request->input(''),
            'payment_at' => date('Y-m-d H:i:s', strtotime($request->input(''))),
            'subscription_id' => (string) $request->input(''),
            'payment_currency' => (string) $request->input(''),
            'payment_amount' => (string) $request->input(''),
            'currency' => (string) $request->input(''),
            'card_first_six' => (string) $request->input(''),
            'card_last_four' => (string) $request->input(''),
            'card_type' => (string) $request->input(''),
            'card_exp_date' => (string) $request->input(''),
            'test_mode' => (int) $request->input(''),
            'payment_status' => (string) $request->input(''),
            'opperation_type' => (string) $request->input(''),
            'token_recipient' => (string) $request->input(''),
            'name' => (string) $request->input(''),
            'email' => (string) $request->input(''),
            'ip' => (string) $request->input(''),
            'ip_country' => (string) $request->input(''),
            'ip_city' => (string) $request->input(''),
            'ip_region' => (string) $request->input(''),
            'ip_district' => (string) $request->input(''),
            'ip_latitude' => (string) $request->input(''),
            'ip_longitude' => (string) $request->input(''),
            'issuer' => (string) $request->input(''),
            'issuer_bank_country' => (string) $request->input(''),
            'description' => (string) $request->input(''),
            'card_product' => (string) $request->input(''),
            'payment_method' => (string) $request->input(''),
            'data' => $request->input('') ?? '{}'
        ];

        $payment = new Payment($paymentData);

        try {
            $payment->save();
        } catch (\Exception $e) {
            return response([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }

        return response([
            'code' => 0
        ]);
    }

    /**
     * Payment accepted
     *
     * @param Request $request
     * @return Response
     */
    public function pay(Request $request): Response
    {

        return response([
            'code' => 0
        ]);
    }

    /**
     * Payment failed
     *
     * @param Request $request
     * @return Response
     */
    public function fail(Request $request): Response
    {

        return response([
            'code' => 0
        ]);
    }

    /**
     * Payment confirmed
     *
     * @param Request $request
     * @return Response
     */
    public function confirm(Request $request): Response
    {

        return response([
            'code' => 0
        ]);
    }

    /**
     * Payment refunded
     *
     * @param Request $request
     * @return Response
     */
    public function refund(Request $request): Response
    {

        return response([
            'code' => 0
        ]);
    }

}
