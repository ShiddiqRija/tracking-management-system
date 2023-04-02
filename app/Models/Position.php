<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'device_id',
        'location',
        'server_time',
        'device_time',
        'attributes',
        'network',
        'created_at',
        'updated_at',
    ];
}
