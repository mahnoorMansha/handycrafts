<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();
        // dd($input); // Debugging statement
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Check if user exists and their status is not 'blocked'
        $user = User::where('email', $input['email'])->first();
        if ($user && $user->status !== 'blocked' && auth()->attempt(array('email'=>$input['email'], 'password'=>$input['password']))) {
            // dd(auth()->user()); // Debugging statement
            if (auth()->user() && auth()->user()->type === 'admin') {
                return redirect('/admin');
            } else {
                return redirect()->route('index')->with('success', 'You have been logged in successfully');
            }
        }
    
        return redirect()->route('signup')->with('error', 'Email-Address And Password Are Wrong.');
    }
    

}
