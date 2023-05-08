<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worksheet extends Model
{
   protected $fillable=[
            'employee_id',
            'date',
            'description',
            'stime',
           'etime',
   ];
}
