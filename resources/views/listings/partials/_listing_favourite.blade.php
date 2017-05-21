@component('listings.partials._base_listing', compact('listing'))
	@slot('links')
		<ul class="list-inline">
			<li>
				Added {{ $listing->pivot->created_at->diffForHumans() }}
			</li>
			<li>
				<a href="#" onclick="event.preventDefault();document.getElementById('listings-favourites-destroy-{{ $listing->id }}').submit();">Delete</a>

				<form action="{{ route('listings.favourites.destroy', [$area, $listing]) }}" 
					method="POST"
					id="listings-favourites-destroy-{{ $listing->id }}" 
				>
					{{ method_field('DELETE') }}
					{{ csrf_field() }}
				</form>
			</li>
		</ul>
	@endslot	
@endcomponent