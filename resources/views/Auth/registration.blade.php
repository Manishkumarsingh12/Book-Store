@extends('layout.layoutpage')
@section('Title', 'Registration Page')
@section('Content')

    <div class="col-5 mx-auto py-4 px-3 border mt-4 rounded">
        <h4 class="text-center text-danger">Registration Form</h4>
        {{-- <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> --}}
        @if (session('FailedRegister'))
            <div class="alert alert-danger">{{ session('FailedRegister') }}</div>
        @endif
        <form action="{{ route('signup') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" name="Name" value="{{ old('Name') }}"
                    class="form-control @error('Name') is-invalid @enderror">
                @error('Name')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" name="Email" value="{{ old('Email') }}"
                    class="form-control @error('Email') is-invalid @enderror">
                @error('Email')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}"
                    class="form-control @error('password_confirmation') is-invalid @enderror">
                @error('password_confirmation')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" name="password" value="{{ old('password') }}"
                    class="form-control @error('password') is-invalid @enderror">
                @error('password')
                    <div class="text-danger">*{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">
                Submit
            </button>


        </form>
    </div>

@endsection
