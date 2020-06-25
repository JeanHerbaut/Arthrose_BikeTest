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
        <option value="">Billet</option>
        @foreach ($testSchedules as $testSchedule)
        <option value="{{$testSchedule->id}}">
            {{$testSchedule->day . " - " . $testSchedule->startTime. " : " . $testSchedule->endTime}}</option>
        @endforeach
    </select>
    <button id="search-username">Filtrer</button>
    <button id="reset-filter">Reset filter</button>
</div>
<div class="liste-user">
    <table id="list-user">
        @foreach ($users as $user)
        @foreach ($user->schedules as $schedule)
        @if ($user->company_id == null)
        <tr data-role="visiteur" data-username="{{$user->username}}" data-schedule-id="{{$schedule['id']}}" class="row">
            @else
        <tr data-role="exposant" data-username="{{$user->username}}" data-schedule-id="{{$schedule['id']}}" class="row">
            @endif
            <td>{{$user->username}}</td>
            <td>{{$user->firstname}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$schedule['schedule']}}</td>
            @if ($user->company_id == null)
            <td>-</td>
            @else
            <td>{{$user->company->name}}</td>
            @endif
            <td><a href="http://127.0.0.1:8000/admin/modify-user?user_id={{$user->id}}"><button>Modifier</button></a>
            </td>
            <td><button>Supprimer</button></td>
        </tr>
        @endforeach
        @endforeach
    </table>
</div>
@endsection

@section('script')
<script src="{{ asset('js/adminFilter.js')}}" type="text/javascript" defer></script>
@endsection