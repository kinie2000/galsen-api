<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'notif_email',
        'notif_mobile',
        'notif_sms',
        'notif_phone',
        'id_user',

    ];
}
