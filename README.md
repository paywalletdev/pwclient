# PayWallet Api Client (PHP Composer package)

PayWallet API documentations is available at [https://paywallet.pro/api/docs/introduction](https://paywallet.pro/api/docs/introduction)

## Installation

The recommended way to install package is through [Composer](https://getcomposer.org/).

```bash
composer require paywallet/pwclient
```

## Examples

#### **Create address for deposit or Payment page URL**
Documentation: [https://paywallet.pro/api/docs/create-deposit-address](https://paywallet.pro/api/docs/create-deposit-address)

```php
use PayWallet\PWClient;

$PWC = new PWClient(
    'wlOcww20hgShuhVdR4Rl4Vy7cWrLDsdn', //API public key
    'izJnim4ojkGCRgXVEbErvehsbRcjpiFc'  //API private key
);

$result = $PWC->createDepositAddress(
    'zKnIaZe4eeKpWzNtMRhA7eRFIJeKXnfq', //Merchant public key
    '20',                               //Order ID
    'trx',                              //Currency in lowercase
    10,                                 //Expected Amount
    'Test api'                          //Comment
);

var_dump($result);
```
> You can send your client a link to the payment page. Demo page: [https://paywallet.pro/order/5P25LAHc2LmHJt30U4SesqvH](https://paywallet.pro/order/5P25LAHc2LmHJt30U4SesqvH).


#### **Instant payment (Withdraw)**
Documentation: [https://paywallet.pro/api/docs/instant-payment](https://paywallet.pro/api/docs/instant-payment)

````php
use PayWallet\PWClient;

$PWC = new PWClient(
    'wlOcww20hgShuhVdR4Rl4Vy7cWrLDsdn', //API public key
    'izJnim4ojkGCRgXVEbErvehsbRcjpiFc'  //API private key
);

$result = $PWC->instantPayment(
    'zKnIaZe4eeKpWzNtMRhA7eRFIJeKXnfq', //Merchant public key
    'xlm',                              //Currency in lowercase
    5,                                  //Withdraw amount
    'GDNEMX6JROI6ICWHVDRT7XJF7X6CLT4JVRZ5XTBJABIQRC35SO3INQIQ', //Payment address
    2002                                //Tag or NULL
    'Test api',                         //Comment
);

var_dump($result);
````
> The tag is needed only for `XLM` and `XRP` currencies. For other currencies, the `tag` must be specified as `NULL`.


#### **Get merchant balance**
Documentation: [https://paywallet.pro/api/docs/get-merchant-balance](https://paywallet.pro/api/docs/get-merchant-balance)

````php
use PayWallet\PWClient;

$PWC = new PWClient(
    'wlOcww20hgShuhVdR4Rl4Vy7cWrLDsdn', //API public key
    'izJnim4ojkGCRgXVEbErvehsbRcjpiFc'  //API private key
);

$result = $PWC->getMerchantBalance(
    'zKnIaZe4eeKpWzNtMRhA7eRFIJeKXnfq'  //Merchant public key 
);

var_dump($result);
````


#### **Get wallet balance**
Documentation: [https://paywallet.pro/api/docs/get-wallet-balance](https://paywallet.pro/api/docs/get-wallet-balance)

````php
use PayWallet\PWClient;

$PWC = new PWClient(
    'wlOcww20hgShuhVdR4Rl4Vy7cWrLDsdn', //API public key
    'izJnim4ojkGCRgXVEbErvehsbRcjpiFc'  //API private key
);

$result = $PWC->getWalletBalance();

var_dump($result);
````


#### **Get currency rate**
Documentation: [https://paywallet.pro/api/docs/get-currency-rate](https://paywallet.pro/api/docs/get-currency-rate)

````php
use PayWallet\PWClient;

$PWC = new PWClient(
    'wlOcww20hgShuhVdR4Rl4Vy7cWrLDsdn', //API public key
    'izJnim4ojkGCRgXVEbErvehsbRcjpiFc'  //API private key
);

$result = $PWC->getCurrencyRate('btc');

var_dump($result);
````