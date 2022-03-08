<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class color extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'secondaryhexcode',
        'hexcode',
        'name',
    ];
}
