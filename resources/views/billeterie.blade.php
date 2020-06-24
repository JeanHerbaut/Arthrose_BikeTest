@extends('templateBilleterie')

@section('main')
<div class="step">
    <h2>Plage horaire</h2>
    <p>Suivant: Informations</p>
</div>
<form action="/" id="schedule" method="GET">
    <section id="choix-plage">
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
        <div class="nav">
            <div class="button"><span>Retour</span></div>
            <div class="button">Suivant<span></span></div>
        </div>
    </section>

    <section id="identity">
        <div class="description">
            <p>Veuillez remplir vos informations personnelles</p>
        </div>
        <div class="full-input">
            <label for="name" class="form-control-label">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="full-input">
            <label for="name" class="form-control-label">Fistname</label>
            <input type="text" name="firstname" id="firstname" class="form-control">
        </div>
        <div class="full-input">
            <label for="email" class="form-control-label">Email</label>
            <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="full-input">
            <label for="phone" class="form-control-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
    </section>

    <section id="user-register">
        <div class="description">
            <p>Veuillez choisir un nom d’utilisateur ainsi qu’un mot de passe</p>
            <p>Attention : vous aurez besoin de ces informations pendant l’événement </p>
        </div>
        <div class="full-input">
            <label for="username" class="form-control-label">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>
        <div class="full-input">
            <label for="password" class="form-control-label">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
    </section>
    <input type="submit" value="Envoyer">
</form>
@endsection