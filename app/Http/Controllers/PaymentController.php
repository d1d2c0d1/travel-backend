<?php

namespace App\Http\Controllers;

use App\Http\Helpers\MainHelper;
use App\Models\Order;
use App\Models\Payment;
use Exception;
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

        $paymentData = [
            'transaction_id' => (int) $request->input('TransactionId'),
            'status' => 1,
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

        // Create payment row
        $payment = new Payment($paymentData);

        // 4377 7200 0157 1694
        // Find order by payment invoice_id
        $order = Order::find($payment->invoice_id);

        if( !$order || !$order?->id ) {
            return response([
                'status' => false,
                'error' => 'Order not found'
            ]);
        }

        $payment->item_id = $order->item_id;
        $order->is_processing = true;

        try {
            $payment->save();
            $order->save();
        } catch (Exception $e) {
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
        $this->updatePayment($request, 2, true);
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
        $this->updatePayment($request, 1);
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
        $this->updatePayment($request, 3);
        return response([
            'code' => 0
        ]);
    }

    /**
     * Payment canceled
     *
     * @param Request $request
     * @return Response
     */
    public function cancel(Request $request): Response
    {
        $this->updatePayment($request, 1);
        return response([
            'code' => 0
        ]);
    }

    /**
     * Return payment by request
     *
     * @param Request $request
     * @return Payment|null
     */
    private function getPayment(Request $request): Payment | null
    {
        $transactionId = (int) $request->input('TransactionId');
        $invoiceId = (int) $request->input('InvoiceId');
        $accountId = (int) $request->input('AccountId');

        if( $transactionId <= 0 || $invoiceId <= 0 || $accountId <= 0 ) {
            return null;
        }

        return Payment::where([
            ['transaction_id', '=', $transactionId],
            ['invoice_id', '=', $invoiceId],
            ['account_id', '=', $accountId]
        ])  ->with('order')
            ->with('user')
            ->with('item')
            ->first();
    }

    /**
     * Update data by payment and order
     *
     * @param Request $request
     * @param int $paymentStatus
     * @param bool $isPayment
     * @param bool $isProcessing
     * @return Response|bool
     */
    private function updatePayment(Request $request, int $paymentStatus, bool $isPayment = false, bool $isProcessing = false): Response | bool
    {

        $payment = $this->getPayment($request);

        if( !$payment || !$payment?->id ) {
            return response([
                'status' => false,
                'error' => 'Invoice not found'
            ], 404);
        }

        // Set approved payment and order status
        $payment->status = $paymentStatus;
        $payment->order->is_payment = $isPayment;
        $payment->order->is_processing = $isProcessing;

        if( $isPayment ) {

            $item = $payment->item;
            $order = $payment->order;

            MainHelper::sendAction('alert', $item->author->token, [
                'type' => 'order.paid',
                'item' => $item,
                'order' => $order,
                'executor' => MainHelper::getUser()
            ]);

        }

        try {
            $payment->save();
        } catch (Exception $e) {
            return response([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }

        return true;
    }

}
