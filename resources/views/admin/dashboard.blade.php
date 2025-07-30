@extends('layout.layoutpage')
@section('Title', 'Admin Page')
@section('Content')
    <h3 class="py-3">Admin Dashboard</h3>
    <a href="{{ route('adminbook') }}" class="btn btn-success">Manage Books</a>
    <a href="{{ route('logout') }}" class="btn btn-primary">Logout</a>
    <div class="mt-5 col-4 border py-3 px-4 ">
        <h6>Admin details :</h6>
        <p>Name: {{ Auth::user()->name }}</p>
        <p>Email: {{ Auth::user()->email }}</p>
    </div>
@endsection
