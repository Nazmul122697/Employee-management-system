<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ship_divisions extends Model
{
    use HasFactory;
    protected $fillable = [
        'division_name',
        'bn_name',
        'url',
    ];
}
