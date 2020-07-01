<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestPolicy
{
    use HandlesAuthorization;

    public function __construct(){}

    public function manage(User $user){
        return in_array('manageTests', $user->roles->first()->functionalities->pluck('name')->toArray());
    }

    public function view(User $user){
        return in_array('viewTests', $user->roles->first()->functionalities->pluck('name')->toArray());
    }
}
