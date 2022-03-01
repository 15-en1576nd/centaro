<?php

namespace App\Http\Middleware;

use App\Models\board;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BoardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       $id = $request->route('board');
       if (isset($id)) {
        $boards = board::where('id', $id)->get();
        foreach ($boards as $board) {
            $board;
        }
        $userids = array();
        foreach ($board->board_users as $user) {
            $userids[] = $user->id;
        }
        if (!in_array(Auth::user()->id, $userids)) {
            abort('403');
        } else {
            return $next($request);
        }
       } else {
           abort('403');
       }

    }
}
