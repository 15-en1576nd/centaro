<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;

    public function users() {
        return $this->belongsTo(User::class, 'role_id', 'id');
    }
    public function board_users() {
        return $this->belongsToMany(User::class, 'board_users', 'board_role_id');
    }
    public function permission() {
        return $this->belongsToMany(permission::class, 'permission_role', 'role_id');
    }
}
