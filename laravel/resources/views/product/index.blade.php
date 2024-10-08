<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Payment</title>
    </head>
    <body class="antialiased">
        <div style="display:flex; gap:3rem;">
            @foreach($products as $product)
            <div class="flex:1">
                <img src="{{ $product->image }}" alt="" style="height:150px; weight:150px">
                <h3>{{$product->name}}</h3>
                <p>${{ $product->price }}</p>
            </div>
            @endforeach
        </div>
        <p>
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <button>Checkout</button>
            </form>
        </p>
    </body>
</html>
