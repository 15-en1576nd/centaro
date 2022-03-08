<?php

namespace App\Http\Middleware;

use App\Models\Board;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */




    public function handle(Request $request, Closure $next)
    {
        $id = $request->route('board'); //Get board-id from url.
        $idexists = Board::where('id', '=', $id)->first(); //Search id of board in array.
        if (isset($id) && $idexists != null) {  //Check if board exist & user has access to board.
            $boards = Board::where('id', $id)->get(); //Get board's from user.
            foreach ($boards as $board) { //Split all boards to single arrays.
                $board;
            }
            $userids = array();
            foreach ($board->board_users as $user) { //Selects all users from board.
                $userids[] = $user->id;
            }
            if (in_array(Auth::user()->id, $userids)) { //Checks if user has access to board.
                return $next($request);
            } else {
                abort('403');
            }

        } elseif(!isset($id)) {
            return $next($request);
        } else {
            abort('404');
    }

    }
}
