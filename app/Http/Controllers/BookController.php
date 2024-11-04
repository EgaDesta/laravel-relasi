<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(relations: 'author')->paginate(5);
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();

        return view('books.create', compact('authors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'serial_number' => 'required|string',
            'published_at' => 'required|date',
            'author_id' => 'required|integer|exists:authors,id'
        ]);

        Book::create($request->all());

        return redirect()->route('book.index')->with('success', 'Book created successfully');
    }

    public function edit($id)
    {
        $books = Book::find($id);
        $authors = Author::all();

        return view('books.edit', compact('books', 'authors'));
    }

    public function update(Request $request, $id)

    {
        $request->validate([
            'title' => 'required|string|max:255',
            'serial_number' => 'required|string',
            'published_at' => 'required|date',
            'author_id' => 'required|integer|exists:authors,id'
        ]);

        $books = Book::find($id);
        $books->update($request->all());
        return redirect()->route('book.index')->with('success', 'Book updated successfully');
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect()->route('book.index')->with('success', 'Book deleted successfully');
    }
}
