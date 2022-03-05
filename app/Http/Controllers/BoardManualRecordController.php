<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
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
        $board = board::where('id', $id)->first(); //Select board  from url-parameter.

         //Split search-result in single array (This was made because many to many result).

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
    public function store($board ,Request $request)
    {
        $type = $request->type;
        $value = $request->value;
        $title =  $request->title;
        $discription = $request->discription;
        if ($type === '-' OR $type === '+' || is_integer($value) || is_string($name)) {
           $board = board::where('id', $board)->first();
            board_manual_record::create(array('user_id' => Auth::user()->id,'board_id' => $board->id, 'category_id' => 1,'type' => $type,'value' => $value, 'title' => $title, 'discription' => $discription, 'attachment' => 'test.png'));
            //FIX!!!!!!!
        }

        return redirect()->back();
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
