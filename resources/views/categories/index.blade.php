@extends('layouts.app')

@section('content')
@foreach($categories->chunk(4) as $chunk)
<div class="row">
	@foreach($chunk as $category)
	<div class="col-md-3">
		<h4>{{ $category->name }}</h4>
		<hr>
		@if($category->children)
			@foreach($category->children as $subCat)
				<h5>
					<a href="{{ route('listings.index', [$area, $subCat]) }}">
						{{ $subCat->name }}
					</a> ({{ $subCat->listings->count() }})
				</h5>
			@endforeach
		@endif	
	</div>
	@endforeach
</div>
@endforeach

@endsection
