<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Film</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
    <div class="container" >
        <div class="d-flex justify-content-center align-items-center" style="min-height: 65vh">
        <form class="col-lg6" action="{{route('film.update', $film->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="" class="form-label">Name</label>
            <input class="form-control" name="title" type="text" placeholder="" value="{{$film->title}}">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image-1</label>
            <input class="form-control" name="image1" type="file" placeholder="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image-2</label>
            <input class="form-control" name="image2" type="file" placeholder="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Image-3</label>
            <input class="form-control" name="image3" type="file" placeholder="">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea name="desc" id="" cols="30" rows="8" value="{{$film->desc}}"></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Release Date</label>
            <input class="form-control" name="release" type="date" placeholder="" value="{{$film->release}}">
        </div>
        <div>
            <label for="" class="form-label">Duration</label>
            <input class="form-control" name="duration_hours" type="number" min="0" max="24" placeholder="">
            <label for="" class="form-label">hours</label>
            <input class="form-control" name="duration_mins" type="number" min="0" max="59" placeholder="">
            <label for="" class="form-label">minutes</label>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Trailer Link</label>
            <input class="form-control" name="trailer" type="text" placeholder="" value="{{$film->trailer}}">
        </div>
        <button type="submit" class="btn btn-outline-dark">Update</button>
        </form>
        </div>
        <form action="{{route('film.del', $film->id)}}"method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger" style="size:80%">Delete</button>
        </form>
        </div>
</div>
</body>
</html>
