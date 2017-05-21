@extends('layouts.app')

@section('content')
	@if($listings->count())
		<p>Showing your last {{ $lastViewed }} viewed listings.</p>
		@each('listings.partials._listing', $listings, 'listing')
	@else
		<p>you have not viewed any listings.</p>
	@endif
@stop