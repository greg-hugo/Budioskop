<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Comment</title>
</head>
<body>
    <div class="container" style="margin:60px">
        <div class="d-flex justify-content-center align-items-center" style="min-height: 65vh">
        <form class="col-lg6" action="{{route('update.comment', $comment->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div>
            <div>
                {{($comment->user->name)}}
                <embed src="{{asset($comment->user->profile)}}" alt="Film Image" height="40px" width="40px" style="border-radius: 20px">
            </div>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Rating</label>
            <input class="form-control" name="rating" type="number" min="1" max="10"  placeholder="" value="{{$comment->rating}}">
            @error('rating') <span>{{$message}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Comment</label>
            <textarea name="comment" id="" cols="30" rows=  "8" value="{{$comment->comment}}"></textarea>
            @error('comment') <span>{{$message}}</span> @enderror
        </div>
        <button type="submit" class="btn btn-outline-dark">Update</button>
        </form>
        </div>
</body>
</html>
