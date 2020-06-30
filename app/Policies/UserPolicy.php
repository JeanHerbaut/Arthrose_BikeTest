<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function viewMyTicket(User $user){
        return in_array('viewMyTicket', $user->roles->first()->functionalities->pluck('name')->toArray());
    }

    public function manage(User $user){
        return in_array('manageUsers', $user->roles->first()->functionalities->pluck('name')->toArray());
    }

    public function manageExhibitor(User $user){
        return in_array('manageExhibitor', $user->roles->first()->functionalities->pluck('name')->toArray());
    }
}
