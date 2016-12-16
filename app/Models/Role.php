<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kodeine\Acl\Traits\HasRole;

class Role extends Model
{
    use HasRole;

    public function users()
    {
        return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id');
    }
}
