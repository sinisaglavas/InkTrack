<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveAuthorRequest;
use App\Models\Author;

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

}
