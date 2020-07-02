@extends('layouts.template')
@section('content')
<div class="filter">
    <label for="search">Recherche</label>
    <input type="text" name="search" id="search">
    <select name="person" id="person-select">
        <option value="">Personne</option>
        <option value="exhibitor">Exposants</option>
        <option value="visitor">Visiteurs</option>
    </select>
    <select name="schedule" id="schedule-select">
        <option value="">Billet</option>
        @foreach ($testSchedules as $testSchedule)
        <option value="{{$testSchedule->id}}">
            {{$testSchedule->startTime->format('d.m H:i'). " : " . $testSchedule->endTime->format('d.m H:i')}}</option>
        @endforeach
    </select>
    <button id="search-username">Filtrer</button>
    <button id="reset-filter">Reset filter</button>
</div>
<div class="liste-user">
    <table id="list-user">
        <tr>
            <th>Nom d'utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th>Billet</th>
            <th>Exposant</th>
        </tr>
        @foreach ($users as $user)

            @if(sizeOf($user->testSchedules) > 0)
                <tr data-role="{{(sizeOf($user->roles)>0)?$user->roles[0]->name : ''}}" data-username="{{$user->username}}" data-schedule-id="{{$user->testSchedules[0]->id}}" class="row filterable">
            @else
                <tr data-role="{{(sizeOf($user->roles)>0)?$user->roles[0]->name : ''}}" data-username="{{$user->username}}" data-schedule-id="" class="row filterable">
            @endif
            <td>{{$user->username}}</td>
            <td>{{$user->person->name}}</td>
            <td>{{$user->person->firstname}}</td>
            <td>{{$user->email}}</td>
            @if(sizeOf($user->testSchedules) > 0)
                <td>{{$user->testSchedules[0]->startTime->format('d.m H:i')}} - {{$user->testSchedules[0]->endTime->format('d.m H:i')}}</td>
            @else
                <td> - </td>
            @endif
            @if($user->company)
                <td>{{$user->company->name}}</td>
            @else
                <td> - </td>
            @endif
            <td><a href="http://127.0.0.1:8000/admin/modify-user?user_id={{$user->id}}"><button>Modifier</button></a></td>
            <td><button>Supprimer</button></td>
            </tr>

        @endforeach
    </table>
</div>
<script src="{{ asset('js/adminFilter.js')}}" type="text/javascript" defer></script>
@endsection