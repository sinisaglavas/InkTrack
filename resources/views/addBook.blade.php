@extends('layout')

@section('title')
    Book Add Form
@endsection

@section('pageContent')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6 mt-3">
                <h1 class="display-3 text-center">Create New book</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <form action="{{ route('book.create') }}" method="post">
                    @if($errors->any())
                        <p class="text-danger">Error: {{ $errors->first() }}</p>
                    @endif
                    @csrf
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" id="title" required
                                maxlength="191" value="{{ old('title') }}">
                        <div class="row mt-3">
                            <div class="col-6">
                                <label for="year-of-publication">Year of publication</label>
                                <select name="year_of_publication" class="form-select form-select-sm"
                                        aria-label=".form-select-sm example" required>
                                    <option value="">-- Choose --</option>
                                    @for($i=1500; $i<=date('Y'); $i++)
                                        <option value="{{ $i }}">
                                            {{ $i }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="genre">Genre</label>
                                <select name="genre" class="form-select form-select-sm" id="genre"
                                        aria-label=".form-select-sm example" required>
                                    <option value="">-- Choose --</option>
                                    <option value="Mistery">Mystery</option>
                                    <option value="Action/Adventure">Action/Adventure</option>
                                    <option value="Fantasy">Fantasy</option>
                                    <option value="Romance">Romance</option>
                                    <option value="Horror">Horror</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-3">
                            <div class="row">
                                <div class="col-6">
                                    <label for="author">Author</label>
                                    <select name="author_id" class="form-select form-select-sm" id="author"
                                            aria-label=".form-select-sm example" required>
                                        <option value="">-- Choose --</option>
                                        @foreach($authors as $author)
                                            <option value="{{ $author->id }}">
                                                {{ $author->name }}  {{ $author->last_name }} {{ $author->year_of_birth }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-select form-select-sm" id="status"
                                            aria-label=".form-select-sm example" required>
                                        <option value="">-- Choose --</option>
                                        <option value="1">Available</option>
                                        <option value="0">Not available</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <button class="form-control mt-5">Sent data</button>
                </form>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-2">
            <div class="col-6">
                @if(session()->has('message'))
                    <div class="alert alert-success text-center fw-bold fs-6">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection


