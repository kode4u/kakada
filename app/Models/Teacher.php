<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{

    protected $table_name = 'teachers';
    use HasFactory;
    protected $fillable = [
        'name',
        'gender',
        'dob',
        'class_type',
        'school',
        'exam_center',
        'language',
        'room_no',
        'table_no',
        'province'
    ];
}
