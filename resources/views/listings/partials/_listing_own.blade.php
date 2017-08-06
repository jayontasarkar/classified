<div class="media">
	<div class="media-body">
		<h4 class="media-heading">
			<strong>
				@if($listing->live())
					<a href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a>
				@else
					{{ $listing->title }}
				@endif
				in {{ $listing->area->name }}
			</strong>
		</h4>
		<ul class="list-inline">
			<li><time>{{ $listing->created_at->diffForHumans() }}</time></li>
			<li>Last updated <time>{{ $listing->updated_at->diffForHumans() }}</li>
		</ul>
		<ul class="list-inline">
			<li>
				<a href="#" 
					onclick="event.preventDefault(); document.getElementById('listings-destory-frm-{{ $listing->id }}').submit();"
				>
					Remove
				</a>
			</li>
			<li>
				<a href="{{ route('listings.edit', [$area, $listing]) }}">Edit</a>
			</li>
		</ul>
	</div>
</div>

<form action="{{ route('listings.destory', [$area, $listing]) }}" method="POST" id="listings-destory-frm-{{ $listing->id }}">
	{{ csrf_field() }}
	{{ method_field('DELETE') }}
</form>