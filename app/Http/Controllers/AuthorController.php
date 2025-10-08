<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        return view('authors', compact('authors'));
    }

    public function addAuthor()
    {
        return view('addAuthor');
    }

    public function create(SaveAuthorRequest $request)
    {
        Author::create([
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'year_of_birth' => $request->get('year_of_birth'),
        ]);

        return redirect()->back()->with('message', 'A new author has been recorded!');
    }

    public function editAuthor(Author $author)
    {
        $books = Book::all();

        return view('editAuthor', compact('author', 'books'));
    }

    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->update($request->validated());

        return redirect()->back()->with('message', 'Author has been changed!');
    }

    public function delete(Author $author)
    {
        $author->delete();

        return redirect()->back();
    }

    public function search(Request $request)
    {
        $searchData = $request->get('search');

        if ($searchData == '' || $searchData == null) // ili if (count($cities) == 0)
        {
            return redirect()->back()->with('message', "Enter the author's name or last name!");
        }
        $searchAuthors = Author::with('books')->where('name', 'LIKE', "%$searchData%")
            ->orWhere('last_name', 'LIKE', "%$searchData%")->get();

        if (count($searchAuthors) == 0)
        {
            return redirect()->back()->with('message', "Author not found!");
        }

        return redirect()->route('author.all')->with('searchAuthors', $searchAuthors);
    }
}
