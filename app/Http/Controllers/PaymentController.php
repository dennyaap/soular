<?php

namespace App\Http\Controllers;

use App\Enums\PaymentStatusEnum;
use App\Models\Order;
use App\Models\Transaction;
use App\Service\PaymentService;
use Illuminate\Http\Request;
use YooKassa\Model\Notification\NotificationSucceeded;
use YooKassa\Model\Notification\NotificationWaitingForCapture;
use YooKassa\Model\NotificationEventType;

class PaymentController extends Controller
{
    public function create(Request $request, PaymentService $service) {

        $requestBody = $request->data;

        $amount = $requestBody['amount'];

        $description = $requestBody['description'];

        $order_id = $requestBody['orderId'];

        $return_url = "{{ route('user.orders') }}";

        $transaction = Transaction::create([
            'amount' => $amount,
            'description' => $description,
            'order_id' => $order_id,
            'user_id' => auth()->id()
        ]);

        if($transaction) {
            $link = $service->createPayment($amount, $description, [
                'transaction_id' => $transaction->id,
            ]);

            // return redirect()->away($link);
            return json_encode($link);
        }
    }

    public function callback(Request $request, PaymentService $service) {
        $source = file_get_contents('php://input');
        $requestBody = json_decode($source, true);

        $notification = (isset($requestBody['event']) && $requestBody['event'] === NotificationEventType::PAYMENT_SUCCEEDED)
            ? new NotificationSucceeded($requestBody)
            : new NotificationWaitingForCapture($requestBody); 

        $payment = $notification->getObject();


        if(isset($payment->status) && $payment->status === 'waiting_for_capture') {
            $service->getClient()->capturePayment([
                'amount' => $payment->amount,
            ], $payment->id, uniqid('', true));
        }

        $metadata = (object)$payment->metadata;
        $transactionId = (int)$metadata->transaction_id;
        $transaction = Transaction::find($transactionId);

        if(isset($payment->status) && $payment->status === 'succeeded') {
            if((bool)$payment->paid === true) {

                if(isset($metadata->transaction_id)) {
                    $transaction->status = PaymentStatusEnum::CONFIRMED;
                    $transaction->save();
                }
            }
        } else {
            $order = Order::where('id', $transaction->order_id)->first();
            $order->status = 3;
            $order->save();
        }
    }
}