<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Board;
use App\Http\Requests\StoreBoardRequest;
use App\Http\Requests\UpdateBoardRequest;
use App\Models\BoardRecord;

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
     * @param  \App\Http\Requests\StoreBoardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBoardRequest $request)
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
        $board->users()->attach('board_id', array('user_id' => Auth::user()->id, 'role_id' => 99));

        return redirect('/dashboard/boards/' . $board->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        $totalspendings = 0;
        $totalincome = 0;
        $total = 0;
        foreach ($board->records as $record) { //This function seperates (Spend & Income types)
            if ($record->type === '+') {
                $totalincome += $record->value;
            } elseif ($record->type === '-') {
                $totalspendings += $record->value;
            }
            $singlerecord = $record->type . $record->value;
            $total += (float)$singlerecord; //Calculates total board value
        }


        return view('board.view', ['board' => $board, 'total' => $total, 'totalspendings' => $totalspendings, 'totalincome' => $totalincome]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBoardRequest  $request
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBoardRequest $request, Board $board)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        $board->users()->detach(); //Detach all users from board
        $board->records()->delete(); //Detach all records from board
        $board->categories()->delete(); //Detach all categories from board
        $board->delete(); //Delete board from table
        return redirect('/dashboard/boards');
    }
}
