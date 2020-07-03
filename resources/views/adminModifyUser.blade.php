@extends('layouts.template')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/adminModifyUser.css') }}">
    <div class="wrapper">
        <div class="formContent">
            <form action="{{url('/admin/modify-user')}}" method="post" class="form">
                @csrf
                <div class="group">
                    <label for="username" class="Input-label">Nom d'utlisateur</label>
                    <input type="text"  class="Input-text" id="username" name="username" value="{{$user->username}}" disabled>
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="nameField">
                    <div class="group">
                        <label for="firstname">Prénom</label>
                        <input type="text" id="firstname" name="firstname" value="{{$user->person->firstname}}" disabled>
                        @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="group">
                        <label for="name">Nom</label>
                        <input type="text" id="name" name="name" value="{{$user->person->name}}" disabled>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="group">
                    <label for="email">Adresse Email</label>
                    <input type="text" id="email" name="email" value="{{$user->email}}" disabled>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div>
                    <!-- <button id="reset">Réinitaliser mot de passe</button> -->
                    <div class="group">
                        <label for="role">Role</label>
                        <div class="custom-select" style="width:250px;">
                            <select name="role" id="role" autocomplete="off" disabled>
                                    <option value="visitor" {{ ($user->roles[0] == 'visitor') ? "selected" : "" }}>Visiteur</option>
                                    <option value="exhibitor" {{ ($user->roles[0] == 'exhibitor') ? "selected" : "" }}>Exposant</option>
                                    <option value="admin" {{ ($user->roles[0] == 'admin') ? "selected" : "" }}>Administrateur</option>
                                    <option value="receptionist" {{ ($user->roles[0] == 'receptionist') ? "selected" : "" }}>Réceptioniste</option>
                            </select>
                        </div>
                    </div>
                    <div class="group">
                        <label for="company">Companie</label>
                        <div id="companySection" class="{{ ($user->roles[0] == 'exhibitor') ? '' : 'hidden' }}" >
                            <div class="custom-select" style="width:250px;">
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
                        </div>
                    </div>
                    <div class="group">
                        <label for="testSchedule">Billet</label>
                        <div id="testScheduleSection" class="{{ ($user->roles[0] == 'visitor') ? '' : 'hidden' }}" >
                            <div class="custom-select" style="width:250px;">
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
                        </div>
                    <div>
                    <input type="hidden" name="id" id="id" value="{{$user->id}}">
                    <button id="cancel" hidden>Annuler</button>
                    <input id="submit" type="submit" value="Confirmer" hidden>
                </div>
            </form>
            <button id="modify">Modifier cet utilisateur</button>
        </div>
    </div>
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
                    sect_company.style.display = "none"
                    sect_testSched.style.display = "flex"
                } else if (role_select.value == "visitor"){
                    sect_company.style.display = "none"
                    sect_testSched.style.display = "flex"
                } else {
                    sect_company.style.display = "none"
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
    <script src="{{ asset('js/dropdown.js')}}" type="text/javascript" defer></script>
@endsection