<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'offi_staff_management';
    protected $fillable = [
        'first_name', 'last_name', 'gender', 'birthdate', 'phone_number', 'email', 'address', 'dept', 'role', 'office_time', 'em_start_date', 'experience_yr', 'profile_img',
        'sign', 'remark', 'kbz_bank_acc', 'kbz_pay', 'aya_bank', 'yoma_bank', 'wave_money_number', 'status',
    ];
}
