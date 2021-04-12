<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Film;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $film = Film::findOrFail($request->film_id);

        Comment::create([
            'comment' => $request->comment,
            'user_id' => Auth::id(),
            'film_id'=> $request->film_id
        ]);
        return back();
    }

    public function destroy($id){
        Comment::destroy($id);
        return back();
    }
}
