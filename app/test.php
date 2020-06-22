<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = [
        'startTime',
        'endTime', 
        'rating', 
        'likes', 
        'comment', 
        'testSchedule_id',
        'product_id',
        'user_id'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function testSchedule() {
        return $this->belongsTo(TestSchedule::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
