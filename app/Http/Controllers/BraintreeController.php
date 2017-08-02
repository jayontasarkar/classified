<?php

namespace App\Http\Controllers;

use Braintree\{Configuration, ClientToken};
use Illuminate\Http\Request;

class BraintreeController extends Controller
{
    public function token()
    {
   		return response()->json([
			'data' => [
				'token' => ClientToken::generate()
			]
		]);
    }
}
