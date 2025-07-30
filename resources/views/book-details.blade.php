@extends('layout.layoutpage')
@section('Title', 'Book Page')
@section('Heading', 'Book Detals')
@section('Content')

    <a href="{{ route('userPage') }}" class="btn btn-primary">Back</a>

    <h6 class="py-3">Books Details :</h6>
    <p><strong>Title:</strong>{{ $book->title }}</p>
    <p><strong>Author:</strong> {{ $book->author }}</p>
    <p><strong>Description :</strong>{{ $book->description }}</p>
    <p><strong>Price:</strong> ₹ {{ $book->price }}</p>
@endsection
