<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bike extends Model
{
    protected $fillable = [
        'product_id', 'size',
        //à compléter après sondage
    ];

    public function product() {
        return $this->hasOne(Product::class);
    }

    public function ebike() {
        return $this->hasOne(Ebike::class);
    }

    public function vtt() {
        return $this->hasOne(Vtt::class);
    }
}
