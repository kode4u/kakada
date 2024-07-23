<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'check_id',
        'name'
    ];
}
