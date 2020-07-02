<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'startTime',
        'endTime', 
        'rating', 
        'likes', 
        'comment', 
        'test_schedule_id',
        'bike_id',
        'product_id',
        'user_id'
    ];

    protected $dates = ['startTime', 'endTime'];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function testSchedule() {
        return $this->belongsTo(TestSchedule::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function bike() {
        return $this->belongsTo(Bike::class);
    }

    public function criterias() {
        return $this->belongsToMany(Criteria::class)->withPivot('note');
    }
}
