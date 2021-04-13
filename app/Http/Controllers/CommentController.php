<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Film;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Database\Eloquent\Model;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $film = Film::findOrFail($request->film_id);

        $request->validate([
            'rating' => 'required|max:10|min:1',
            'comment' => 'nullable'
        ]);

        if(! Comment::where('user_id', Auth::user()->id)->where('film_id', $film->id)->exists()){
            Comment::create([
                'comment' => $request->comment,
                'user_id' => Auth::id(),
                'film_id'=> $request->film_id,
                'rating' => $request->rating
            ]);
        }
        return back();
    }

    public function edit($id){
        $comment = Comment::findorFail($id);
        return view('edit', compact('comment'));
    }

    public function update(Request $request, $id){
        $comment = Comment::findorFail($id);

        $request->validate([
            'rating' => 'required|max:10|min:1',
            'comment' => 'nullable'
        ]);


        $comment->touch();

        $comment->update([
            'rating' => $request->rating,
            'comment'=> $request->comment
        ]);

        return back();
    }
}
