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
        'user_id',
        'name',
        'description',
        'value',
        'status',
        'deadline',
        'attachment',
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
    public function icon() {
        return $this->belongsTo(Icon::class, 'icon_id');
    }

}
