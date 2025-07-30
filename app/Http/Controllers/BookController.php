<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        // Fetch books from your database
        $books = Book::all();

        // Fetch data from Google Books API
        $apiData = file_get_contents('https://www.googleapis.com/books/v1/volumes?q=harry+potter');
        $booksApi = json_decode($apiData, true);

        // Pass both to the view
        return view('home', compact('books', 'booksApi'));
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('book-details', compact('book'));
    }
}