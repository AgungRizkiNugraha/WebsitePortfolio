<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class experiences extends Model
{
    protected $fillable = [
        'position',
        'company',
        'start_date',
        'end_date',
        'description',
    ];
}
