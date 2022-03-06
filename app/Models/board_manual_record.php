<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board_manual_record extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'value',
        'title',
        'discription',
        'board_id',
        'user_id',
        'category_id',
        'attachment',
    ];
    public function board() {
        return $this->hasOne(board::class, 'id', 'board_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function category() {
        return $this->hasOne(board_economic_category::class, 'id', 'category_id');
    }
}
