<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
    ];
    public function users() {
        return $this->belongsToMany(User::class, 'board_users', 'board_id');
    }
    public function records() {
        return $this->hasMany(BoardRecord::class, 'board_id', 'id');
    }
    public function categories() {
        return $this->hasMany(BoardCategory::class, 'board_id', 'id');
    }
    public function savingtargets() {
        return $this->hasMany(BoardSavingTarget::class, 'board_id', 'id');
    }
}
