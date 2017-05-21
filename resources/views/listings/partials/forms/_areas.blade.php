<div class="form-group{{ $errors->has('area_id') ? 'selected' : '' }}">
	<label for="area_id" class="control-label">Select Area</label>
	<select name="area_id" id="area_id" class="form-control">
		@foreach($areas as $country)
			<optgroup label="{{ $country->name }}">
				@foreach($country->children as $state)
					<optgroup label="{{ $state->name }}">
						@foreach($state->children as $dist)
							@if(
								isset($listing) && $listing->area->id == $dist->id || 
								! isset($listing) && $area->id == $dist->id && ! old('area_id') ||
								old('area_id') == $dist->id
							)
								<option value="{{ $dist->id }}" selected="selected">{{ $dist->name }}</option>
							@else	
								<option value="{{ $dist->id }}">{{ $dist->name }}</option>
							@endif	
						@endforeach
					</optgroup>
				@endforeach
			</optgroup>
		@endforeach
	</select>
	@include('layouts.partials._formError', [
		'field' => 'area_id'
	])
</div>