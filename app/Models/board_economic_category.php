<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board_economic_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'color',
        'board_id',
        'name',
    ];
    public function board() {
        return $this->hasOne(board::class, 'board_id', 'id');
    }
}
