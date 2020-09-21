<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'coverLetter', 'title', 'location', 'city', 'condition', 'varified', 'user_id', 'img'
    ];
    //student belogsTo One of user

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //student hasMany resumes
    public function resumes()
    {
        return $this->hasMany('App\Resume');
    }
}
