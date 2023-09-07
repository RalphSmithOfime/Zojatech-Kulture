<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use Mockery\CountValidator\Exact;

class PaymentService
{

    public function createRecipient(array $data): mixed
    {
        $url = '/transferrecipient';

        try {
            //create paystack recipient
            $fields = [
                'type' => 'nuban',
                'name' => $data['name'],
                'bank_code' => $data['bank_code'],
                'account_number' => $data['account_number'],
                'currency' => 'NGN'
            ];

            $result = $this->hitPaystack('POST', $url, $fields);
            if (!is_array($result)) {
                throw new Exception($result->getMessage(), 1);
            }
            $data = array_merge($data, ['recipient_code' => $result['recipient_code']]);
            return $data;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function initializePayment(array $data): mixed
    {
        $url = '/transaction/initialize';
        $data['amount'] *= 100;
        $response = $this->hitPaystack('POST', $url, $data);
        return $response['authorization_url'];
    }

    public function verifyPayment(string $ref): mixed
    {

        return $this->hitPaystack('GET', '/transaction/verify/' . $ref);
    }

    public function initiateWithdrawal(array $data): mixed
    {
        $url = '/transfer';

        $fields = array_merge($data, [
            "source" => "balance",
            "reason" => "Kultures Withdrawal"
        ]);

        $response = $this->hitPaystack('POST', $url, $fields);

        // dd($response);
        return $response;
    }

    public function verifyWithdrawal(){

    }
    private function hitPaystack(string $method, string $url, mixed $data = ''): mixed
    {
        $client = new Client();

        $options = [
            'headers' => [
                'Authorization' => 'Bearer ' . config('payment.paystack_secret'),
                'Content-Type' => 'application/json'
            ],
            'json' => $data
        ];

        $url = config('payment.paystack_url') . $url;

        try {
            //code...
            $response = $client->request($method, $url, $options);
            $result = $response->getBody()->getContents();
            $formatedData = json_decode($result, true);

            if ($formatedData['status'] == true) {
                return $formatedData['data'];
            }
            return false;
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
