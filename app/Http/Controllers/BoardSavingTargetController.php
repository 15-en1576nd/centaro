<?php

namespace App\Http\Controllers;

use App\Models\BoardSavingTarget;
use App\Http\Requests\StoreBoardSavingTargetRequest;
use App\Http\Requests\UpdateBoardSavingTargetRequest;

class BoardSavingTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(StoreBoardSavingTargetRequest $request)
    {
        //
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
