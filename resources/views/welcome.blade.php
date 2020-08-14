@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            @foreach($movies as $movie)

                <div class="col-md-3" id="box">
                    <form class="product-form" action="{{ route('pay') }}" method="post">
                        {{ csrf_field() }}

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
                                ₦{{ $movie->price }}

                                <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                                <input type="hidden" name="currency" value="NGN" />
                                <input type="hidden" name="country" value="NG" />
                                <input type="hidden" name="amount" value="{{ $movie->price }}" />

                                <input type="hidden" name="movie" value="{{ $movie->name }}" />

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
