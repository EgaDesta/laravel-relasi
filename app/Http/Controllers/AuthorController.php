<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::paginate(5);
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        Author::create($request->all());
        return redirect()->route('author.index')->with('success', 'Author created successfully');

    }

    public function edit($id)
    {
        $author = Author::find($id);
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, $id)

    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        $author = Author::find($id);
        $author->update($request->all());
        return redirect()->route('author.index')->with('success', 'Author updated successfully');
    }

    public function destroy($id)
    {
        Author::destroy($id);
        return redirect()->route('author.index')->with('success', 'Author deleted successfully');
    }
}
