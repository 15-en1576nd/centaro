<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
public $timestamps = false;

    public function users() { //Get all users from role
        return $this->belongsToMany(User::class, 'board_user_roles', 'role_id');
    }


}
