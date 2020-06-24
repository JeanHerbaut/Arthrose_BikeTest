@extends('templateAdmin')
@section('main')
<div class="filter">
    <label for="search">Recherche</label>
    <input type="text" name="search" id="search">
    <select name="person" id="person-select">
        <option value="">Personne</option>
        <option value="exposant">Exposants</option>
        <option value="visiteur">Visiteurs</option>
    </select>
    <select name="schedule" id="schedule-select">
        <option value="">Personne</option>
        <option value="exposant">Exposants</option>
        <option value="visiteur">Visiteurs</option>
    </select>
</div>
<div class="liste-user">

</div>
<table>
    @foreach ($users as $user)
    <tr>
        <td>{{$user->username}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->company->name}}</td>
        <td><a href="http://127.0.0.1:8000/admin/modify-user?user_id={{$user->id}}"><button>Modifier</button></a></td>
        <td><button>Supprimer</button></td>
    </tr>
    @endforeach
</table>
@endsection