<?php

namespace App\Http\Controllers\Shop\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('shop.login');
    }

    public function handleLogin(Request $request)
    {

        $validatedData = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string',
        ]);

        $isRemember = $request->input('is_remember');


        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials, $isRemember)) {
            return redirect()->intended(route('shop.home', ['domain' => domain()]));
        }
        return redirect()->back()->withInput()->withErrors(['login_error' => ['Wrong email or password']]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('shop.home', ['domain' => domain()]);
    }
}
