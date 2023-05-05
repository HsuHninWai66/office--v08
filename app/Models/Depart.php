<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depart extends Model
{
    use HasFactory;
    protected $table = 'offi_departments';

    protected $fillable = [
        'name', 'remark'
    ];

    public function department()
    {
        return $this->belongsTo(Depart::class, 'dept_id', 'id');
    }
}
