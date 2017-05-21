<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingViewedController extends Controller
{
	const INDEX_LIMIT = 10;

    public function index(Request $request)
    {
    	$listings = $request->user()
    	    ->viewedListings()
    	    ->orderByPivot('updated_at', 'desc')
    	    ->isLive()
    	    ->take(self::INDEX_LIMIT)
    	    ->get();

    	return view('user.listings.viewed.index', [
    		'listings' => $listings,
    		'lastViewed' => self::INDEX_LIMIT
    	]);    
    }
}
