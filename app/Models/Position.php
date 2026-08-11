<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        "code",
        "name",
        "description",
        "level",
        "is_active"
    ];
}
