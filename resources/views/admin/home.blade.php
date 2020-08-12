@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                        <b>Report</b>
                        <br>
                        Customers whose age is above 50 -
                        @foreach($usersAbove50 as $user)
                            {{ $user->name }}
                        @endforeach
                        <br>
                        Movies that have Genre 'Action' - {{ $number }}
                        <br>
                        Movies that end with 's' -
                        @foreach($startWithS as $movie)
                            {{ $movie->name }}
                        @endforeach
                        <br>

                        <div class="text-center">
                            <a href="{{ route('admin.movies.index') }}" class="btn btn-outline-primary">
                                Movies
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
