@extends('templateBilleterie')

@section('main')
<form action="/" id="schedule" method="GET">
<div id="choix-plage">
    <div class="step">
    <h2>Plage horaire</h2>
    <p>Suivant: Informations</p>
</div>
<div class="description">
    <p>Veuillez sélectionner une seule plage horaire pour l’édition 2020</p>
    <p>Attention : vous ne pouvez sélectionner qu’une seule plage horaire.</p>
</div>
        <div class="opt-plage">
            <h3>Vendredi jj/mm</h3>
            <input type="radio" name="plage" id="ve1">
            <label for="ve1">10:00 - 14:00</label>
            <input type="radio" name="plage" id="ve2">
            <label for="ve2">14:00 - 18:00</label>
        </div>
        <div class="opt-plage">
            <h3>Samedi jj/mm</h3>
            <input type="radio" name="plage" id="sa1">
            <label for="sa1">10:00 - 14:00</label>
            <input type="radio" name="plage" id="sa2">
            <label for="sa2">14:00 - 18:00</label>
        </div>
        <div class="opt-plage">
            <h3>Dimanche jj/mm</h3>
            <input type="radio" name="plage" id="di1">
            <label for="di1">10:00 - 14:00</label>
            <input type="radio" name="plage" id="di2">
            <label for="di2">14:00 - 18:00</label>
        </div>    
</div>

<div id="identity">
    <label for="name">Name</label>
    <input type="text" name="name" id="name">
    <label for="name">Fistname</label>
    <input type="text" name="firstname" id="firstname">
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
    <label for="phone">Phone</label>
    <input type="text" name="phone" id="phone">
</div>

<div id="user-register">
    <label for="username">Username</label>
    <input type="text" name="username" id="username">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
</div>
<input type="submit" value="Envoyer">
</form>
@endsection