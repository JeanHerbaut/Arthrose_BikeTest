<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {}

    public function manageProducts(User $user){
        return in_array('manageProducts', $user->roles->first()->functionalities->pluck('name')->toArray());
    }
}
