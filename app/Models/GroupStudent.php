<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupStudent extends Model
{
    use HasFactory;

    public function group(){
        return $this->belongsTo('App\Models\Group');
    }

    public function Student(){
        return $this->belongsTo('App\Models\Student');
    }
}
