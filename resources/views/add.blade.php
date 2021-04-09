<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Film</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container" >
        <div class="d-flex justify-content-center align-items-center" style="min-height: 65vh">
        <form class="col-lg6" action="{{route('film.add')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input class="form-control" name="title" type="text" placeholder="">
            @error('title') <span>{{$message}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image-1</label>
            <input class="form-control" name="image1" type="file" placeholder="">
            @error('image1') <span>{{$message}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image-2</label>
            <input class="form-control" name="image2" type="file" placeholder="">
            @error('image2') <span>{{$message}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image-3</label>
            <input class="form-control" name="image3" type="file" placeholder="">
            @error('image3') <span>{{$message}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="desc" id="" cols="30" rows="8"></textarea>
            @error('desc') <span>{{$message}}</span> @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Release Date</label>
            <input class="form-control" name="release" type="date" placeholder="">
            @error('release') <span>{{$message}}</span> @enderror
        </div>
        <div>
            <label for="" class="form-label">Duration</label>
            <input class="form-control" name="duration_hours" type="number" min="0" max="24" placeholder="">
            @error('duration_hours') <span>{{$message}}</span> @enderror
            <label for="" class="form-label">hours</label>
            <input class="form-control" name="duration_mins" type="number" min="0" max="59" placeholder="">
            @error('duration_mins') <span>{{$message}}</span> @enderror
            <label for="" class="form-label">minutes</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Trailer Link</label>
            <input class="form-control" name="trailer" type="text" placeholder="">
            @error('trailer') <span>{{$message}}</span> @enderror
        </div>
        <button type="submit" class="btn btn-outline-dark">Submit</button>
        </form>
        </div>
</div>
</body>
</html>
