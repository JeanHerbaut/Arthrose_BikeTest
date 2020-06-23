<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vtt extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'bike_id',
        //à compléter
    ];
    
    public function bike(){
        return $this->hasOne(Bike::class);
    }
}
