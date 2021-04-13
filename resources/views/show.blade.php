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

        @foreach($film->comments as $comment)
        <div class="container" style="margin:10px">
            <div class="d-flex justify-content-center align-items-center" style="min-height: 5vh">
                <div>
                    {{($comment->user->name)}}
                    <embed src="{{asset($comment->user->profile)}}" alt="Film Image" height="40px" width="40px" style="border-radius: 20px">
                    {{($comment->updated_at)}}
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Rating</label>
                    <input readonly class="form-control" name="rating" type="number" placeholder="{{$comment->rating}}">
                </div>
                <label for="" class="form-label">Comment</label>
                <textarea readonly style="resize: none;" name="comment" id="" cols="30" rows="8">{{($comment->comment)}}</textarea>

                @if ($comment->user_id==Auth::id())
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="{{route('edit.comment', $comment->id)}}"method="GET">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary" style="width:100%">Edit</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
        @endforeach

        @if (! App\Comment::where('user_id', Auth::user()->id)->where('film_id', $film->id)->exists())
        <div class="container" style="margin:60px">
            <div class="d-flex justify-content-center align-items-center" style="min-height: 65vh">
            <form class="col-lg6" action="{{route('post.comment')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                {{ (Auth::user()->name) }}
                <embed src="{{asset(Auth::user()->profile)}}" alt="Film Image" height="40px" width="40px" style="border-radius: 20px">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Rating</label>
                <input class="form-control" name="rating" type="number" min="1" max="10" placeholder="">
                @error('rating') <span>{{$message}}</span> @enderror
            </div>
            <div class="mb-3">
                <input class="form-control" name="film_id" type="hidden" placeholder="" value="{{$film->id}}">
                <label for="" class="form-label">Comment</label>
                <textarea name="comment" id="" cols="30" rows=  "8"></textarea>
                @error('comment') <span>{{$message}}</span> @enderror
            </div>
            <button type="submit" class="btn btn-outline-dark">Submit</button>
            </form>
        </div>
        @endif

</body>
</html>
