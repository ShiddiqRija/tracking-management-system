<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'device_id',
        'unique_id',
        'message',
        'send_time',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
