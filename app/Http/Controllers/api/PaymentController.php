<?php

namespace App\Http\Controllers\api;

use App\Http\Requests\PaymentRequest;
use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Producer;
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
        $data = [
            'amount' => $request->amount * 100 * $request->quantity,
            'email' => $user?->email,
            'user_id' => $user?->id,
            'quantity' => $request->quantity,
            'reference' => $ref,
            'callback_url' => route('verifyTransaction')
        ];
        Payment::create(Arr::except($data, ['callback_url', 'email']));

        $result = $this->paymentService->initializePayment($data);

        return response()->json([
            "message" => "Payment initialized",
            "data" =>  $result,
            'status' => 200
        ]);
    }

    public function verifyTransaction(Request $request): JsonResponse
    {
        try {
            $response =  $this->paymentService->verifyPayment($request->reference);

            if ($response['status'] == true) {
                $payment = Payment::where('reference', $request->reference)->first();

                if ($payment?->status == 'successful') {
                    return response()->json([
                        "message" => "Payment already verified",
                        "data" =>  $payment,
                        'status' => 200
                    ]);
                }

                $payment->status = 'successful'; // @phpstan-ignore-line
                $payment?->save();



                return response()->json([
                    "message" => "Payment Successful",
                    "data" =>  'test',
                    'status' => 200
                ]);
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

        return response()->json([
            "message" => "Account details uploaded successfully",
            'status' => 200
        ]);
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
