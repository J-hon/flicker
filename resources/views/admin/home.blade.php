@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Admin Dashboard</div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('admin.movies.index') }}" class="btn btn-outline-primary">
                                All Movies
                            </a>

                            <a href="{{ url('/admin/report') }}" class="btn btn-outline-success">
                                <i class="fas fa-clipboard-list"></i> Report
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
