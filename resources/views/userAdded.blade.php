@extends('layouts.template')

@section('content')
<h1>Utilisateur crée avec succès</h1>
<table>
    <tr>
        <td>Nom</td>
        <td>{{$person->name}}</td>
    </tr>
    <tr>
        <td>Prénom</td>
        <td>{{$person->firstname}}</td>
    </tr>
    <tr>
        <td>Username</td>
        <td>{{$user->username}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$user->email}}</td>
    </tr>
</table>
<a href="{{url('/register')}}">Ajouter un autre utilisateur</a>
@endsection