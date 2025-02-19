<?php

namespace App\Http\Controllers;

use App\Models\Disco;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class MercadoPagoController extends Controller
{
    public function show()
    {

        $discos = Disco::whereIn('discos_id', [1, 2])->get();

        $items = [];

        foreach($discos as $disco) {
            $items[] = [
                'nombre' => $disco->nombre,
                'quantity' => 1,
                'unit_price' => $disco->precio,
            ];
        }

        MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));

        $preferenceFactory = new PreferenceClient();
        $preference = $preferenceFactory->create([
            'items' => $items,
            'back_urls' => [
                'success' => route('test.mercadopago.successProcess'),
                'pending' => route('test.mercadopago.pendingProcess'),
                'failure' => route('test.mercadopago.failureProcess'),
            ],
            'auto_return' => 'approved',
        ]);
        
        return view('mp.test', [
            'discos' => $discos,
            'preference' => $preference,
            'mpPublicKey' => config("mercadopago.public_key")
        ]);
    }

    public function successProcess(Request $request) 
    {
        dd($request->query());
    }

    public function pendingProcess(Request $request) 
    {
        dd($request->query());
    }
    public function failureProcess(Request $request) 
    {
        dd($request->query());
    }
}
