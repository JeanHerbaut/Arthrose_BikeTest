@extends('layouts.template')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/testHistorique.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <div>
        <h2>Historique des tests</h2>
        <p class="nbr-result">{{$tests->count()}} Résultats</p>
    </div>
    <div class="list-test">
        <a href="{{url('/gestion-test')}}"><i class="fas fa-arrow-circle-left backarrow"></i></a>
        <table id="list-test" class="content-table">
            <thead>
            <tr>
                <th>Date</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Note</th>
                <th>Nom du vélo</th>
                <th>Nom d'utilisateur</th>
            </tr>

            </thead>
            <tbody>
            @foreach ($tests as $test)
                <tr>
                    <td>{{date('d.m.Y', strtotime($test->startTime))}}</td>
                    <td>{{date('H:i', strtotime($test->startTime))}}</td>
                    <td>{{($test->endTime) ? $test->endTime->format('H:i') : "en cours"}}</td>
                    <td>{{$test->rating}} @if($test->rating) ★ @endif</td>
                    <td>{{$test->product->shortDesc}}</td>
                    <td>{{$test->user->username}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/adminFilter.js')}}" type="text/javascript" defer></script>
@endsection