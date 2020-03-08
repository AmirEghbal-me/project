<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class university extends Model
{
    protected $table = 'university';
    protected $primaryKey = 'university_id';
    protected $fillable = ['university_id','name','address','url','phone_number'];
    /*protected $guarded = ['university_id'];*/
    public function courses()
    {
        return $this->belongsToMany(course::class,'university_courses','university_id','course_code');
    }

    public function uniCourses()
    {
        return $this->hasMany(UniversityCourse::class,'university_id');
    }
}
