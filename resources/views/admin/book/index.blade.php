@extends('layout.layoutpage')
@section('Content')
    <a href="/admin/books/create" class="btn btn-success mb-3">Add New Book</a>
    <a href="{{ route('category') }}" class="btn btn-success mb-3">Add Category</a>
    <a href="{{ route('logout') }}" class="btn btn-primary mb-3">Logout</a>
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        @foreach ($books as $book)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->price }}</td>
                <td>
                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $book->id }}"
                        class="btn btn-primary btn-sm">View</a>
                    <a href="{{ route('editbook', ['id' => $book->id]) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/admin/books/{{ $book->id }}/delete" onClick="return confirm('Are Sure To Delete Record')"
                        class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $book->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title offset-4" id="exampleModalLabel">Single Record Show</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <div class="col">
                                <b>Title :</B> {{ $book->title }}
                            </div>
                            <br>
                            <div class="col">
                                <b> Author: </b>{{ $book->author }}
                            </div><br>

                            <div class="col">
                                <b>Description :</B> {{ $book->description }}
                            </div>
                            <br>
                            <div class="col">
                                <b> Price: </b>{{ $book->price }}
                            </div>
                            <br>
                            <div class="col">
                                <b> Quantity: </b>{{ $book->quantity }}
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </table>
@endsection
