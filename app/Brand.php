<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'short_desc', 'company_id'];

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function products() {
        return $this->hasMany(Product::class);
    }
}
