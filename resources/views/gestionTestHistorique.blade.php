@extends('layouts.template')

@section('content')
    <div class="filter">
        <label for="search">Recherche</label>
        <input type="text" name="search" id="search">
        <p>{{$tests->count()}} Résultats</p>
    </div>
    <div class="list-test">
        <table id="list-test">
            <tr>
                <th>Date</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Note</th>
                <th>Nom du vélo</th>
                <th>Nom d'utilisateur</th>
            </tr>
            @foreach ($tests as $test)
                <tr>
                    <td>{{date('d-m-Y', strtotime($test->startTime))}}</td>
                    <td>{{date('H:i', strtotime($test->startTime))}}</td>
                    <td>{{date('H:i', strtotime($test->endTime))}}</td>
                    <td>{{$test->rating}}</td>
                    <td>{{$test->shortDesc}}</td>
                    <td>{{$test->username}}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/adminFilter.js')}}" type="text/javascript" defer></script>
@endsection