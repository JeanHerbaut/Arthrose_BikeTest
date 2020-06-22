<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function editions() {
        return $this->belongsToMany(Editions::class);
    }
}
