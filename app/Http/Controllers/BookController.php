<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

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

    public function editBook(Book $book)
    {
        $authors = Author::all();

        return view('editBook', compact('book', 'authors'));
    }

    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->validated());

        return redirect()->back()->with('message', 'A book has been changed!');
    }

    public function delete(Book $book)
    {
        $book->delete();

        return redirect()->back();
    }

}
