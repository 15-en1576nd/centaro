<?php

namespace App\Http\Controllers;

use App\Models\board;
use App\Models\board_users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        return view('board.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('board.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $type = $request->type;
        if (!$name || !$type) {
            return redirect()->back();
        }
        $board = new board();
        $board->name = $name;
        $board->type = $type;
        $board->save();
        $board->board_users()->attach('board_id', array('user_id' => Auth::user()->id,'board_role_id' => 99));
         $latestboard = board::latest()->first();
         $id = $latestboard->id;

        return redirect('/board/' . $id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $boards = board::where('id', $id)->get(); //Select board  from url-parameter.
        foreach ($boards as $board) {
            $board; //Split search-result in single array (This was made because many to many result).
            }

        return view('board.view', ['board' => $board]);
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
        $board = board::find($id);
        $board->delete();
        return redirect('/board');
    }


}
