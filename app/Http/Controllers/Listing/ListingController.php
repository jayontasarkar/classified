<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Jobs\UserViewedListing;
use App\{Area, Category, Listing};
use Illuminate\Http\Request;
use App\Http\Requests\StoreListingFormRequest;

class ListingController extends Controller
{
    public function index(Area $area, Category $category)
    {
    	$listings = Listing::with('user', 'area')
    		->isLive()->inArea($area)
    	    ->fromCategory($category)
    	    ->latestFirst()
    	    ->paginate(10);
    	
    	return view('listings.index', compact('listings', 'category'));
    }

    public function show(Request $request, Area $area, Listing $listing)
    {
    	if( ! $listing->isLive() )
    		abort(404);

        if($request->user())
            dispatch(new UserViewedListing($request->user(), $listing));
        
    	return view('listings.show', compact('listing'));
    }

    public function create()
    {
        return view('listings.create');
    }

    public function store(StoreListingFormRequest $request, Area $area)
    {
        $listing = new Listing;
        $listing->title = $request->title;
        $listing->body = $request->body;
        $listing->area_id = $request->area_id;
        $listing->category_id = $request->category_id;
        $listing->user()->associate($request->user());
        $listing->live = false;

        $listing->save();

        return redirect()->route('listings.edit', [$area, $listing]);
    }

    public function edit(Request $request, Area $area, Listing $listing)
    {
        $this->authorize('edit', $listing);

        return view('listings.edit', compact('listing'));
    }

    public function update(StoreListingFormRequest $request, Area $area, Listing $listing)
    {
        $this->authorize('update', $listing);

        $listing->title = $request->title;
        $listing->body = $request->body;

        if( ! $listing->isLive() ) {
            $listing->category_id = $request->category_id;
        }

        $listing->area_id = $request->area_id;
        $listing->save();

        return back()->withSuccess('Listing edited successfully');
    }
}
