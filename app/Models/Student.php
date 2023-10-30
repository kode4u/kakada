<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table_name = 'students';
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'gender',
        'dob',
        'class',
        'school',
        'exam_center',
        'language',
        'room_no',
        'table_no',
        'province'
    ];
}
