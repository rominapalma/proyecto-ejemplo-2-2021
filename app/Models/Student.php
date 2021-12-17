<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    public function groupstudent(){
        return $this->hasMany('App\Models\GroupStudent');
    }

    public function enrollment(){
        return $this->hasOne('App\Models\Enrollment');
    }
}
