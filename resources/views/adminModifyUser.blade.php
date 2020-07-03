@extends('layouts.template')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/adminModifyUser.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<link defer rel="stylesheet" type="text/css" href="{{ asset('css/modifyUser.css') }}">
<form action="/admin/modify-user" method="post">
    @csrf
    <label for="username">Nom d'utlisateur</label>
    <input type="text" id="username" name="username" value="{{$user->username}}" disabled>

    @error('username')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="firstname">Prénom</label>
    <input type="text" id="firstname" name="firstname" value="{{$user->person->firstname}}" disabled>
    @error('firstname')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="name">Nom</label>
    <input type="text" id="name" name="name" value="{{$user->person->name}}" disabled>
    @error('name')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="email">Adresse Email</label>
    <input type="text" id="email" name="email" value="{{$user->email}}" disabled>
    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <!-- <button id="reset">Réinitaliser mot de passe</button> -->

    <label for="role">Role</label>

    <select name="role" id="role" autocomplete="off" disabled>
        @if(!isset($user->roles[0])) <option value="aucun" >Aucun</option> @endif
        <option value="visitor" {{ (isset($user->roles[0])) ? ($user->roles[0] == 'visitor') ? "selected" : "" : ""}}>Visiteur</option>
        <option value="exhibitor" {{ (isset($user->roles[0])) ? ($user->roles[0] == 'exhibitor') ? "selected" : "" : ""}}>Exposant</option>
        <option value="admin" {{ (isset($user->roles[0])) ? ($user->roles[0] == 'admin') ? "selected" : "" : ""}}>Administrateur</option>
        <option value="receptionist" {{ (isset($user->roles[0])) ? ($user->roles[0] == 'receptionist') ? "selected" : "" : ""}}>Réceptioniste</option>
    </select>
    @error('role')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror

    <div id="companySection" class="{{ (isset($user->roles[0])) ? ($user->roles[0] == 'exhibitor') ? '' : 'hidden' : 'hidden'}}" >
        <label for="company">Companie</label>
        <select name="company" id="company" autocomplete="off" disabled>
            @foreach($companies as $company)
                @if(in_array('exhibitor', $user->roles))
                    <option value="{{$company->id}}" {{ ($user->company->id == $company->id) ? "selected" : "" }}>{{$company->name}}</option>
                @else
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div id="testScheduleSection" class="{{ (isset($user->roles[0])) ? ($user->roles[0] == 'visitor') ? '' : 'hidden' : 'hidden' }}" >
        <label for="testSchedule">Billet</label>
        <select name="testSchedule" id="testSchedule" autocomplete="off" disabled>
            @foreach($testSchedules as $schedule)
                @if(in_array('visitor', $user->roles))
                    <option value="{{$schedule->id}}" {{ ($user->testSchedules[0]->id == $schedule->id) ? "selected" : "" }}>{{$schedule->startTime->format('d.m H:i')}} - {{$schedule->endTime->format('d.m H:i')}}</option>
                @else
                <option value="{{$schedule->id}}" >{{$schedule->startTime->format('d.m H:i')}} - {{$schedule->endTime->format('d.m H:i')}}</option>
                @endif
            @endforeach
        </select>
    </div>

    <input type="hidden" name="id" id="id" value="{{$user->id}}">
    <input id="submit" type="submit" value="Confirmer" hidden>
</form>
<button id="cancel" hidden>Annuler</button>
<button id="modify">Modifier cet utilisateur</button>
<script>
    const btn_modify = document.getElementById('modify')
    const btn_cancel = document.getElementById('cancel')
    const btn_submit = document.getElementById('submit')
    const sect_testSched = document.getElementById('testScheduleSection')
    const sect_company = document.getElementById('companySection')
    const role_select = document.getElementById('role')

    role_select.addEventListener(
        "change", evt => {
            if(role_select.value == "exhibitor"){
                sect_company.classList.remove("hidden")
                sect_testSched.classList.add("hidden")
            } else if (role_select.value == "visitor"){
                sect_company.classList.add("hidden")
                sect_testSched.classList.remove("hidden")
            } else {
                sect_company.classList.add("hidden")
                sect_testSched.classList.add("hidden")
            }
        }
    )

    btn_modify.addEventListener(
        "click", evt => {
            let inputs = document.getElementsByTagName("input")
            let selects = document.getElementsByTagName("select")
            for (let index = 0; index < inputs.length; index++) {
                if (inputs[index].name != 'password') inputs[index].removeAttribute("disabled")
            }
            for (let index = 0; index < selects.length; index++) {
                if (selects[index].name != 'password') selects[index].removeAttribute("disabled")
            }
            btn_cancel.removeAttribute('hidden')
            btn_modify.setAttribute('hidden', true)
            btn_submit.removeAttribute('hidden')
        }
    );

    btn_cancel.addEventListener(
        "click", evt => {
            let inputs = document.getElementsByTagName("input")
            let selects = document.getElementsByTagName("select")
            for (let index = 0; index < inputs.length; index++) {
                inputs[index].setAttribute("disabled", true)
            }
            for (let index = 0; index < selects.length; index++) {
                selects[index].setAttribute("disabled", true)
            }
            btn_modify.removeAttribute('hidden')
            btn_cancel.setAttribute('hidden', true)
            btn_submit.setAttribute('hidden', true)
        }
    );
</script>
@endsection