@extends('layouts.template')

@section('content')
    <form action="/profil" method="post">
        @csrf
        <label for="username">Nom d'utlisateur</label>
        <input type="text" id="username" name="username" value="{{$user->username}}" disabled>

        @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="firstname">Prénom</label>
        <input type="text" id="firstname" name="firstname" value="{{$user->firstname}}" disabled>
        @error('firstname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" value="{{$user->name}}" disabled>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" value="{{$user->password}}" disabled>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="password-confirm">Mot de passe</label>
        <input type="password" id="password-confirm" name="password_confirmation" value="{{$user->password}}" required
            autocomplete="new-password" disabled>
        <input type="number" name="id" id="id" value="{{$user->id}}" hidden>
        <input id="submit" type="submit" value="Confirmer" hidden>
    </form>
    <button id="cancel" hidden>Annuler</button>
    <button id="modify">Modifier mes infos</button>
<script>
    const btn_modify = document.getElementById('modify')
    const btn_cancel = document.getElementById('cancel')   
    const btn_submit = document.getElementById('submit')
    btn_modify.addEventListener(
        "click", evt => {
            let inputs = document.getElementsByTagName("input")
            for (let index = 0; index < inputs.length; index++) {
                inputs[index].removeAttribute("disabled")
            }
            btn_cancel.removeAttribute('hidden')
            btn_modify.setAttribute('hidden', true)
            btn_submit.removeAttribute('hidden')
        }
    )

    btn_cancel.addEventListener(
        "click", evt => {
            let inputs = document.getElementsByTagName("input")
            for (let index = 0; index < inputs.length; index++) {
                inputs[index].setAttribute("disabled", true)
            }
            btn_modify.removeAttribute('hidden')
            btn_cancel.setAttribute('hidden', true)
            btn_submit.setAttribute('hidden', true)
        } 
    )
</script>

@endsection