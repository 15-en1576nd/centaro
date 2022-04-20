<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoardSavingTarget extends Model
{
    use HasFactory;
    protected $fillable = [
        'board_id',
        'icon_id',
        'user_id',
        'name',
        'description',
        'value',
        'status',
        'deadline',
        'attachment',
        ];

    protected $casts = [
        'type_attributes' => 'array',
    ];

    public function board() {
       return $this->belongsTo(Board::class, 'board_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function icon() {
        return $this->belongsTo(Icon::class, 'icon_id');
    }
    public function records() {
        return $this->hasMany(BoardRecord::class, 'savingtarget_id');
    }

}
