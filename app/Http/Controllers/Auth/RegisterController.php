<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Http\Request;

use App\Providers\AuditServiceProvider;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function show(Request $request)
    {
      return view('Auth.register');
    }

    public function authenticate(Request $request)
    {
      $input = $request->only(["username", "password"]);
      if($this->create($input)){
        Auth::attempt($input);
        return redirect("/")->with('message', ['Account created successfully']);
      } else{
        return redirect("/register")->with('error', ['Username already in use!']);
      }
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if ($this->unique($data['username'])) {
          $user = User::create([
              'username' => $data['username'],
              'password' => bcrypt($data['password']),
              "rank" => 1,
              "base_rank" => 1,
              "privilege" => 1
          ]);

          AuditServiceProvider::accountCreated($user);

          return $user;
          
        } else{
          return false;
        }
    }

    protected function unique($username)
    {
        return count(User::where("username", $username)->get()) == 0;
    }
}
