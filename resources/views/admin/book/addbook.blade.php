@extends('layout.layoutpage')
@section('Title', 'Add Page')
@section('Content')

    <div class="col-5 mx-auto py-4 px-3 border mt-4 rounded">
        <h4 class="text-center text-danger">Login Form</h4>

        @if (session('register'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Registration Successfull !!",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif
        @if (session('loginPage'))
            <div class="alert alert-danger">{{ session('loginPage') }}</div>
        @endif

        <form action="{{ route('bookstore') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>


            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Author</label>
                    <input type="text" name="author" value="{{ old('author') }}"
                        class="form-control @error('author') is-invalid @enderror">
                    @error('author')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="" class="form-label">Catogery</label>
                    <select id="inputState" name="category_id"
                        class="form-select @error('category_id') is-invalid @enderror">
                        <option selected disabled>Choose...</option>
                        @foreach ($categories as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
            </div><br>

            <div class="row">
                <div class="col">
                    <label for="" class="form-label">Price</label>
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                        aria-label="First name">
                    @error('price')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="" class="form-label">Quantity</label>
                    <input type="text" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                        aria-label="First name">
                    @error('quantity')
                        <div class="text-danger">*{{ $message }}</div>
                    @enderror
                </div>
            </div><br>

            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea name="description" cols="60" rows="3"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror


            </div>

            <button type="submit" class="btn btn-primary">
                Submit
            </button>


        </form>
    </div>

@endsection
