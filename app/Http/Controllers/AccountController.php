<?php

namespace App\Http\Controllers;
use App\Models\board;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

    public function view() {



        return view('dashboard', ['']);
    }
}
