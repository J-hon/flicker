@extends('layouts.app')

@section('content')

    <h3 class="text-center mt-3">Edit {{ $movie->name }}</h3>

    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.movies.update', $movie->id) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Movie title</label>
            <div class="col-sm-6">
                <input type="text" value="{{ $movie->name }}" name="name" class="form-control" id="inputPassword">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-6">
                <input type="text" value="{{ $movie->description }}" name="description" class="form-control" id="inputPassword">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Image</label>
            <div class="col-sm-6">
                <img src="{{ asset('/images/movies/'.$movie->image) }}" alt="" id="image">
                <input type="file" name="image" class="form-control" id="inputPassword">
            </div>
        </div>

        <div class="form-group row">
            <label for="genre" class="col-sm-2 col-form-label">Genre</label>
            <div class="col-sm-6">
                <select class="custom-select" name="genre_id">
                    <option selected value="{{ $movie->genre_id }}">{{ $movie->genre->name }}</option>
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price</label>
            <div class="col-sm-6">
                <input type="text" value="{{ $movie->price }}" name="price" class="form-control" id="inputPassword">
            </div>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>

@endsection
