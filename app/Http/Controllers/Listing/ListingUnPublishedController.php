<?php

namespace App\Http\Controllers\Listing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingUnPublishedController extends Controller
{
    public function __construct()
    {
    	$this->middleware(['auth']);
    }

    public function index(Request $request)
    {
    	$listings = $request->user()->listings()->with(['area'])
    			->isNotLive()->latestFirst()
    	        ->paginate(config('classified.defaults.per_page'));

    	return view('user.listings.unpublished.index', compact('listings'));
    }
}
