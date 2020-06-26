<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'name';
    public $incrementing = false;
    protected $fillable = ['name'];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
