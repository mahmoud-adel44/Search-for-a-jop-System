<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'location', 'city', 'user_id'
    ];
    //company belogsTo One of user

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //company hasMany jops
    public function jops()
    {
        return $this->hasMany('App\Jop');
    }
}
