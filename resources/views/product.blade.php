@extends('layouts')

@section('content')

<div class="main-content overflow-hidden">

    <div class="page-content">
        <div class="container-fluid">



            <div class="row">
                @foreach($products as $product)
                    <div class="col-xs-18 col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" height="50">
                            <div class="caption">
                                <div>{{ $product->name }}</div>
                                <p>{{ $product->description }}</p>
                                <p><strong>Price: </strong> {{ $product->price }}$</p>
                                <p class="btn-holder"><a href="{{ route('add.to.cart', $product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>

@endsection
