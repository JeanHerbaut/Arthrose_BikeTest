@extends('layouts.template')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('css/adminConsultation.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
<div class="title">
    <h2>Gestion des utilisateurs</h2>
</div>

<div class="filtersearch">
    <div class="search">
        <input type="text" name="search" id="search" placeholder="Rechercher" class="round">
    </div>
    <div class="filter">
        <div class="custom-select" style="width:250px;">
            <select name="person" id="person-select">
                <option value="">Type d'utilisateurs</option>
                <option value="">Tous</option>
                <option value="exhibitor">Exposants</option>
                <option value="visitor">Visiteurs</option>
            </select>
        </div>
        <div class="custom-select" style="width:200px;">
            <select name="schedule" id="schedule-select">
                <option value="">Billet</option>
                <option value="">Tous</option>
                @foreach ($testSchedules as $testSchedule)
                <option value="{{$testSchedule->id}}">
                    {{$testSchedule->startTime->format('d.m H:i'). " : " . $testSchedule->endTime->format('H:i')}}</option>
                @endforeach
            </select>
        </div>
        <input type="button" value="Filtrer" id="search-username">
        <input type="button" value="Reset" id="reset-filter" style="display: none">
    </div>
</div>
<div class="list-user">
    <table id="list-user" class="content-table">
        <thead>
        <tr>
            <th>Nom d'utilisateur</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Email</th>
            <th style="min-width: 150px;">Billet</th>
            <th>Exposant</th>
            <th>Modifier</th>
            <th>Supprimer</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
        @if(sizeOf($user->roles) > 0)

            @if(sizeOf($user->testSchedules) > 0)
                <tr data-role="{{$user->roles[0]->name}}" data-username="{{$user->username}}" data-schedule-id="{{$user->testSchedules[0]->id}}" class="row filterable">
            @else
                <tr data-role="{{$user->roles[0]->name}}" data-username="{{$user->username}}" data-schedule-id="" class="row filterable">
            @endif
            <td>{{$user->username}}</td>
            <td>{{$user->person->name}}</td>
            <td>{{$user->person->firstname}}</td>
            <td>{{$user->email}}</td>
            @if(sizeOf($user->testSchedules) > 0)
                <td style="min-width: 150px;">{{$user->testSchedules[0]->startTime->format('d.m H:i')}} - {{$user->testSchedules[0]->endTime->format('H:i')}}</td>
            @else
                <td> - </td>
            @endif
            @if($user->company)
                <td>{{$user->company->name}}</td>
            @else
                <td> - </td>
            @endif
            <td class="btn-list"><a href="http://127.0.0.1:8000/admin/modify-user?user_id={{$user->id}}"><i class="fas fa-pen-square"></i></a></td>
            <td class="btn-list"><a><i class="fas fa-trash"></i></a></td>
            </tr>

        @endif
        @endforeach
        </tbody>
    </table>
</div>
<script src="{{ asset('js/adminFilter.js')}}" type="text/javascript" defer></script>
<script>
    var x, i, j, l, ll, selElmnt, a, b, c;
    /* Look for any elements with the class "custom-select": */
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /* For each element, create a new DIV that will act as the selected item: */
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /* For each element, create a new DIV that will contain the option list: */
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /* For each option in the original select element,
            create a new DIV that will act as an option item: */
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /* When an item is clicked, update the original select box,
                and the selected item: */
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /* When the select box is clicked, close any other select boxes,
            and open/close the current select box: */
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        /* A function that will close all select boxes in the document,
        except the current select box: */
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }

    /* If the user clicks anywhere outside the select box,
    then close all select boxes: */
    document.addEventListener("click", closeAllSelect);
</script>

@endsection