<div class="media">
	<div class="media-body">
		<h5>
			<strong>
				<a href="{{ route('listings.show', [$area, $listing]) }}">{{ $listing->title }}</a>
			</strong>
			@if($area->children->count())
				&nbsp;in {{ $listing->area->name }}
			@endif
		</h5>
		<ul class="list-inline">
			<li><time>{{ $listing->created_at->diffForHumans() }}</time></li>
			<li>by {{ $listing->user->name }}</li>
		</ul>
		{{ $links or '' }}
	</div>
</div>