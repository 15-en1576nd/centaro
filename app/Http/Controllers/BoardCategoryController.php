<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Board;
use App\Models\BoardCategory;
use App\Http\Requests\StoreBoardCategoryRequest;
use App\Http\Requests\UpdateBoardCategoryRequest;

class BoardCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Board $board)
    {
        $colors = color::all(); //Get all colors

        return view('board.category.list', ['board' => $board, 'colors' => $colors]);
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
     * @param  \App\Http\Requests\StoreBoardCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBoardCategoryRequest $request, Board $board)
    {
        $name = $request->name;
        $color = $request->color;
        if ($color && $name) {
            BoardCategory::create(array('board_id' => $board->id, 'name' => $name, 'color_id' => $color));

        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardCategory  $boardCategory
     * @return \Illuminate\Http\Response
     */
    public function show(BoardCategory $boardCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BoardCategory  $boardCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(BoardCategory $boardCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBoardCategoryRequest  $request
     * @param  \App\Models\BoardCategory  $boardCategory
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBoardCategoryRequest $request, BoardCategory $boardCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardCategory  $boardCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(BoardCategory $boardCategory)
    {
        //
    }
}
