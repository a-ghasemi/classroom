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
}
