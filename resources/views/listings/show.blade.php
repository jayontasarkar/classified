@extends('layouts.app')

@section('content')
	<div class="row">
		@if(Auth::check())
			<div class="col-md-3">
				<div class="panel">
					<div class="panel-body">
						<nav class="nav nav-stacked">
							<li><a href="#">Email to a friend</a></li>
							@if( ! $listing->favouritedBy(Auth::user()))
							<li>
								<a href="#" onclick="event.preventDefault(); document.getElementById('listings-favourite-form').submit();">Add to favourites</a>

								<form action="{{ route('listings.favourites.store', [$area, $listing]) }}" 
									method="POST"
									id="listings-favourite-form"
									class="hidden" 
								>
									{{ csrf_field() }}
								</form>
							</li>
							@endif
						</nav>
					</div>
				</div>
			</div>
		@endif	
		<div class="col-md-{{ Auth::check() ? 9 : 12}}">
			<div class="panel panel-default">
				<div class="panel-heading" style="font-size: large;">
					{{ $listing->title }} in <span class="text-muted">{{ $listing->area->name }}</span>
				</div>
				<div class="panel-body">
					{!! nl2br(e($listing->body)) !!}
					<hr>
					<p>
						<small>viewed {{ $listing->views() }} times</small>
					</p>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					Contact {{ $listing->user->name }}
				</div>
				<div class="panel-body">
					@if(Auth::guest())
						<p>
							<a href="/register">Sign up</a> for an account or <a href="/login">sign in</a> to contact listing owners.
						</p>
					@else
						<form action="{{ route('listings.contact.store', [$area, $listing]) }}" method="POST">
							{{ csrf_field() }}
							<div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
								<label for="message" class="control-label">Message</label>
								<textarea name="message" 
										id="message" 
										cols="30" 
										rows="5" 
										class="form-control"
										value="{{ old('message') }}"
								></textarea>
								@if($errors->has('message'))
									<span class="help-block">
										{{ $errors->first('message') }}
									</span>
								@endif
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-default">Send</button>
								<span class="help-block">
									This will email to {{ $listing->user->name }} and they'll be able to reply directly to you by email.
								</span>
							</div>
						</form>
					@endif
				</div>
			</div>
		</div>
	</div>
@stop
