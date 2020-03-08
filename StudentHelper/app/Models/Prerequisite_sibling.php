<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prerequisite_sibling extends Model
{
    protected $primaryKey = 'course_code';
    protected $fillable = ['course_code','course_siblings','course_prerequisite'];
    public $timestamps = false;
}
