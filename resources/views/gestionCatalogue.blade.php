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
            
        </div>
        <div id="catalogue">
        @foreach ($brands as $brand)
        <h2>{{$brand}}</h2>
        @endforeach
        </div>
    </main>
</body>
</html>