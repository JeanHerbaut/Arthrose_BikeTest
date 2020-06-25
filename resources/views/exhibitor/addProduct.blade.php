<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bike Test - Gryon</title>
</head>

<body>
    <form action="{{route('products.store')}}" method="post">
        @csrf
        <label for="categories">Catégorie</label>
        <select name="categories" id="categories">
            {{--         @foreach ($collection as $item)
            
        @endforeach --}}
        </select>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <label for="shortDesc">Modèle</label>
        <input type="text" id="shortDesc" name="shortDesc">
        <label for="brand">Marque</label>
        <input type="text" id="brand" name="brand">
        <label for="sizes">Taille(s)</label>
        <select name="sizes" id="sizes">
            <option value="S / 46-47">S / 46-47</option>
            <option value="M / 48-50">M / 48-50</option>
            <option value="L / 48-53">L / 48-53</option>
            <option value="XL / 58-60">XL / 58-60</option>
        </select>
        <label for="price">Prix</label>
        <input type="number" id="price" name="price">
        <label for="modelNumber">Numéro de produit</label>
        <input type="number" id="modelNumber" name="modelNumber">
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>