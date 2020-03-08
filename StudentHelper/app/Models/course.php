<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    protected $table = 'course';
    protected $primaryKey = 'course_code';
    protected $fillable = ['course_code','name','unit','type','presentation_type','field'];

    public function universities()
    {
        return $this->belongsToMany(university::class,'university_courses','course_code','university_id');
    }
}
