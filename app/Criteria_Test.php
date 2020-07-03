<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Criteria_Test extends Model
{
    public $timestamps = false;
    protected $table = 'criteria_test';

    protected $fillable = ['test_id', 'criteria_id', 'note'];

    public function criteria() {
        return $this->belongsTo(Criteria::class);
    }

    public function test() {
        return $this->belongsTo(Test::class);
    }
}
