<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board_economic_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'color_id',
        'board_id',
        'name',
    ];
    public function board() {
        return $this->hasOne(Board::class, 'board_id', 'id');
    }
    public function color() {
        return $this->hasOne(color::class, 'id', 'color_id');
    }
}
