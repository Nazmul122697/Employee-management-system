<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ship_states extends Model
{
    use HasFactory;

    protected $fillable = [
        'state_name',
        'bn_name',
        'url',
        'district_id',
        'division_id',
    ];

    public function ship_districts()
    {
        return $this->belongsTo(ship_districts::class,'district_id');
    }
}
