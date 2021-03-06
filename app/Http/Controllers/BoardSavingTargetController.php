<?php

namespace App\Http\Controllers;
use App\Models\BoardCategory;
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
        foreach ($board->savingtargets as $boardsavingtarget) { //Get total foreach savingtarget
            $boardsavingtarget->total = 0;
            if ($boardsavingtarget->type == 'auto' && $boardsavingtarget->type_attributes['categories'] != null) {
                foreach ($boardsavingtarget->type_attributes['categories'] as $category) {
                    $category = BoardCategory::findorfail($category);

                    foreach ($category->records as $record) {
                        if ($record->type == '+') {
                            $boardsavingtarget->total += $record->value;
                        } else {
                            $boardsavingtarget->total -= $record->value;
                        }
                    }
                    $boardsavingtarget->total = $boardsavingtarget->total * ($boardsavingtarget->type_attributes['percentage'] / 100);
                }
            } elseif($boardsavingtarget->type == 'manual') {
                foreach ($boardsavingtarget->records as $record) {
                    if ($record->type == '+') {
                        $boardsavingtarget->total += $record->value;
                    } else {
                        $boardsavingtarget->total -= $record->value;
                    }
                }
            } else {
                foreach ($board->records as $record) {
                    if ($record->type == '+') {
                        $boardsavingtarget->total += $record->value;
                    } else {
                        $boardsavingtarget->total -= $record->value;
                    }
                }
            }
        }


        return view('board.savingtargets.list', ['board' => $board, 'colors' => $colors]);
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


        $icon = $request->icon;
        $value = $request->value;
        $title = $request->name;
        $type = $request->type;
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

        if ($type === 'auto') {
            $percentage = $request->amountRange;
            $categories = $request->category;
            $attributes = ['percentage' => $percentage, 'categories' => $categories];
        } else {
            $attributes = null;
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
        $savingtarget->type = $type;
        $savingtarget->type_attributes = $attributes;
        $savingtarget->value = $value;
        $savingtarget->name = $title;
        $savingtarget->description = $description;
        $savingtarget->deadline = $deadline;
        $savingtarget->status = 'active';
        $savingtarget->attachment = $attachment;
        $savingtarget->save();

        return redirect('/dashboard/boards/' . $board->id . '/savingtargets/' . $savingtarget->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BoardSavingTarget  $boardSavingTarget
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board, BoardSavingTarget $boardsavingtarget)
    {
        //board total
        $boardsavingtarget->total = 0;
        if ($boardsavingtarget->type == 'auto' && $boardsavingtarget->type_attributes['categories'] != null) {
            foreach ($boardsavingtarget->type_attributes['categories'] as $category) {
                $category = BoardCategory::findorfail($category);

                foreach ($category->records as $record) {
                    if ($record->type == '+') {
                        $boardsavingtarget->total += $record->value;
                    } else {
                        $boardsavingtarget->total -= $record->value;
                    }
                }
                $boardsavingtarget->total = $boardsavingtarget->total * ($boardsavingtarget->type_attributes['percentage'] / 100);
            }
        } elseif($boardsavingtarget->type == 'manual') {
            foreach ($boardsavingtarget->records as $record) {
                if ($record->type == '+') {
                    $boardsavingtarget->total += $record->value;
                } else {
                    $boardsavingtarget->total -= $record->value;
                }
            }
        } else {
            foreach ($board->records as $record) {
                if ($record->type == '+') {
                    $boardsavingtarget->total += $record->value;
                } else {
                    $boardsavingtarget->total -= $record->value;
                }
            }
        }
        $date1 = new \DateTime($boardsavingtarget->created_at);
        $date2 = new \DateTime($boardsavingtarget->deadline);
        $interval = $date1->diff($date2)->days;
        $boardsavingtarget->interval = $interval;
        //count days between now and deadline
        $now = new \DateTime();
        $deadline = new \DateTime($boardsavingtarget->deadline);
        $diff = $now->diff($deadline);


        $boardsavingtarget->countdown = $diff->format('%a');

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
    public function update(UpdateBoardSavingTargetRequest $request, Board $board, BoardSavingTarget $boardsavingtarget)
    {
        $boardsavingtarget->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BoardSavingTarget  $boardSavingTarget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board, BoardSavingTarget $boardsavingtarget)
    {
        $boardsavingtarget->delete();
       return redirect('/dashboard/boards/'.$board->id.'/savingtargets');
    }
}
