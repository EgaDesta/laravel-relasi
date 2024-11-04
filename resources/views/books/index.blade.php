@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-6">Book</h1>
        <div class="mb-4">
            <a href="{{ route('book.create') }}" class="btn btn-primary">Create New Book</a>
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
                        <th>Title</th>
                        <th>Serial Number</th>
                        <th>Author</th>
                        <th>Publish</th>
                        <th width="280px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->serial_number }}</td>
                            <td><span class="badge badge-primary">{{ $book->author->name }}</span></td>
                            <td>{{ $book->published_at }}</td>
                            <td>
                                <form action="{{ route('book.destroy', $book->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('book.edit', $book->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Empty data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $books->links('pagination::bootstrap-4') }}
            </div>           
        </div>
    </div>
@endsection