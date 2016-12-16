<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomEventsUser extends Model
{
    public $timestamps = false;
    public $fillable = [
        'user_id', 'custom_event_id'
    ];

    protected $table = 'custom_events_user';
}
