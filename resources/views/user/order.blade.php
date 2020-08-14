@extends('layouts.app')

@section('content')

    <h3 class="text-center mt-3">My Orders</h3>

    <div class="container">
        <table class="table table-responsive-md table-hover">
            <thead>
                <tr>
                    <th>Movie</th>
                    <th>Price</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->movie }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ date('F j, Y, g:i a', strtotime($order->updated_at)) }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

@endsection
