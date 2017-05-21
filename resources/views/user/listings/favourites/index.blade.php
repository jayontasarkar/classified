@extends('layouts.app')

@section('content')
	@if($listings->count())
		@each('listings.partials._listing_favourite', $listings, 'listing')
		{{ $listings->links() }}
	@else
		<p>No favourite listings found!</p>
	@endif
@stop