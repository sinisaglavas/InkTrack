<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">Ink Track</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('author.all') }}">Authors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('book.all') }}">Books</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" href="{{ route('author.add') }}">New Author</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" type="button" href="{{ route('book.add') }}">New Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


