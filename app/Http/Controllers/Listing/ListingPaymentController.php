<?php

namespace App\Http\Controllers\Listing;

use App\{Listing, Area};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
