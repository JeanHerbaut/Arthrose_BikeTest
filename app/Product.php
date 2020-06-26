<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    
    protected $fillable = [
        'modelNumber', 
        'shortDesc',
        'longDesc',
        'image', 
        'price', 
        'brand_id', 
        'category_id',
        'deleted_at',
    ];

    public function editions() {
        return $this->belongsToMany(Edition::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }

    public function bikes() {
        return $this->hasMany(Bike::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function isFavouriteOf() {
        return $this->belongsToMany(User::class);
    }
}
