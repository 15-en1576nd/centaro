<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use App\Models\preference;
use Illuminate\Support\Facades\Session;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'surname',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function preference() {
        return $this->hasOne(preference::class, 'user_id', 'id');
    }
    public function board() {
        return $this->belongsToMany(board::class, 'board_users', 'user_id');
    }

//    public function localrole() {
//
//        $userid = Auth::user()->id;
//       $boardid = Session::get('currentboardid');
//      $board = board::where('id', $boardid)->first();
//       $roleid = board_users::where('user_id', $userid)->where('board_id', $boardid)->first()->board_role_id;
//       $localrole = role::where('id', $roleid)->first();
//       if ($localrole != null) {
//           return $localrole;
//       } else {
//           return 'niks';
//       }
//
//    }
    public function role() {
        return $this->belongsTo(role::class, 'role_id', 'id');
    }



}
