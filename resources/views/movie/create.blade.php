@extends('layouts.app')

@section('content')

    <h3 class="text-center mt-3">Add a movie</h3>

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

    <div class="container">
        <form action="{{ route('admin.movies.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Movie title</label>
                <div class="col-sm-6">
                    <input type="text" name="name" class="form-control" id="inputPassword">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" class="form-control" id="inputPassword">
                </div>
            </div>

            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-6">
                    <input type="file" name="image" class="form-control" id="inputPassword">
                </div>
            </div>

            <div class="form-group row">
                <label for="genre" class="col-sm-2 col-form-label">Genre</label>
                <div class="col-sm-6">
                    <select class="custom-select" name="genre_id">
                        <option selected>Select a genre</option>
                        @foreach($genres as $genre)
                            <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-6">
                    <input type="text" name="price" class="form-control" id="inputPassword">
                </div>
            </div>

            <div class="form-group row">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>

@endsection
