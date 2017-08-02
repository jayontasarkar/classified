<?php

namespace App\Http\Controllers;

use Braintree\{Configuration, ClientToken};
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function token()
    {
    	Configuration::environment(env('BRAINTREE_ENV'));
        Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
        Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
        Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));
    	$token = ClientToken::generate();

		return response()->json([
			'data' => [
				'token' => $token
			]
		]);
    }
}
