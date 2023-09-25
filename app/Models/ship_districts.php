<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ship_districts extends Model
{
    use HasFactory;
    protected $fillable = [
        'district_name',
        'division_id',
        'bn_name',
        'url',
    ];

    public function ship_divisions()
    {
        return $this->belongsTo(ship_divisions::class,'division_id');
    }
}
