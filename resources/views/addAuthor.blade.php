@extends('layout')

@section('title')
    Author Add Form
@endsection

@section('pageContent')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-6 mt-3">
                <h1 class="display-3 text-center">Create New author</h1>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6">
                <form action="{{ route('author.create') }}" method="post">
                    @if($errors->any())
                        <p class="text-danger">Greska: {{ $errors->first() }}</p>
                    @endif
                    @csrf
                    <label for="name">Name</label>
                    <div>
                        <input type="text" name="name" class="form-control" id="name" required
                               maxlength="64" value="{{ old('name') }}">
                    </div>
                    <label for="last-name">Last Name</label>
                    <div>
                        <input type="text" name="last_name" class="form-control mt-3 mb-3" id="last-name" required
                               maxlength="64" value="{{ old('last_name') }}">
                    </div>
                    <label for="year-of-birth">Year of birth</label>
                    <div>
                        <input type="number" name="year_of_birth" class="form-control" id="year-of-birth" required
                              min="1900" max="2025" value="{{ old('year_of_birth') }}">
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

