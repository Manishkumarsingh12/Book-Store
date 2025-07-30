@extends('layout.layoutpage')
@section('Title', 'User Page')
@section('Heading', 'User Page')
@section('Content')

    <h4 class="py-4">Welcome, {{ Auth::user()->name }} <a href="{{ route('logout') }}"
            class="btn btn-primary btn-sm">Logout</a></h4>
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

@endsection
