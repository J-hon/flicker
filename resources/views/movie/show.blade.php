@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{ route('admin.movies.create') }}" class="btn btn-outline-success">
            <i class="fas fa-plus"></i> Add a movie
        </a>

        <br><br>

        <table class="table table-responsive-md table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Genre</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $movie->name }}</td>
                        <td>{{ $movie->description }}</td>
                        <td>{{ $movie->genre->name }}</td>
                        <td>₦{{ $movie->price }}</td>
                        <td><a href="{{ route('admin.movies.edit', $movie->id) }}"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash" style="color: #ff6b6b;"></i></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection