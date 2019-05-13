<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student_registration extends Model
{
    use SoftDeletes;
    protected $dates=['deleted_at'];
    
    protected $fillable = [
        'id',
        'name',
        'year_level',
        'email',
        'phone',
        'nrc',
        'dob',
        'pre_address',
        'per_address',
        'emergency_contact',
        'relationship',
        'emergency_address',
        'emergency_detail_address',
        'id_photo',
        'student_card',
        'high_school_name',
        'curricular_activities',
        'skill',
        'scholarship',
        'after_college_plan',
        'school_name',
        'accommodation',
        'paid',
        'month',
        'amount',
        'comment',
        'gender'
    ];
}
