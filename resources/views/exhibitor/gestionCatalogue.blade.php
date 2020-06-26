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
        @foreach ($bikes as $bike)
        <img src="{{asset($bike['image'])}}" alt="">
        {{-- besoin qu'on regarde ensemble cette partie pour l'input de recherche --}}
        <p data-desc="{{$bike['shortDesc']}}">{{$bike['shortDesc']}}<p>
        <p>{{$bike['category']}}</p>
        <p>{{$bike['brand']}}</p>
        <p>{{$bike['rating']}}</p>
        <p>{{$bike['nbr_rating']}}</p>
        {{-- prix du produit --}}
        @if ($bike['price'] == 1) 
        <p>$</p>
        @elseif($bike['price'] == 2)
        <p>$$</p>
        @else
        <p>$$$</p>
        @endif
        <form method="POST" action="{{route('catalogue.destroy', [$bike['id']])}}" accept-charset="UTF-8">
            @csrf
            @method('DELETE')
            <input onclick="return confirm('Vraiment supprimer ce produit ?')" type="submit" value="Supprimer ce produit">
        </form>
        @endforeach
        </div>
    </main>
</body>
</html>