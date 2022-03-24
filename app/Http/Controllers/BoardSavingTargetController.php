<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardSavingTarget;
use App\Http\Requests\StoreBoardSavingTargetRequest;
use App\Http\Requests\UpdateBoardSavingTargetRequest;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;

class BoardSavingTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Board $board)
    {
        $colors = color::all();
        $total = 0;
        foreach ($board->records as $record) { //Get total board value
            if ($record->type === '+') {
                $total += $record->value;
            } elseif ($record->type === '-') {
                $total -= $record->value;
            }
        }

        return view('board.savingtargets.list', ['board' => $board, 'colors' => $colors, 'total' => $total]);
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
     * @param  \App\Http\Requests\StoreBoardSavingTargetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Board $board, StoreBoardSavingTargetRequest $request)
    {   $color = $request->color;
        $value = $request->value;
        $title = $request->title;
        $description = $request->description;
        $deadline = $request->deadline; //Deadline date

        BoardSavingTarget::create(array('color_id' => $color, 'user_id' => Auth::user()->id,'board_id' => $board->id,'value' => $value, 'name' => $title, 'description' => $description, 'deadline' => $deadline, 'status' => 'active'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardSavingTarget  $boardSavingTarget
     * @return \Illuminate\Http\Response
     */
    public function show(BoardSavingTarget $boardSavingTarget)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoardSavingTarget  $boardSavingTarget
     * @return \Illuminate\Http\Response
     */
    public function edit(BoardSavingTarget $boardSavingTarget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBoardSavingTargetRequest  $request
     * @param  \App\Models\BoardSavingTarget  $boardSavingTarget
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBoardSavingTargetRequest $request, BoardSavingTarget $boardSavingTarget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardSavingTarget  $boardSavingTarget
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoardSavingTarget $boardSavingTarget)
    {
        //
    }
}
