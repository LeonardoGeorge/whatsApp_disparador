<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendLog extends Model
{
    use HasFactory;
    protected $fillable = [
        'campaign_id',
        'contact_id',
        'message_id',
        'status',
        'error'
    ];
}
