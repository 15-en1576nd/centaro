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
        'savingtarget_id',
        'hidden',
    ];
    public function board() {
        return $this->hasOne(Board::class, 'id', 'board_id');
    }
    public function user() { //Get author of record
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function category() { //Get category of record
        return $this->hasOne(BoardCategory::class, 'id', 'category_id');
    }
}
