<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BoardController;
use App\Models\Board;
use App\Models\board_users;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Board_UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Board $board)
    {

        return view('board.users.list', ['board' => $board]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Board $board, Request $request)
    {
       $emailcheck = User::where('email', '=', $request->email)->exists();

      if (!$request->email || $emailcheck === false) {
          return redirect()->back(); // WITH ERROR
      }

        $id = User::where('email', $request->email)->first()->id;
        $board = Board::where('id', $board->id)->first();
        $userboard = User::find($id)->board->find($board->id);

        if($userboard === null && $board->type == 'team') {
            $board->board_users()->attach('board_id', array('user_id' => $id,'board_role_id' => 1));
        } elseif(!$board->id) {
            return redirect('/boards');
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



        $roleid = board_users::where('user_id', $user->id)->first()->board_role_id;


       if (Auth::user()->id != $user->id && $roleid != 99) {
           $board->board_users()->wherePivot('user_id', '=', $user->id)->detach();
       }
        return redirect('/boards/' . $board->id);
    }
}
