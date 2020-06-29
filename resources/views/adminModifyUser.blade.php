@extends('templateAdmin')

@section('main')
    <form action="/gestion-utilisateurs" method="post">
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
        <label for="name">Adresse Email</label>
        <input type="text" id="name" name="name" value="{{$user->email}}" disabled>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" value="{{$user->password}}" disabled>
        <button id="reset">Réinitaliser</button>

        <label for="name">Exposant</label>
        <label class="switch" >
            <input type="checkbox" id="exposant" @if ($user->company_id == null) @else checked @endif onclick="showExposant()">
            <span class="slider"></span>
        </label>
        <select class="brand" id="brand" @if ($user->company_id == null) style="display:none" @else  @endif>
            @foreach ($brands as $brand)
                <option value="{{$brand->id}}" class="select" @if ($user->company_id == null) @else @if ($user->company->name == $brand->id)  @else selected @endif  @endif >{{$brand->name}}</option>
            @endforeach
        </select>
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
        );

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
        );

        function showExposant() {

            let checkBox = document.getElementById("exposant");
            let list = document.getElementById("brand");
            if (checkBox.checked === true){
                list.style.display = "block";
            } else {
                list.style.display = "none";
            }
        }
    </script>

