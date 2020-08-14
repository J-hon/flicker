@extends('layouts.app')

@section('content')

    <h3 class="text-center mt-3">Report</h3>

    <br>

    <div class="container">
        <b>Movies that end with "s"</b> -
        <br>
        @foreach($startWithS as $movie)
            {{ $movie->name }}
            <br>
        @endforeach

        <br>

        <b>Customers whose age is above 50</b> -
        <br>

        @foreach($usersAbove50 as $user)
            {{ $user->name }}
            <br>
        @endforeach

        <br>

        <b>Movies that have genre 'Action'</b> -
        <br>

        @foreach($actionMovies as $movie)
            {{ $movie->name }}
            <br>
        @endforeach

        <br>

        <b>Total number of movies purchased by customers</b> -
        <br>

        {{ $totalOrders }}<br>

        <br>

        <b>Monthly Orders</b> -
        <br>

        @foreach($months as $index => $month)
            {{ $month }} - {{ $monthlyOrders[$index] }}
            <br>
        @endforeach

    </div>
@endsection
