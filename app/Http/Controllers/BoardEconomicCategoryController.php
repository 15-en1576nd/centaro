<?php

namespace App\Http\Controllers;

use App\Models\board;
use App\Models\board_economic_category;
use App\Models\board_manual_record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardEconomicCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($board)
    {
        $board = board::find($board);


        return view('board.category.list', ['board' => $board]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($board)
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($board, Request $request)
    {
        $name = $request->name;
        $color = $request->color;
        if ($color && $name) {
            board_economic_category::create(array('board_id' => $board, 'name' => $name, 'color' => $color));

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\board_economic_category  $board_economic_category
     * @return \Illuminate\Http\Response
     */
    public function show(board_economic_category $board_economic_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\board_economic_category  $board_economic_category
     * @return \Illuminate\Http\Response
     */
    public function edit(board_economic_category $board_economic_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\board_economic_category  $board_economic_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, board_economic_category $board_economic_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\board_economic_category  $board_economic_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(board_economic_category $board_economic_category)
    {
        //
    }
}
