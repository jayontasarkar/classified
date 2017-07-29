@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Pay for your listing</div>
            <div class="panel-body">
                @if($listing->cost() == 0)
                    <form action="#" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <p>There's nothing for you to pay</p>
                        <button type="submit" class="btn btn-primary">Complete</button>
                    </form>
                @else
                    <p>Total cost: &euro;{{ number_format($listing->cost(), 2) }}</p>    
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
