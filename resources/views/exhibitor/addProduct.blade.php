<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bike Test - Gryon</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
    <form method="post" action="/createBike" enctype="multipart/form-data">
        @csrf
        <label for="image">Image</label>
        <input type="file" name="image" id="image" disabled><br>
        <label for="nModel">N° de modèle</label>
        <input type="text" id="nModel" name="nModel">
        <button id="checkNmodel">✅</button><br>
        <select name="categories" id="categories" disabled>
            <option value="">Catégorie</option>
        @foreach ($categories as $category)
            <option value="{{$category->name}}">{{$category->name}}</option>
        @endforeach
        </select><br>
        <label for="brand">Marque</label>
        <input type="text" id="brand" name="brand" value="{{$brand->name}}" readonly><br>
        <label for="shortDesc">Modèle</label>
        <input type="text" id="shortDesc" name="shortDesc" disabled><br>
        <label for="longDesc">Description</label>
        <textarea name="longDesc" id="longDesc" cols="30" rows="5" disabled></textarea><br>
        <label for="price">Prix</label>
        <input type="number" id="price" name="price" disabled><br>

        <label for="sizes">Taille(s)</label>
        <select name="sizes" id="sizes" disabled>
            <option value="S">S / 46-47</option>
            <option value="M">M / 48-50</option>
            <option value="L">L / 48-53</option>
            <option value="XL">XL / 58-60</option>
        </select><br>
        <label for="distinctive_sign">Signe distinctif</label>
        <input type="text" name="distinctive_sign" id="distinctive_sign" disabled><br>
        <button class="btn-submit" type="submit">Ajouter</button>
    </form>

    <script src="{{ asset('js/addProductCtrl.js')}}" type="text/javascript" defer></script>
</body>

</html>