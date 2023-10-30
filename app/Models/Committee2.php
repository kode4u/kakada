<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee2 extends Model
{
    use HasFactory;
    protected $table_name = 'committees2';
    use HasFactory;
    protected $fillable = [
        'name',
        'dob',
        'commission_name',
        'head_name',
        'school',
        'exam_center',
        'province'
    ];
}
