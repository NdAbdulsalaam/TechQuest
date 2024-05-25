<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'staff_id',
        'date',
        'check_in_time',
        'check_out_time',
    ];

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
