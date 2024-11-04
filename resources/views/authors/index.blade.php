@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Authors</h1>
        <div class="mb-4">
            <a href="{{ route('author.create') }}" class="btn btn-primary">Create New Author</a>
        </div>
        <div class="bg-gray-100 rounded-lg">
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr class="justify-items-center">
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($authors as $author)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>
                                <form action="{{ route('author.destroy', $author->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('author.edit', $author->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Empty data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $authors->links('pagination::bootstrap-4') }}
            </div>         
        </div>
    </div>
@endsection