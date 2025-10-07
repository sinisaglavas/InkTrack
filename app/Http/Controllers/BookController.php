<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveBookRequest;
use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books', compact('books'));
    }

    public function addBook()
    {
        $authors = Author::all();

        return view('addBook', compact('authors'));
    }

    public function create(SaveBookRequest $request)
    {
        Book::create([
            'author_id' => $request->get('author_id'),
            'title' => $request->get('title'),
            'year_of_publication' => $request->get('year_of_publication'),
            'genre' => $request->get('genre'),
            'status' => $request->get('status'),
        ]);

        return redirect()->back()->with('message', 'A new book has been recorded!');
    }
}
