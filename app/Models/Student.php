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
        'candid',
        'name',
        'dob',
        'fathername',
        'mothername',
        'photo',
        'schoolid',
        'room',
        'seat',
        'kessgrade',
        'mathgrade',
        'biolgrade',
        'geoggrade',
        'histgrade',
        'morcivgrade',
        'chemgrade',
        'physgrade',
        'earthgrade',
        'lang_grade',
        'percentile',
        'letternumber',
        'pass',
        'grade',
        'program',
        'candtypecode',
        'examcenter',
        'provincek',
        'programkh',
        'genderl',
        'pprefixk',
        'provinceks',
        'schoolnamekh',
    ];
}
