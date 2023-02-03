<?php
namespace PayWallet;
use GuzzleHttp\Client;

class PWClient {
    
    public function __construct ($publicKey, $privateKey)  {
        $this->publicKey  = $publicKey;
        $this->privateKey = $privateKey;
        $this->client     = new Client(['base_uri' => 'https://paywallet.pro/api/v1/']);
    }

    public function createDepositAddress($merchantKey, $orderId, $currency, $amount, $comment) 
    {
        $response = $this->client->post('merchant/create-deposit-address', [
            'form_params' => [
                'api_public_key' => $this->publicKey,
                'api_private_key' => $this->privateKey,
                'merchant_public_key' => $merchantKey,
                'order_id' => $orderId,
                'currency' => $currency,
                'amount' => $amount,
                'comment' => $comment,
            ]
        ]);
        return json_decode($response->getBody());
    }

    public function instantPayment($merchantKey, $currency, $amount, $wallet, $tag, $comment)
    {
        $response = $this->client->post('merchant/instant-payment', [
            'form_params' => [
                'api_public_key' => $this->publicKey,
                'api_private_key' => $this->privateKey,
                'merchant_public_key' => $merchantKey,
                'currency' => $currency,
                'amount' => $amount,
                'wallet' => $wallet,
                'comment' => $comment,
                'tag' => $tag,
            ]
        ]);
        return json_decode($response->getBody());
    }

    public function getMerchantBalance($merchantKey)
    {
        $response = $this->client->post('merchant/get-merchant-balance', [
            'form_params' => [
                'api_public_key' => $this->publicKey,
                'api_private_key' => $this->privateKey,
                'merchant_public_key' => $merchantKey,
            ]
        ]);
        return json_decode($response->getBody());
    }

    public function getWalletBalance()
    {
        $response = $this->client->post('wallet/get-wallet-balance', [
            'form_params' => [
                'api_public_key' => $this->publicKey,
                'api_private_key' => $this->privateKey,
            ]
        ]);
        return json_decode($response->getBody());
    }

    public function getCurrencyRate($currency)
    {
        $response = $this->client->post('currency/get-currency-rate', [
            'form_params' => [
                'api_public_key' => $this->publicKey,
                'api_private_key' => $this->privateKey,
                'currency' => $currency
            ]
        ]);
        return json_decode($response->getBody());
    }
}
