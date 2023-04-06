<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'position';

    protected $fillable = [
        'position', 'dept_id', 'remark'
    ];

    public function positions()
    {
        return $this->hasMany(Position::class);
    }
}
