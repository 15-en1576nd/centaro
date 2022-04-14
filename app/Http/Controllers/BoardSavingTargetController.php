<?php

namespace App\Http\Controllers;
use App\Models\Icon;
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
    public function create(Board $board)
    {
        $icons = icon::all();
        return view('board.savingtargets.create', ['board' => $board, 'icons' => $icons]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBoardSavingTargetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Board $board, StoreBoardSavingTargetRequest $request)
    {
        //Get all request data
        $color = $request->color;
        $value = $request->value;
        $title = $request->title;
        $description = $request->description;
        $deadline = $request->deadline; //Deadline date
        $attachment = $request->attachment; //Attachment
        if ($attachment) {
            if(strstr($attachment,'.',true)!=='www' && strstr($attachment, '://', true)!=='https'){
                $attachment = 'https://www.'.$attachment;
            } elseif (strstr($attachment, '://', true)!=='https') {
                $attachment = 'https://'.$attachment;
            }
        }


        //Create new saving target
        $savingtarget = new BoardSavingTarget;
        $savingtarget->board_id = $board->id;
        $savingtarget->user_id = Auth::user()->id;
        if (empty($icon)) {
            $savingtarget->icon_id = 1;
        } else {
            $savingtarget->icon_id = $icon;
        }
        $savingtarget->value = $value;
        $savingtarget->name = $title;
        $savingtarget->description = $description;
        $savingtarget->deadline = $deadline;
        $savingtarget->status = 'active';
        $savingtarget->attachment = $attachment;
        $savingtarget->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardSavingTarget  $boardSavingTarget
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board, BoardSavingTarget $boardsavingtarget)
    {
        return view('board.savingtargets.view', ['board' => $board, 'savingtarget' => $boardsavingtarget]);
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
