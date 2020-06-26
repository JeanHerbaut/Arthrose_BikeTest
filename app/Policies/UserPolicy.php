<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function manage(User $user){
        return in_array('manageUsers', $user->roles->first()->functionalities->pluck('name')->toArray());
    }
}
