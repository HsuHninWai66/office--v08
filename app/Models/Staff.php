<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'gender', 'dept', 'role', 'office_time', 'em_start_date', 'experience_yr', 'profile_img',
        'sign', 'remark', 'status',
    ];
}
