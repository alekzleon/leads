<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    protected $fillable = [
        'id',
        'plan_id',
        'user_id',
        'date',
    ];
}
