<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Functionality extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $fillable = ['name'];

    public function roles() {
        return $this->belongsToMany(Role::class);
    }
}
