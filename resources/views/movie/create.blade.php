@extends('layouts.app')

@section('content')

    <h3 class="text-center mt-3">Add a movie</h3>

    <br>

    <div class="container">
        <form action="{{ route('admin.movies.store') }}" method="post">
            @csrf

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Movie title</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputPassword">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputPassword">
                </div>
            </div>

            <div class="form-group row">
                <div class="custom-file">
{{--                    <label for="image" class="col-sm-2 col-form-label">Image</label>--}}
                    <div class="col-sm-8">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose image</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                <div class="col-sm-6">
                    <select class="custom-select">
                        <option selected>Select a genre</option>
                        @foreach($genres as $genre)
                            <option>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputPassword">
                </div>
            </div>

            <div class="form-group row">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>

@endsection
