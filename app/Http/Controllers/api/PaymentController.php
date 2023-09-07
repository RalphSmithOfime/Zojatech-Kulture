<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\PaymentRequest;
use App\Http\Controllers\Controller;
use App\Models\Beat;
use App\Models\Payment;
use App\Models\Producer;
use App\Models\Cart;
use App\Models\User;
use App\Services\PaymentService;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class PaymentController extends Controller
{
    use ResponseTrait;

    //
    public PaymentService $paymentService;
    public function __construct()
    {

        $this->paymentService = app(PaymentService::class);
    }


    public function makePayment(PaymentRequest $request): JsonResponse
    {
        $user = auth()->user();
        $ref = uniqid();
        $cart = Cart::findorfail($request->cart_id);
        if(count($cart->items)== 0){
            return $this->errorResponse('Nothing in cart');
        }
        $data = [
            'amount' => $cart->total_price,
            'email' => $user?->email,
            'user_id' => $user?->id,
            'cart_id' => $request->cart_id,
            'cart_items' => $cart->items,
            'reference' => $ref,
            'callback_url' => route('verifyTransaction')
        ];

        Payment::create(Arr::except($data, ['callback_url', 'email']));

        $result = $this->paymentService->initializePayment($data);

        return $this->successResponse('Payment initialzed', $result);
    }

    public function verifyPayment(Request $request): JsonResponse
    {
        try {
            $response =  $this->paymentService->verifyPayment($request->reference);
            $user =auth()->user(); 

            if ($response['status'] == true) {
                $payment = Payment::where('reference', $request->reference)->first();

                if ($payment?->status == 'successful') {
                    return response()->json([
                        "message" => "Payment already verified",
                        "data" =>  $payment,
                    ], 409);
                }

                $payment->status = 'successful'; // @phpstan-ignore-line
                $payment?->save();

                // disburse funds / update all producers' wallet / update Admin wallet. 
                    $cart = Cart::findorfail($payment->cart_id);
                    foreach($cart->items as $item){
                        //update beat details. 
                        $beat = Beat::findorfail($item);
                        $beat->producer->total_revenue += $beat->price;
                        $beat->producer->increment('total_beats_sold');
                        $beat->increment('total_sales');
                        $cart->user->artistes->increment('beats_purchased');
                        $cart->user->artistes->total_amount_spent += $beat->price;
                        $beat->save();          
                        $beat->producer->save();          
                    }

                    //todo: update access. 
                    //todo: send Notification. 

                    //empty cart
                    $cart->update(['items' => [], 'total_price' => 0]);
                    
                    
                    return $this->successResponse('Payment Successful', $payment);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "message" => $th,
                'status' => 302
            ], 302);
        }

        return response()->json([
            "message" => "Payament failed",
            'status' => 400
        ]);
    }

    //Handles withdrawals
    public function createRecipient(Request $request): JsonResponse
    {

        $user = User::findorfail(auth()->user()->id);

        $ref = uniqid();
        $data = [
            'name' => $request['name'],
            'bank_code' => $request['bank_code'],
            'account_number' => $request['account_number'],
        ];

        $result = $this->paymentService->createRecipient($data);

        $user->recipient_code = $result['recipient_code'];
        $user->save();

        return $this->successResponse('Account details uploaded successfully');
    }

    public function initiateWithdrawal(Request $request): JsonResponse
    {
        $user = User::findorfail(auth()->user()->id);
        $producer = Producer::where('user_id', $user->id)->first();

        if ($producer->total_revenue < $request['amount']) {
            return $this->errorResponse('Insufficient balance');
        }

        $data = [
            'recipient' => $user->recipient_code,
            'amount' => $request['amount']
        ];

        $result = "withrawal"; //mock($this->paymentService->initiateWithdrawal($data));

        if ($result) {
            $producer->total_revenue -= $request['amount'];
            $producer->save();
            // dd($producer);
        }
        return $this->successResponse('Withdrawal initiated successfully', $producer);
    }
}
