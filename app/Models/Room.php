<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $fillable = [
        'student_name',
        'student_age',
        'student_id',
        'student_email',
        'student_username',
        'student_password',
        'student_department',
    ];
}
