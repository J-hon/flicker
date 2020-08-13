@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Dashboard</div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">
                            <b>Profile</b>
                        </label>
                        <div class="col-sm-6">
                            {{ $user->name }}
                            <br>
                            {{ $user->email }}
                            <br>
                            {{ $user->address }}
                            <br>
                            {{ $user->date_of_birth }}

                            <br><br>

                            <a href="{{ route('edit-profile', $user->id) }}" class="btn btn-outline-primary">
                                <i class="fas fa-edit"></i> Edit profile
                            </a>

                            <form action="{{ route('delete-profile', $user->id) }}" method="POST">
                                @csrf
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-outline-danger" style="margin-top: 10px">
                                    <i class="fas fa-trash"></i> Deactivate account
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <div class="card">
                <div class="card-header">Change password</div>
                <div class="card-body">
                    <form action="{{ route('update-password', $user->id) }}" method="POST">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Current password</label>
                            <div class="col-sm-6">
                                <input type="password" name="old_password" class="form-control" id="inputPassword">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">New password</label>
                            <div class="col-sm-6">
                                <input type="password" name="new_password" class="form-control" id="inputPassword">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-sm-4 col-form-label">Confirm new password</label>
                            <div class="col-sm-6">
                                <input type="password" name="password_confirmation" class="form-control" id="inputPassword">
                            </div>
                        </div>

                        <div class="form-group row" style="margin-left: auto">
                            <button type="submit" class="btn btn-primary">
                                Update password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
