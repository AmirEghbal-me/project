<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TermPresentedCourse extends Model
{
    protected $table = 'term_presented_courses';
    protected $primaryKey = 'university_course_id';
    protected $fillable = ['term_course_id','university_course_id','term_number','teacher_id','session1_time','session2_time','session2_type','course_code'];
    public $timestamps = false;

    public function UniversityCourse()
    {
        return $this->belongsTo(UniversityCourse::class,'university_course_id');
    }
}
