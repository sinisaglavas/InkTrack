@extends('layout')

@section('title')
    Books
@endsection

@section('pageContent')
    <style>
        .pagination .page-link {
            color: black !important; /* Boja brojeva */
        }

        .pagination .page-item.active .page-link {
            background-color: #ffc107 !important; /* Boja aktivne stranice */
            border-color: #ffc107 !important;
            color: white !important;
        }

        .pagination .page-item.disabled .page-link {
            color: grey !important; /* Boja disable-ovanih linkova */
        }
    </style>

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6">
                <form action="{{ route('book.search') }}" method="POST">
                    @csrf
                    <div class="input-group input-group-sm">
                        <input type="text" name="search" class="form-control"
                               placeholder="Enter the name, genre or year of publication"
                               aria-label="Search book" required>
                        <input type="submit" class="btn btn-outline-secondary" value="Search">
                    </div>
                </form>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-4">
                <h1 class="display-2 text-center">All books</h1>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="row d-flex justify-content-center mt-2">
                <div class="col-10">
                    <div class="alert alert-success text-center fw-bold fs-6">
                        {{ session()->get('message') }}
                    </div>
                </div>
            </div>
        @endif
        @if(session('searchBooks'))
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-10">
                    <div class="fw-lighter fs-6">Rezultat pretrage:</div>
                    <table class="table table-light">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Genre</th>
                            <th scope="col">Year of publication</th>
                            <th scope="col">Status</th>
                            <th scope="col">Author</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        @foreach(session('searchBooks') as $book)
                            <tbody>
                            <tr>
                                <th scope="row">{{ $book->id }}</th>
                                <td>{{ $book->title }}</td>
                                <td>{{ $book->genre }}</td>
                                <td>{{ $book->year_of_publication }}</td>
                                @if( $book->status == 1)
                                    <td>Available</td>
                                @else
                                    <td>Not available</td>
                                @endif
                                @if(isset($book->author->name) && isset($book->author->last_name))
                                    <td>{{ $book->author->name }} {{ $book->author->last_name }}</td>
                                @else
                                    <td>Author is deleted</td>
                                @endif
                                <td><a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-warning"
                                       style="height: 20px; width: 40px"></a>
                                </td>
                                <td><a href="{{ route('book.delete', ['book' => $book->id]) }}" class="btn btn-danger"
                                       style="height: 20px; width: 40px"></a>
                                </td>
                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        @endif
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-10">
                {{ $books->links('pagination::bootstrap-4') }}
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Year of publication</th>
                        <th scope="col">Status</th>
                        <th scope="col">Author</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    @foreach($books as $book)
                        <tbody>
                        <tr>
                            <th scope="row">{{ $book->id }}</th>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->genre }}</td>
                            <td>{{ $book->year_of_publication }}</td>
                            @if( $book->status == 1)
                                <td>Available</td>
                            @else
                                <td>Not available</td>
                            @endif
                            @if(isset($book->author->name) && isset($book->author->last_name))
                            <td title="Born in: {{ $book->author->year_of_birth }}">{{ $book->author->name }} {{ $book->author->last_name }}</td>
                            @else
                                <td>Author is deleted</td>
                            @endif
                            <td><a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-warning"
                                   style="height: 20px; width: 40px"></a>
                            </td>
                            <td><a href="{{ route('book.delete', ['book' => $book->id]) }}" class="btn btn-danger"
                                   style="height: 20px; width: 40px"></a>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection

