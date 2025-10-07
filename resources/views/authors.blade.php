@extends('layout')

@section('title')
    Authors
@endsection

@section('pageContent')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-2">
                <a type="button" href="{{ route('author.add') }}" class="btn btn-light btn-sm">Create New Author</a>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-4">
                <h1 class="display-2">All authors</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First name</th>
                        <th scope="col">Last name</th>
                        <th scope="col">Year of birth</th>
                    </tr>
                    </thead>
                    @foreach($authors as $author)
                        <tbody>
                        <tr>
                            <th scope="row">{{ $author->id }}</th>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->last_name }}</td>
                            <td>{{ $author->year_of_birth }}</td>
                        </tr>
                        </tbody>
                    @endforeach

                </table>
            </div>
        </div>
    </div>
@endsection
