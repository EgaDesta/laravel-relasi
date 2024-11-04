<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $books = Book::count();
        $authors = Author::count();
        return view('dashboard', compact('books', 'authors')  );
    }
}
