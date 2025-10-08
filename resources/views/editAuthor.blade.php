@extends('layout')

@section('title')
    Author Edit Form
@endsection

@section('pageContent')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6 mt-3">
                <h1 class="display-3 text-center">Edit author</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-4">
                <form action="{{ route('author.update', ['author' => $author->id]) }}" method="post">
                    @if($errors->any())
                        <p class="text-danger">Error: {{ $errors->first() }}</p>
                    @endif
                    @csrf
                    @method('PUT')
                        <label for="name">Name - <span class="fw-lighter fs-6">max length:64</span></label>
                        <input type="text" name="name" class="form-control" id="name" required
                           maxlength="64" value="{{ $author->name }}">
                        <label for="last-name">Last name - <span class="fw-lighter fs-6">max length:64</span></label>
                        <input type="text" name="last_name" class="form-control" id="last-name" required
                                   maxlength="64" value="{{ $author->last_name }}">
                        <label for="year-of-birth">Year of birth</label>
                        <select name="year_of_birth" class="form-select form-select-sm" id="year-of-birth"
                                aria-label=".form-select-sm example" required>
                            <option value="">-- Choose --</option>
                            @for($i=1900; $i<=(date('Y')-10); $i++)
                                <option value="{{ $i }}"{{ $i == $author->year_of_birth ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                        <button class="form-control mt-5">Sent data</button>
                </form>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-2">
            <div class="col-4">
                @if(session()->has('message'))
                    <div class="alert alert-success text-center fw-bold fs-6">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection




