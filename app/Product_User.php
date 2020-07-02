<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_User extends Model
{
    public $timestamps = false;
    protected $table = 'product_user';

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
