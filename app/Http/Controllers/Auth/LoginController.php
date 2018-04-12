<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
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
     * Where to redirect users all the time.
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

    public function show()
    {
      return view('Auth.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $input = $request->only(['username', 'password']);
        if (Auth::attempt($input)) {
            return redirect($this->redirectTo);
        } else {
            return redirect("/login")->with('error', ['Failed to authenticate.']);
        }
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect($this->redirectTo)->with("Goodbye!");
    }
}
