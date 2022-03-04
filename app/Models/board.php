<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
    ];
    public function board_users() {
        return $this->belongsToMany(User::class, 'board_users', 'board_id')->withPivot('board_role_id');
    }
    public function manual_record() {
        return $this->hasMany(board_manual_record::class, 'board_id', 'id');
    }
}
