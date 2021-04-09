<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FILM</title>
</head>
<body>
    <div style="position:relative; left:40px; top:40px">
        <h2 class="font-weight-bold font-italic">{{($film->title)}}</h2>
        <iframe width=”560″ height=”315″ src={{($film->trailer)}} frameborder=”0″ allow=”accelerometer; encrypted-media; gyroscope; picture-in-picture” allowfullscreen></iframe>
        <embed src="{{asset($film->image1)}}" alt="Film Image" height="300px" width="400px">

        @if ($film->image2=="")
        <embed src="{{asset('image/baldman.png')}}" alt="Film Image" height="300px" width="400px">
        @else
        <embed src="{{asset($film->image2)}}" alt="Film Image" height="300px" width="400px">
        @endif

        @if ($film->image3=="")
        <embed src="{{asset('image/baldman.png')}}" alt="Film Image" height="300px" width="400px">
        @else
        <embed src="{{asset($film->image3)}}" alt="Film Image" height="300px" width="400px">
        @endif
        <h4>Released on: {{($film->release)}}</h4>
        <p>{{($film->desc)}}</p>
        <h4>Duration: {{($film->duration)}}</h4>

        <div class="btn-group" role="group" aria-label="Basic example">
            <form action="{{route('film.edit', $film->id)}}"method="GET">
                @csrf
                <button type="submit" class="btn btn-outline-primary" style="width:100%">Edit</button>
            </form>
        </div>

        <form action="{{route('film.del', $film->id)}}"method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger" style="size:80%">Delete</button>
        </form>
        </div>
        {{-- <div>@comments(['model' => $film])</div> --}}
</body>
</html>
