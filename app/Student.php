<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['fullname'];

    public function absentpresent(){
        return $this->hasMany(AbsentPresent::class, 'student_id');
    }
}
