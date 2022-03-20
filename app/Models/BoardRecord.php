<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardRecord extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'value',
        'title',
        'description',
        'board_id',
        'user_id',
        'category_id',
        'attachment',
    ];
    public function board() {
        return $this->hasOne(Board::class, 'id', 'board_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function category() {
        return $this->hasOne(BoardCategory::class, 'id', 'category_id');
    }
}
