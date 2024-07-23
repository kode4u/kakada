<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    use HasFactory;
    protected $table_name = 'table_check';
    protected $fillable=[
        'correct',
        'student_id',
        'user_id',
        'category_id'
    ];
}
