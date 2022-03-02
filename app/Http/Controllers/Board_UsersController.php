<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BoardController;
use App\Models\board;
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
    public function index()
    {
        //
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
    public function store(Request $request)
    {
      $email = $request->email;
        if($email) {
            $currentboardid = Session::get('currentboardid');
           $id = User::where('email', $email)->first()->id;
            $board = board::where('id', $currentboardid)->first();

            $board->board_users()->attach('board_id', array('user_id' => $id,'board_role_id' => 1));
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
    public function destroy($id)
    {
        $currentboardid = Session::get('currentboardid');

        $board = board::where('id', $currentboardid)->first();
        $roleid = board_users::where('user_id', $id)->first()->board_role_id;


       if (Auth::user()->id != $id && $roleid != 99) {
           $board->board_users()->wherePivot('user_id', '=', $id)->detach();
       }
        return redirect()->back();
    }
}
