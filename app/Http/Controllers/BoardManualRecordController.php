<?php

namespace App\Http\Controllers;

use App\Models\board;
use App\Models\board_manual_record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BoardManualRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $id = Session::get('currentboardid');
        $boards = board::where('id', $id)->get(); //Select board  from url-parameter.
        foreach ($boards as $board) {
            $board; //Split search-result in single array (This was made because many to many result).
        }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\board_manual_record  $board_manual_record
     * @return \Illuminate\Http\Response
     */
    public function show(board_manual_record $board_manual_record)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\board_manual_record  $board_manual_record
     * @return \Illuminate\Http\Response
     */
    public function edit(board_manual_record $board_manual_record)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\board_manual_record  $board_manual_record
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, board_manual_record $board_manual_record)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\board_manual_record  $board_manual_record
     * @return \Illuminate\Http\Response
     */
    public function destroy(board_manual_record $board_manual_record)
    {
        //
    }
}
