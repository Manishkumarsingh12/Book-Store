@extends('layout.layoutpage')
@section('Title', 'Add Categoriess Page')
@section('Content')

    <div class="col-5 mx-auto py-4 px-3 border mt-4 rounded">
        <h4 class="text-center text-danger">Add Categories</h4>

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

        <form action="{{ route('addcategory') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Add Category</label>
                <input type="text" name="name" value="{{ old('name') }}"
                    class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                Submit
            </button>


        </form>
    </div>

@endsection
