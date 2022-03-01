<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function view() {
    dd(Auth::user()->board->board_users());
        return view('dashboard', ['']);
    }
}
