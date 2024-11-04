@extends('layouts.app')

@section('title', 'Dashboard')
@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Dashboard</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary font-weight-bold">Total Authors</h5>
                    <p class="card-text display-4 text-dark">{{ $authors }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card shadow border-0 h-100">
                <div class="card-body text-center">
                    <h5 class="card-title text-success font-weight-bold">Total Books</h5>
                    <p class="card-text display-4 text-dark">{{ $books }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
