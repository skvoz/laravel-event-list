<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomEvent extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name', 'description',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'custom_events_user', 'custom_event_id', 'user_id');
    }
}
