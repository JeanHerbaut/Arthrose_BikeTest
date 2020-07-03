<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_Criteria extends Model
{
    public $timestamps = false;
    protected $table = 'category_criteria';

    protected $fillable = ['category_name', 'criteria_id'];

    public function criteria() {
        return $this->belongsTo(Criteria::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
