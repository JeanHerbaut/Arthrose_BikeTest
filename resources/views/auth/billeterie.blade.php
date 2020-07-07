@extends('layouts.template')

@section('content')
    <link defer rel="stylesheet" type="text/css" href="{{ asset('css/billeterie.css') }}">
    <div class="wrapper">


        <form id="regform" class="form-billeterie" method="post" action="{{url('/createUserWithTicket')}}" id="schedule">
            @csrf
            <div id="choix-plage" class="tab">
                <div class="header-billeterie">
                    <img src="{{ asset('img/etape1.png') }}" alt="">
                    <div class="infos-billeterie">
                        <h3>Plage horaire</h3>
                        <p>Suivant: Information</p>
                    </div>
                </div>

                <div class="description">
                    @if(!$errors->isEmpty())
                    <strong>Les valeurs entrées dans le formulaire contiennent des erreurs</strong>
                    @endif
                    <p>Veuillez sélectionner une plage horaire pour l’édition 2020</p>
                    <p><b>Attention : vous ne pouvez sélectionner qu’une seule plage horaire.</b></p>
                </div>

                @foreach($days as $day)
                    <div class="opt-plage">
                        <h3>{{$day[0]['day']}}</h3>
                        <div class="sameLine">
                            @foreach($day as $plage)
                                <input type="radio" name="plage" id="ve{{$plage['id']}}" value="{{$plage['id']}}">
                                <label for="ve{{$plage['id']}}" class="plage">{{date('H:i', strtotime($plage['startTime']))}} - {{date('H:i', strtotime($plage['endTime']))}}</label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                @error('plage')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>
            <div id="identity" class="tab">
                <div class="header-billeterie">
                    <img src="{{ asset('img/etape2.png') }}" alt="">
                    <div class="infos-billeterie">
                        <h3>Information</h3>
                        <p>Suivant: Nom utilisateur</p>
                    </div>
                </div>
                <div class="description">
                    <p>Veuillez remplir vos informations personnelles</p>
                </div>
                <div class="wrapper-form-billeterie">


                    <div class="group">
                        <label for="name" class="form-control-label">Nom</label>
                        <input type="text" name="name" id="name" class="form-control required" value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                    <div class="full-input group">
                        <label for="firstname" class="form-control-label">Prénom</label>
                        <input type="text" name="firstname" id="firstname" class="form-control required" value="{{ old('firstname') }}">
                    </div>
                    @error('firstname')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                    <div class="full-input group">
                        <label for="email" class="form-control-label">Email</label>
                        <input type="text" name="email" id="email" class="form-control required @error('email') is-invalid @enderror" value="{{ old('email') }}">
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                    <div class="full-input group">
                        <label for="phone" class="form-control-label">Numéro de téléphone</label>
                        <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>
            </div>

            <div id="user-register" class="tab">
                <div class="header-billeterie">
                    <img src="{{ asset('img/etape3.png') }}" alt="">
                    <div class="infos-billeterie">
                        <h3>Nom d'utilisateur</h3>
                        <p>Suivant: Paiement</p>
                    </div>
                </div>
                <div class="description">
                    <p>Veuillez choisir un nom d’utilisateur ainsi qu’un mot de passe</p>
                    <p>Attention : vous aurez besoin de ces informations pendant l’événement </p>
                </div>
                <div class="full-input group">
                    <label for="username" class="form-control-label">Nom d'utilisateur</label>
                    <input type="text" name="username" id="username" class="form-control required" value="{{ old('username') }}">
                </div>
                @error('username')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <div class="full-input group">
                    <label for="password" class="form-control-label required">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
                <div class="full-input group">
                    <label for="password-confirm" class="form-control-label required">Confirmez le mot de passe</label>
                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control">
                </div>
            </div>
            <div class="footer-billeterie">
                <div class="sameLine-2">
                    <button type="button" id="prevBtn" onclick="nextPrev(-1)">précedent</button>
                    <button type="button" id="nextBtn" onclick="nextPrev(1)">suivant</button>
                </div>

                <div style="text-align:center;" hidden>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
            </div>
        </form>
    </div>
    <script>
        let currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            let x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Confirmer";
            } else {
                document.getElementById("nextBtn").innerHTML = "Suivant";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            let x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("regform").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            let x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByClassName("required");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }

                console.log(y)

            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            let i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script>
@endsection
