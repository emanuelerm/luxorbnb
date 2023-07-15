<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Property;
use Braintree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
    public function generateToken()
    {
        $id = Auth::id();
        $properties = Property::where('user_id', $id)->get();
        $offers = Offer::all();

        $gateway = new Braintree\Gateway([
            'environment' => env('BRAINTREE_ENV'),
            'merchantId' => env('BRAINTREE_MERCHANT_ID'),
            'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
            'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
        ]);

        $clientToken = $gateway->clientToken()->generate();

        return view('admin.dropin', compact('clientToken', 'properties', 'offers'));
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

        // Leggi l'offerta selezionata dall'utente
        $selectedOffer = $request->input('selected_offer');

        // Recupera il prezzo e la durata dell'offerta selezionata
        $offer = Offer::where('id', $selectedOffer)->first();
        $price = $offer->price;
        $duration = $offer->duration;

        // Recupera le proprietà selezionate
        $selectedProperties = $request->input('properties_to_sponsor', []);

        // Calcola il prezzo totale basato sull'offerta selezionata e sul numero di proprietà selezionate
        $totalPrice = $price * count($selectedProperties);

        $result = $gateway->transaction()->sale([
            'amount' => $totalPrice,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true,
            ],
        ]);

        if ($result->success) {
            // Il pagamento è andato a buon fine

            if (count($selectedProperties) > 0) {
                foreach ($selectedProperties as $propertyId) {
                    // Crea un nuovo record nella tabella ponte offer_property
                    DB::table('offer_property')->insert([
                        'offer_id' => $offer->id,
                        'property_id' => $propertyId,
                        'started_at' => now(),
                        'finished_at' => now()->addHours($duration),
                        'expired' => false,
                    ]);
                }
            }
            $message = 'Pagamento completato con successo!';
            Session::flash('success_message', $message);
            // Restituisci una risposta appropriata all'utente
            return redirect()->route('admin.properties.index');
        } else {
            // Il pagamento ha avuto un errore
            return 'Errore durante il pagamento: '.$result->message;
        }
    }
}
