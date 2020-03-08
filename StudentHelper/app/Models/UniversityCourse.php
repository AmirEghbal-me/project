<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniversityCourse extends Model
{
    protected $table = 'university_courses';
    protected $primaryKey = 'course_code';

    public function universities()
    {
        return $this->belongsTo(university::class,'university_id');
    }

    public function TermPresentedCourse()
    {
        return $this->hasMany(TermPresentedCourse::class,'university_course_id');
    }
}
