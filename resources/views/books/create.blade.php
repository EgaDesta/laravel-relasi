@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-center mb-3">
            <h1>Create New Book</h1>
        </div>
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('book.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Title" value="{{ old('title') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="serial_number" class="form-label">Serial Number:</label>
                        <input type="text" name="serial_number" id="serial_number" class="form-control" placeholder="Serial Number" value="{{ old('serial_number') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="published_at" class="form-label">Published At:</label>
                        <input type="date" name="published_at" id="published_at" class="form-control" value="{{ old('published_at') }}">
                    </div>

                    <div class="form-group mb-3">
                        <label for="author_id" class="form-label">Author:</label>
                        <select name="author_id" id="author_id" class="form-control">
                            <option value="">Select Author</option>
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}" {{ old('author_id') == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-secondary" href="{{ route('book.index') }}">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
