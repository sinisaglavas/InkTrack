@extends('layout')

@section('title')
    Authors
@endsection

@section('pageContent')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <form action="{{ route('author.search') }}" method="POST">
                    @csrf
                    <div class="input-group input-group-sm">
                        <input type="text" name="search" class="form-control"
                               placeholder="Enter the author's name or last name"
                               aria-label="Search author" required>
                        <input type="submit" class="btn btn-outline-secondary" value="Search">
                    </div>
                </form>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-4">
                <h1 class="display-2 text-center">All authors</h1>
            </div>
        </div>
        @if(session()->has('message'))
        <div class="row d-flex justify-content-center mt-2">
            <div class="col-6">
                <div class="alert alert-success text-center fw-bold fs-6">
                    {{ session()->get('message') }}
                </div>
            </div>
        </div>
        @endif
        @if(session('searchAuthors'))
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-6">
                    <div class="fw-lighter fs-6">Rezultat pretrage:</div>
                    <table class="table table-light">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Year of birth</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                        </thead>
                        @foreach(session('searchAuthors') as $author)
                            <tbody>
                            <tr>
                                <th scope="row">{{ $author->id }}</th>
                                <td>{{ $author->name }}</td>
                                <td>{{ $author->last_name }}</td>
                                <td>{{ $author->year_of_birth }}</td>
                                <td><a href="{{ route('author.edit', ['author' => $author->id]) }}" class="btn btn-warning"
                                       style="height: 20px; width: 40px"></a>
                                </td>
                                <td><a href="{{ route('author.delete', ['author' => $author->id]) }}" class="btn btn-danger"
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
            <div class="col-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Year of birth</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    @foreach($authors as $author)
                        <tbody>
                        <tr>
                            <th scope="row">{{ $author->id }}</th>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->last_name }}</td>
                            <td>{{ $author->year_of_birth }}</td>
                            <td><a href="{{ route('author.edit', ['author' => $author->id]) }}" class="btn btn-warning"
                                   style="height: 20px; width: 40px"></a>
                            </td>
                            <td><a href="{{ route('author.delete', ['author' => $author->id]) }}" class="btn btn-danger"
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
