@extends('layouts.app')

@section('content')

    <h3 class="text-center mt-3">Edit my profile</h3>

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

    <form action="{{ route('update-profile', $user) }}" method="post">
        {{ csrf_field() }}
        {{ method_field('POST') }}

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" value="{{ $user->name }}" name="name" class="form-control" id="inputPassword">
            </div>
        </div>

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-6">
                <input type="text" value="{{ $user->email }}" name="email" class="form-control" id="inputPassword">
            </div>
        </div>

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-6">
                <input type="text" value="{{ $user->address }}" name="address" class="form-control" id="inputPassword">
            </div>
        </div>

        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Date of birth</label>
            <div class="col-sm-6">
                <input type="date" value="{{ $user->date_of_birth }}" name="date_of_birth" class="form-control" id="inputPassword">
            </div>
        </div>

        <div class="form-group row">
            <button type="submit" class="btn btn-primary">Update profile</button>
        </div>

    </form>

@endsection
