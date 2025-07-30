@extends('layout.layoutpage')
@section('Title', 'Login Page')
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

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="Email" value="{{ old('Email') }}"
                    class="form-control @error('Email') is-invalid @enderror">
                @error('Email')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="Password" value="{{ old('Password') }}"
                    class="form-control @error('Password') is-invalid @enderror">
                @error('Password')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>


        </form>
    </div>

@endsection
