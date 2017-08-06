<?php 

namespace App\Http\ViewComposers;

use Auth;
use App\Area;
use Illuminate\View\View;

class NavigationComposer
{
	private $area;

	public function compose(View $view)
	{
		if( ! Auth::check() ){
			return $view;
		}

		$listings = Auth::user()->listings;

		return $view->with([
			'unpublishedListingsCount' => $listings->where('live', false)->count(),
			'publishedListingsCount'   => $listings->where('live', true)->count(),
		]);
	}
}