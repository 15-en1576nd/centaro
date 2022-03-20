<?php

namespace App\Http\Controllers;

use App\Models\Board;
use App\Models\BoardRecord;
use App\Http\Requests\StoreBoardRecordRequest;
use App\Http\Requests\UpdateBoardRecordRequest;
use Illuminate\Support\Facades\Auth;

class BoardRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Board $board)
    {

        return view('board.records.list', ['board' => $board]);
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
     * @param  \App\Http\Requests\StoreBoardRecordRequest  $request
     * @return \Illuminate\Http\Response
     */
   public function store($board, StoreBoardRecordRequest $request)
   {
       $type = $request->type;
       $value = $request->value;
       $title = $request->title;
       $description = $request->description;
       $category_id = $request->category;

       if ($type == "-" || $type == "+" && $value && $title && $description) { //Validation (Will be replaced with requestprovider)
           $board = Board::findOrFail($board);
           BoardRecord::create(array('user_id' => Auth::user()->id, 'board_id' => $board->id, 'category_id' => $category_id, 'type' => $type, 'value' => $value, 'title' => $title, 'description' => $description));
           //FIX!!!!!!!
       }
       return redirect()->back();
   }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardRecord  $boardRecord
     * @return \Illuminate\Http\Response
     */
    public function show(BoardRecord $boardRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoardRecord  $boardRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(BoardRecord $boardRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBoardRecordRequest  $request
     * @param  \App\Models\BoardRecord  $boardRecord
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBoardRecordRequest $request, BoardRecord $boardRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardRecord  $boardRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoardRecord $boardRecord)
    {
        //
    }
}
