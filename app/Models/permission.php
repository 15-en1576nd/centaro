<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permission extends Model
{
    use HasFactory;
    public function permission() {
        return $this->belongsToMany(role::class, 'permission_role', 'permission_id');
    }
}
