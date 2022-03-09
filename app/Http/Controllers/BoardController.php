<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\board_users;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->name;
        $type = $request->type;
        if (!$name || !$type) { //Validation (Will be replaced with requestprovider)
            return redirect()->back();
        }
        $board = new Board();
        $board->name = $name;
        $board->type = $type;
        $board->save();
        $board->board_users()->attach('board_id', array('user_id' => Auth::user()->id, 'board_role_id' => 99));

        return redirect('/boards/' . $board->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {

        $total = 0;
        $totalspendings = 0;
        $totalincome = 0;
//        $board = board::findorfail($id); //Select board  from url-parameter.

        foreach ($board->manual_record as $record) { //This function seperates (Spend & Income types)
            if ($record->type === '+') {
                $totalincome += $record->value;
            } elseif ($record->type === '-') {
                $totalspendings += $record->value;
            }
            $singlerecord = $record->type . $record->value;
            $total += (float)$singlerecord;
        }


        return view('board.view', ['board' => $board, 'total' => $total, 'totalspendings' => $totalspendings, 'totalincome' => $totalincome]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $board = Board::find($id);
        $board->board_users()->detach();
        $board->manual_record()->delete();
        $board->category()->delete();
        $board->delete();
        return redirect('/boards');
    }


}
