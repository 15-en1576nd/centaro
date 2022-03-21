<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardSavingTarget extends Model
{
    use HasFactory;
    protected $fillable = [
        'board_id',
        'color_id',
        'board_user_id',
        'name',
        'description',
        'value',
        'status',
        'deadline',
        ];

    public function board() {
       return $this->belongsTo(Board::class, 'board_id');
    }
    public function color() {
       return $this->belongsTo(Color::class, 'color_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
