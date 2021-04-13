<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Film;
use Illuminate\Support\Facades\Auth;

class FilmController extends Controller
{
    public function home(){
        view('home');
    }

    public function film_list(){
        $films = Film::all();
        return view('index', compact('films'));
    }

    public function new_film(){
        return view('add');
    }

    public function add(Request $request){
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'image1' => ['required', 'image'],
            'image2' => 'image|nullable',
            'image3' => 'image|nullable',
            'desc' => 'required',
            'release' => 'required',
            'trailer' => 'required',
            'duration_hours' => ['required', 'min:0', 'max:24'],
            'duration_mins'=> ['required', 'min:0', 'max:59']
        ]);

        $fn_img = $request->file('image1')->store('image');

        if ($request->file('image2') == null) {
            $fn_img2 = "";
        }else{
           $fn_img2 = $request->file('image2')->store('image');
        }

        if ($request->file('image3') == null) {
            $fn_img3 = "";
        }else{
            $fn_img3 = $request->file('image3')->store('image');
        }

        $fn_img = $request->file('image1')->store('image');

        if ($request->file('image2') == null) {
            $fn_img2 = "";
        }else{
           $fn_img2 = $request->file('image2')->store('image');
        }

        if ($request->file('image3') == null) {
            $fn_img3 = "";
        }else{
            $fn_img3 = $request->file('image3')->store('image');
        }

        $hour = $request->input('duration_hours');
        if(strlen($hour)==1){
            $hour = "0".$hour;
        }
        $min = $request->input('duration_mins');
        if(strlen($min)==1){
            $min = "0".$min;
        }

        $duration = $hour.":".$min;

        Film::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'release' => $request->release,
            'trailer' => $request->trailer,
            'duration' => $duration,
            'image1' => $fn_img,
            'image2' => $fn_img2,
            'image3' => $fn_img3
        ]);

        return back();
    }

    public function show($id){
        $film = Film::findOrFail($id);
        // dd($film->comments);
        return view('show', compact('film'));
    }

    public function edit($id){
        $film = Film::findorFail($id);
        return view('update', compact('film'));
    }

    public function update(Request $request, $id){
        $film = Film::findOrFail($id);

        $request->validate([
            'image1' => ['image'],
            'image2' => 'image|nullable',
            'image3' => 'image|nullable',
            'duration_hours' => ['min:0', 'max:24'],
            'duration_mins'=> ['min:0', 'max:59']
        ]);

        if($request->hasFile("image1") && $request->file("image1")->isValid()){
            Storage::delete('$film->image1');
            $fn_img = $request->file('image1')->store('image');
            $film->image1 = $fn_img;
        }

        if($request->hasFile("image2") && $request->file("image2")->isValid()){
            Storage::delete('$film->image2');
            $fn_img2 = $request->file('image2')->store('image');
            $film->image2 = $fn_img2;
        }

        if($request->hasFile("image3") && $request->file("image3")->isValid()){
            Storage::delete('$film->image3');
            $fn_img3 = $request->file('image3')->store('image');
            $film->image3 = $fn_img3;
        }

        $hour = $request->input('duration_hours');
        if(strlen($hour)==1){
            $hour = "0".$hour;
        }
        $min = $request->input('duration_mins');
        if(strlen($min)==1){
            $min = "0".$min;
        }

        $duration = $hour.":".$min;

        $film->update([
            'title' => $request->title,
            'dev' => $request->dev,
            'release' => $request->release,
            'price' => $request->price,
            'rating' => $request->rating,
            'genre_id' => $request->genre_id,
            'duration' => $duration
        ]);
        return redirect('/index');
    }

    public function destroy($id){
        Film::destroy($id);
        return redirect('/index');
    }
}

