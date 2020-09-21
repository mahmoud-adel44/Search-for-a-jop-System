<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jop extends Model
{
    protected $fillable =[
        'status' , 'jop_title' , 'location' , 'company_id' , 'block'
    ];

    //job belogsTo company
    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}
