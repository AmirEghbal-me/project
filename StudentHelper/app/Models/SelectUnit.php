<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectUnit extends Model
{
    public $table ='select_units';
    protected $primaryKey ='student_id';
    protected $fillable =['course_register_id','student_id','university_course_id'];
    public $timestamps = false;
}
