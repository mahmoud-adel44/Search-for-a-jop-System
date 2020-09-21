<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{

    protected $fillable = [
        'is_default' , 'file_resume' , 'student_id' , 'file_name'
    ];

    //resume belongsTo one of student
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
    
}
