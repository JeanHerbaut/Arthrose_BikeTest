<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vtt extends Model
{
    protected $fillable = [
        //à compléter
    ];
    
    public function bike(){
        return $this->hasOne(Bike::class);
    }
}
