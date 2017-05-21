@extends('layouts.app')

@section('content')

<div class="panel panel-default">
	<div class="panel-body">
		<div class="row">
			@foreach($areas as $country)
				<div class="col-md-12">
					<h3><a href="{{ route('user.area.store', $country) }}">{{ $country->name }}</a></h3>
					@foreach($country->children->chunk(4) as $chunk)
						<div class="row">
							@foreach($chunk as $division)
								<div class="col-md-3">
									<h4>
										<a href="{{ route('user.area.store', $division) }}">
											{{ $division->name }}
										</a>
									</h4>
									<hr>
									@foreach($division->children as $district)
										<h5>
											<a href="{{ route('user.area.store', $district) }}">
												{{ $district->name }}
											</a>
										</h5>
									@endforeach
								</div>
							@endforeach
						</div>
					@endforeach
				</div>
			@endforeach
		</div>
	</div>
</div>

@endsection
