@extends('layouts.template')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/adminConsultation.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<div class="title">
    <h2>Gestion des utilisateurs</h2>
</div>

<div class="filtersearch">
    <div class="search">
        <input type="text" name="search" id="search" placeholder="Rechercher" class="round">
    </div>
    <div class="filter">
        <div class="custom-select" style="width:250px;">
            <select name="person" id="person-select">
                <option value="">Type d'utilisateurs</option>
                <option value="">Tous</option>
                <option value="exhibitor">Exposants</option>
                <option value="visitor">Visiteurs</option>
            </select>
        </div>
        <div class="custom-select" style="width:200px;">
            <select name="schedule" id="schedule-select">
                <option value="">Billet</option>
                <option value="">Tous</option>
                @foreach ($testSchedules as $testSchedule)
                <option value="{{$testSchedule->id}}">
                    {{$testSchedule->startTime->format('d.m H:i'). " : " . $testSchedule->endTime->format('H:i')}}</option>
                @endforeach
            </select>
        </div>
        <input type="button" value="Filtrer" id="search-username">
        <input type="button" value="Reset" id="reset-filter" style="display: none">
    </div>
</div>
<div class="list-user">
    <table id="list-user" class="content-table">
        <thead>
        <tr>
            <th>Nom d'utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th style="min-width: 150px;">Billet</th>
            <th>Exposant</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
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
                <td style="min-width: 150px;">{{$user->testSchedules[0]->startTime->format('d.m H:i')}} - {{$user->testSchedules[0]->endTime->format('H:i')}}</td>
            @else
                <td> - </td>
            @endif
            @if($user->company)
                <td>{{$user->company->name}}</td>
            @else
                <td> - </td>
            @endif
            <td class="btn-list"><a href={{url('admin/modify-user?user_id=')}}{{$user->id}}"><i class="fas fa-pen-square"></i></a></td>
            <td class="btn-list"><a><i class="fas fa-trash"></i></a></td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
<script src="{{ asset('js/adminFilter.js')}}" type="text/javascript" defer></script>
<script src="{{ asset('js/dropdown.js')}}" type="text/javascript" defer></script>
<script>

</script>

@endsection