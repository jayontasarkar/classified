<div class="form-group">
	<label for="area_id" class="control-label">Select Area</label>
	<select name="area_id" id="area_id" class="form-control">
		@foreach($areas as $country)
			<optgroup label="{{ $country->name }}">
				@foreach($country->children as $state)
					<optgroup label="{{ $state->name }}">
						@foreach($state->children as $dist)
							<option value="{{ $dist->id }}" {{ old('area_id') == $dist->id ? 'selected' : '' }}>
								{{ $dist->name }}
							</option>
						@endforeach
					</optgroup>
				@endforeach
			</optgroup>
		@endforeach
	</select>
</div>