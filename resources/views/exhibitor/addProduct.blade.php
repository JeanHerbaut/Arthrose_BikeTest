@extends('layouts.template')
@section('content')
    <link defer rel="stylesheet" type="text/css" href="{{ asset('css/addProduct.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bike Test - Gryon</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <form  method="post" action="{{url('/createBike')}}" enctype="multipart/form-data">
            @csrf
            <div class="sameLine">
                <div class="group">
                    <label for="modelNumber">N° de modèle</label>
                    <input type="text" id="modelNumber" name="modelNumber" value="{{ old('modelNumber') }}">
                    @error('modelNumber')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <button id='checkNmodel' class="recherche-form"><i class="fa fa-search"></i></button>
            </div>
            <div class="group">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" disabled value="{{ old('image') }}">
                @error('image')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="sameLine">
                <div class="group">
                    <label for="brand">Marque</label>
                    <input type="text" id="brand" name="brand" value="{{$brand->name}}" disabled>
                    @error('brand')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="group">
                    <label for="shortDesc">Modèle</label>
                    <input type="text" id="shortDesc" name="shortDesc" disabled value="{{ old('shortDesc') }}">
                    @error('shortDesc')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="group">
                <label for="longDesc">Description</label>
                <textarea name="longDesc" id="longDesc" cols="60" rows="5" disabled value="{{ old('longDesc') }}"></textarea>
                @error('longDesc')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="sameLine">
                <div class="group">
                    <select name="categories" id="categories" disabled value="{{ old('categories') }}">
                    <option value="">Catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->name}}">{{$category->name}}</option>
                    @endforeach
                    </select>
                    @error('categories')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="group">
                    <label for="price">Prix</label>
                    <input type="number" id="price" name="price" disabled value="{{ old('price') }}">
                    @error('price')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="group">
                <label for="sizes">Taille(s)</label>
                    <select name="sizes" id="sizes" disabled value="{{ old('sizes') }}">
                        <option value="S">S / 46-47</option>
                        <option value="M">M / 48-50</option>
                        <option value="L">L / 48-53</option>
                        <option value="XL">XL / 58-60</option>
                    </select>
                    @error('sizes')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
            </div>
            <div class="group">


            <label for="distinctive_sign">Signe distinctif</label>
            <input type="text" name="distinctive_sign" id="distinctive_sign" disabled value="{{ old('distinctive_sign') }}">
            @error('distinctive_sign')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

            <input id="submit" type="submit" value="Ajouter">
            </div>
        </form>
    </div>
    <script src="{{ asset('js/addProductCtrl.js')}}" type="text/javascript" defer></script>
</body>
@endsection
