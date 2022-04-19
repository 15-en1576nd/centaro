<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Board;
use App\Models\User;
use App\Models\BoardRecord;

class HomeController extends Controller
{
    public function index() {
        $boards = count(Board::all());
        $users = count(User::all());
        $records = count(BoardRecord::all());
        
        return view('index', compact('boards', 'users', 'records'));
    }
}
