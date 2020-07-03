<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function tests() {
        return $this->belongsToMany(Test::class)->withPivot('note');
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
