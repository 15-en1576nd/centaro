<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BoardController;
use App\Http\Requests\StoreBoardUserRequest;
use App\Models\Board;
use App\Models\BoardUserRole;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class BoardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Board $board)
    {

        return view('board.users.list', ['board' => $board, 'roles' => Role::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Board $board)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBoardUserRequest $request, Board $board)
    {
        $emailcheck = User::where('email', '=', $request->email)->exists(); //Checks if email has account

        if (!$request->email || $emailcheck === false) { //If account doesnt exist
            return redirect()->back(); // WITH ERROR
        }

        $id = User::where('email', $request->email)->first()->id;
        $userboard = User::find($id)->boards->find($board->id);

        if($userboard === null && $board->type == 'team') { //Check if board type accept multiple users & User not already in board
            $board->users()->attach('board_id', array('user_id' => $id,'role_id' => $request->role));
        } elseif(!$board->id) {
            return redirect('/dashboard/boards');
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board, User $user)
    {



        $role = $board->users->find($user)->role->first; //Get role name of user


        if (Auth::user()->id != $user->id && $role != 'admin') { //Check if user doesnt delete it self

            $board->users()->wherePivot('user_id', '=', $user->id)->detach();
        }
        return redirect('/dashboard/boards/' . $board->id . '/users');
    }
}
