<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckCategory extends Model
{
    use HasFactory;
    protected $table_name = 'table_check_category';
    protected $fillable = [
        'check_id',
        'name'
    ];
}
