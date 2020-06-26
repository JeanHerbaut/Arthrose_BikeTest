<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'modelNumber', 
        'shortDesc',
        'longDesc',
        'image', 
        'price', 
        'brand_id', 
        'category_name'
    ];

    public function editions() {
        return $this->belongsToMany(Edition::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }

    public function bike() {
        return $this->hasOne(Bike::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
    }

    public function isFavouriteOf() {
        return $this->belongsToMany(User::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
