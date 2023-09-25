<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HouseUserIndex extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'nid',
        'privious_home',
        'relation',
        'start_staying_date',
        'end_staying_date',
        'district_id',
        'main_person_ind',
        'status',
    ];
}
