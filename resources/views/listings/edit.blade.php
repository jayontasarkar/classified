@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Continue editing listing
                @if($listing->live())
                    <span class="pull-right">
                        <a href="{{ route('listings.show', [$area, $listing]) }}">Go to listing</a>
                    </span>
                @endif
            </div>
            <div class="panel-body">
                <form action="{{ route('listings.update', [$area, $listing]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    @if($listing->live())
                        <input type="hidden" name="category_id" value="{{ $listing->category_id }}">
                    @endif
                    @include('listings.partials.forms._areas')
                    @include('listings.partials.forms._categories')
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" 
                            value="{{ old('title') ? : $listing->title }}">
                        @include('layouts.partials._formError', [
                            'field' => 'title'
                        ])
                    </div>
                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        <label for="body" class="control-label">Body</label>
                        <textarea name="body" id="body" rows="5" class="form-control"
                        >{{ old('body') ? : $listing->body }}</textarea>
                        @include('layouts.partials._formError', [
                            'field' => 'body'
                        ])
                    </div>
                    <div class="form-group clearfix">
                        <input type="submit" value="Save" class="btn btn-default">
                        @if(!$listing->live())
                            <button type="submit" name="payment" value="true" class="btn btn-sm btn-primary pull-right">
                                Continue to payment
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
