<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //  dD($request);
        $request->validate([
            'Email' => 'required',
            'Password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->Email, 'password' => $request->Password])) {
            // dd(Auth::user()->role);
            if (Auth::user()->role == 'admin') {
                return redirect()->route('adminPage');
            } else {
                return redirect()->route('userPage');
            }
        } else {
            return redirect()->route('loginPage')->with('loginFailed', 'Login Failed !!');
        }
    }

    public function userPage()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('Auth.userPage', compact('books', 'categories'));
    }



    public function loginPage()
    {
        return view('Auth.login');
    }



    public function signup(Request $request)
    {
        $validation = $request->validate([
            'Name' => 'required',
            'Email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            // 'password_confirmation' => 'required|min:6'
        ]);


        $register = User::create([
            'name' => $request->Name,
            'email' => $request->Email,
            'password' => $request->password
        ]);
        if ($register) {
            return redirect()->route('loginPage')->with('register', 'Registration Successfull !!');
        } else {
            return redirect()->route('register')->with('FailedRegister', 'Registration Failed !!');
        }
    }


    public function register()
    {
        return view('Auth.registration');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }
}