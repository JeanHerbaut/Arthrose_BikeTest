<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bike extends Model
{
    use SoftDeletes;
    public $timestamps = false;
    
    protected $fillable = ['product_id', 'size', 'distinctive_sign'];

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
