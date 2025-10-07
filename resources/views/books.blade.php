@extends('layout')

@section('title')
    Books
@endsection

@section('pageContent')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <h1 class="display-2">All books</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Year of publication</th>
                        <th scope="col">Status</th>
                        <th scope="col">Author</th>
                    </tr>
                    </thead>
                    @foreach($books as $book)
                        <tbody>
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->genre }}</td>
                            <td>{{ $book->year_of_publication }}</td>
                            <td>{{ $book->status }}</td>
                            <td>{{ $book->author->name }} {{ $book->author->last_name }}</td>
                        </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection

