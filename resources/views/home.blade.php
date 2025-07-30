@extends('layout.layoutpage')
@section('Title', 'Home Page')
@section('Heading', 'Online Book Store')
@section('Content')
    <h2>Our Books (Database)</h2>
    <div class="row">
        @foreach ($books as $book)
            <div class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5>{{ $book->title }}</h5>
                        <p>By {{ $book->author }}</p>
                        <p>₹ {{ $book->price }}</p>
                        <a href="/book/{{ $book->id }}" class="btn btn-primary btn-sm">View</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <hr>

    <h2>Google Books API Data</h2>
    <ul>
        @foreach ($booksApi['items'] as $apiBook)
            <li>{{ $apiBook['volumeInfo']['title'] ?? 'No Title' }}</li>
        @endforeach
    </ul>
@endsection
