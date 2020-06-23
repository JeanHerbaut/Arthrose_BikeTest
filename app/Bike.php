<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['product_id', 'size'];

    public function product() {
        return $this->hasOne(Product::class);
    }

    public function vtt() {
        return $this->hasOne(Vtt::class);
    }

    public function ebike() {
        return $this->hasOne(Ebike::class);
    }
}
