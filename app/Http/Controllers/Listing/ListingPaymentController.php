<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\{Listing, Area};
use Carbon\Carbon;
use Illuminate\Http\Request;

class ListingPaymentController extends Controller
{
    public function show(Area $area, Listing $listing)
    {
    	$this->authorize('touch', $listing);

    	if($listing->live()) {
    		return back();
    	}

    	return view('listings.payment.show', compact('listing'));
    }

    public function store(Request $request, Area $area, Listing $listing)
    {
    	$this->authorize('touch', $listing);

    	if($listing->live()) {
    		return back();
    	}
    	if($listing->cost() === 0){
    		return back();
    	}
    	if(($nonce = $request->payment_method_nonce) === null) {
    		return back();
    	}
    	$result = \Braintree_Transaction::sale([
		    'amount' => $listing->cost(),
		    'paymentMethodNonce' => $nonce,
		    'options' => [
		        'submitForSettlement' => True
		    ]
		]);

        if($result->success === false) {
            return back()
                ->withError('Something went wrong while processing your payment');
        }

        $listing->live = true;
        $listing->created_at = Carbon::now();
        $listing->save();

        return redirect()
            ->route('listings.show', [$area, $listing])
            ->withSuccess('Congratulations! Payment accepted and your listing is live.');
    }
}
