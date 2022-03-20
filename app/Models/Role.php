<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function board_users() {
        return $this->belongsToMany(User::class, 'board_users', 'board_role_id');
    }
    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id');
    }
}
