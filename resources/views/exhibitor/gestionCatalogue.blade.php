<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bike Test - Gryon</title>
</head>
<body>
    <h1>Gestion catalgue</h1>
    <main>
        <div id="gestion">
            <input type="text">
            <button id="search-bike">Search</button>
            <form action="{{route('catalogue.create')}}">
            <button type="submit">Ajouter un vélo</button>
            </form>
        </div>
        <div id="catalogue">
        @foreach ($products as $product)
        <img src="{{asset($product->image)}}" alt="">
        {{-- besoin qu'on regarde ensemble cette partie pour l'input de recherche --}}
        <p data-desc="{{$product->shortDesc}}">{{$product->shortDesc}}<p>
        <p>{{$product->category}}</p>
        <p>{{$product->brand->name}}</p>
        <p>{{$product->rating}}</p>
        <p>{{$product->nbr_rating}}</p>
        {{-- prix du produit --}}
        @if ($product->price == 1) 
        <p>$</p>
        @elseif($product->price == 2)
        <p>$$</p>
        @else
        <p>$$$</p>
        @endif
        @endforeach
        </div>
    </main>
</body>
</html>