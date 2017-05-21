<strong>Hi, {{ $listing->user->name }}</strong>, <br><br>

{{ $sender->name }} has contacted you about your listing <a href="{{ route('listings.show', [$listing->area, $listing]) }}">{{ $listing->title }}</a>. <br><br>

.......... <br>
{!! nl2br(e($body)) !!} <br>
.......... <br> <br>

reply directly to this email to get back to them.



