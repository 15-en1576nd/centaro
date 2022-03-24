<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function users() {
        return $this->belongsToMany(User::class, 'board_user_roles', 'role_id');
    }
    public function color() {
        return $this->belongsTo(Color::class, 'color_id');
    }


}
