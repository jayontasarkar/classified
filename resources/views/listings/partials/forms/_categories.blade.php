<div class="form-group">
	<label for="category_id" class="control-label">Select Category</label>
	<select name="category_d" id="category_id" class="form-control">
		@foreach($categories as $category)
			<optgroup label="{{ $category->name }}">
				@foreach($category->children as $child)
					<option value="{{ $child->id }}" {{ old('category_id') == $child->id ? 'selected' : '' }}>
						{{ $child->name }} (${{ number_format($child->price, 2) }})
					</option>
				@endforeach
			</optgroup>
		@endforeach
	</select>
</div>