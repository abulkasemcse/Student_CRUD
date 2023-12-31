<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'gender','email', 'mobile_phone', 'class', 'education_year','address', 'photo'
    ];
}
