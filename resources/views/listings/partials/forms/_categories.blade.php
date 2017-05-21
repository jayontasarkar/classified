<div class="form-group{{ $errors->has('category_id') ? 'selected' : '' }}">
	<label for="category_id" class="control-label">Select Category</label>
	<select name="category_id" id="category_id" class="form-control"
		{{ isset($listing) && $listing->live() ? 'disabled="disabled"' : '' }}
	>
		@foreach($categories as $category)
			<optgroup label="{{ $category->name }}">
				@foreach($category->children as $child)
					@if(isset($listing) && $listing->category_id == $child->id || old('category_id') == $child->id)
						<option value="{{ $child->id }}" selected="selected">
							{{$child->name}} (${{number_format($child->price, 2)}})
						</option>
					@else	
						<option value="{{ $child->id }}">{{$child->name}} (${{number_format($child->price, 2)}})</option>
					@endif	
				@endforeach
			</optgroup>
		@endforeach
	</select>
	@include('layouts.partials._formError', [
		'field' => 'category_id'
	])
</div>