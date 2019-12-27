<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsentPresent extends Model
{
    protected $fillable = ['student_id', 'checkdate', 'present'];

    protected $casts = ['checkdate' => 'date', 'present' => 'boolean'];

    public function student(){
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function setCheckdateAttribute($value){
        $this->attributes['checkdate'] = trim(substr($value,0,10));
    }
}
