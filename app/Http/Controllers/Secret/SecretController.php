<?php

namespace App\Http\Controllers\Secret;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SecretController extends Controller
{
    public function index()
    {
      return view('Secret.index');
    }

    public function generate(Request $request)
    {
      $passwordRaw = $request->only('password');
      $hash = bcrypt($passwordRaw['password']);
      return view('Secret.index',compact("hash"));
    }

}
