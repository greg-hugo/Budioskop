<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    @extends('layouts.app')

    @section('content')
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Number of comment</th>
            <th scope="col">Rating</th>
            <th scope="col">Description</th>
            <th scope="col">Release Date</th>
            <th scope="col">Duration</th>
          </tr>
        </thead>
        <tbody>

        @foreach($films as $film)
          <tr>
            <td>
                <a href="{{route('film.show', $film->id)}}" class="alert-link">{{$film->title}}</a>
            <td>
            <td>{{$film->comments->count()}}</td>
            <td>{{round($film->comments->avg('rating'), 1)}}</td>
            <td>{{$film->desc}}</td>
            <td>{{$film->release}}</td>
            <td>{{$film->duration}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      @endsection
</body>
</html>
