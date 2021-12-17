<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    public function course(){
        return $this->belongsTo('App\Models\Course');
    }
    
    public function groupstudent(){
        return $this->hasMany('App\Models\GroupStudent');
    }
    
}
