<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leeve extends Model
{
    protected $fillable=[
        'employee_id',
        'name',
        'typeofleeve',
        'sdate',
        'edate',
        'reason',
        'status',
    ];
}
