<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardCategory extends Model
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
    public function records() {
        return $this->hasMany(Record::class, 'category_id', 'id');
    }
}
