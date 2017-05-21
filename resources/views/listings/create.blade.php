@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Create Listings</div>
            <div class="panel-body">
                <form action="{{ route('listings.store', [$area]) }}" method="POST">
                    {{ csrf_field() }}
                    @include('listings.partials.forms._areas')
                    @include('listings.partials.forms._categories')
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="body" class="control-label">Body</label>
                        <textarea name="body" id="body" rows="5" class="form-control">{{ old('body') }}</textarea>
                    </div>
                    <input type="submit" value="Save Changes" class="btn btn-default">
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
