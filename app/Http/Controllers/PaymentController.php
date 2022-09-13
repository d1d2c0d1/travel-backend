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
            'transaction_id' => (int) $request->input('TransactionId'),
            'status' => (int) $request->input('Amount'),
            'invoice_id' => (int) $request->input('InvoiceId'),
            'account_id' => (int) $request->input('AccountId'),
            'amount' => (int) $request->input('Amount'),
            'payment_at' => date('Y-m-d H:i:s', strtotime($request->input('DateTime'))),
            'subscription_id' => (string) $request->input('SubscriptionId'),
            'payment_currency' => (string) $request->input('PaymentCurrency'),
            'payment_amount' => (string) $request->input('PaymentAmount'),
            'currency' => (string) $request->input('Currency'),
            'card_first_six' => (string) $request->input('CardFirstSix'),
            'card_last_four' => (string) $request->input('CardLastFour'),
            'card_type' => (string) $request->input('CardType'),
            'card_exp_date' => (string) $request->input('CardExpDate'),
            'test_mode' => (int) $request->input('TestMode'),
            'payment_status' => (string) $request->input('Status'),
            'opperation_type' => (string) $request->input('OperationType'),
            'name' => (string) $request->input('Name'),
            'email' => (string) $request->input('Email'),
            'ip' => (string) $request->input('IpAddress'),
            'ip_country' => (string) $request->input('IpCountry'),
            'ip_city' => (string) $request->input('IpCity'),
            'ip_region' => (string) $request->input('IpRegion'),
            'ip_district' => (string) $request->input('IpDistrict'),
            'ip_latitude' => (string) $request->input('IpLatitude'),
            'ip_longitude' => (string) $request->input('IpLongitude'),
            'issuer' => (string) $request->input('Issuer'),
            'issuer_bank_country' => (string) $request->input('IssuerBankCountry'),
            'description' => (string) $request->input('Description'),
            'card_product' => (string) $request->input('CardProduct'),
            'payment_method' => (string) $request->input('PaymentMethod'),
            'data' => $request->input('Data') ?? '{}',
            'item_id' => 0,
            'token_recipient' => (string) $request->input('TokenRecipient')
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
