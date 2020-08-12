@extends('layouts.app')

@section('content')

{{--    <h3 class="text-center mt-3">Welcome to Flicker</h3>--}}

    <div class="container">
        <div class="row">

            @foreach($movies as $movie)

                <div class="col-md-3" id="box">
                    <form class="product-form">
                        <img class="product_image img-fluid" src="{{ asset('images/movies/'.$movie->image) }}">

                        <div class="product-details">
                            <br>

                            <h6 class="text-center">
                                <b>
                                    {{ $movie->name }}
                                </b>
                            </h6>

                            <h6 class="text-center">
                                {{ $movie->genre->name }}
                            </h6>

                            <div class="text-center">
                                {{ $movie->price }}

                                <br>

                                <button type="submit" class="btn btn-primary">
                                    Buy
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            @endforeach

        </div>
    </div>

@endsection
