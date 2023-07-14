<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Braintree;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function generateToken()
    {
        $gateway = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return view('admin.dropin', compact('clientToken'));
    }

    public function processPayment(Request $request)
    {
        $gateway = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);

        $nonce = $request->input('payment_method_nonce');

        $result = $gateway->transaction()->sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {
            // Il pagamento è andato a buon fine
            return 'Pagamento completato con successo!';
        } else {
            // Il pagamento ha avuto un errore
            return 'Errore durante il pagamento: '.$result->message;
        }
    }
}
