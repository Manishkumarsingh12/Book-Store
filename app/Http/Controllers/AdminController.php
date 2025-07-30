<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function books()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('admin.book.index', compact('books', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.book.addbook', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $validation = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required'
        ]);

        Book::create($request->all());
        return redirect()->route('adminPage')->with('success', 'Book Added!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.book.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $validUser = $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'category_id' => 'required'
        ]);
        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect('adminbooks')->with('success', 'Book Updated!');
    }

    public function destroy($id)
    {
        Book::destroy($id);
        return redirect('adminbooks')->with('success', 'Book Deleted!');
    }


    public function category()
    {
        return view('admin.book.addCategory');
    }

    public function addcategory(Request $request)
    {
        $valided = $request->validate([
            'name' => 'required',
        ]);

        Category::create($request->all());
        return redirect()->route('adminbooks')->with('success', 'Category Added!');
    }
}