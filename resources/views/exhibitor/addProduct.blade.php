<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bike Test - Gryon</title>
</head>

<body>
    <form method="post" action="{{route('catalogue.store')}}" enctype="multipart/form-data">
        @csrf
        <select name="categories" id="categories">
            <option value="">Catégorie</option>
        @foreach ($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
        </select>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
        <label for="shortDesc">Modèle</label>
        <input type="text" id="shortDesc" name="shortDesc">
        <label for="brand">Marque</label>
        <input type="text" id="brand" name="brand" value="{{$brand->id}}">
        <label for="sizes">Taille(s)</label>
        <select name="sizes" id="sizes">
            <option value="S">S / 46-47</option>
            <option value="M">M / 48-50</option>
            <option value="L">L / 48-53</option>
            <option value="XL">XL / 58-60</option>
        </select>
        <label for="price">Prix</label>
        <input type="number" id="price" name="price">
        <label for="modelNumber">Numéro de produit</label>
        <input type="number" id="modelNumber" name="modelNumber">
        <label for="distinctive_sign">Signe distinctif</label>
        <input type="text" name="distinctive_sign" id="distinctive_sign">
        <label for="longDesc">Description</label>
        <textarea name="longDesc" id="longDesc" cols="30" rows="5"></textarea>
        <button type="submit">Ajouter</button>
    </form>
</body>

</html>