<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

        // Explicitly specify the table name
    protected $table = 'staffs';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'role',
        'office',
        'age',
        'salary',
    ];
}
