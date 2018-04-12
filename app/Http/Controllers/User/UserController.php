<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use carbon\carbon;

// Model inclusions
use App\User;
use App\Event;
use App\Rank;
use App\Privilege;
use App\ResetToken;

class UserController extends Controller
{
    public function index(Request $request)
    {
      $users = User::rankingOrder();
      return view('User.list',compact("users"));
    }

    public function admin(Request $request, User $user)
    {
      if(Auth::user()->isAdmin()){
        $ranks = Rank::all();
        $privileges = Privilege::all();
        return view('User.admin',compact("user","ranks","privileges"));
      } else{
        return redirect()->route('userShow',["user" => $user->id]);
      }
    }

    public function adminSave(Request $request, User $user)
    {
      if(Auth::user()->isAdmin()){
        $input = $request->only(["privilege", "rank","base_rank","username"]);
        $user->fill($input);
        $user->save();
        return redirect()->route("userShow",["user" => $user->id])->with("success",["Save successfull!"]);
      } else{
        return redirect()->route('userShow',["user" => $user->id]);
      }
    }

    public function show(Request $request, User $user)
    {
      return view('User.show',compact("user"));
    }

    public function edit(Request $request, User $user)
    {
      if($user->Owner == Auth::user()){
        return view('User.edit',compact("user"));
      } else{
        return redirect()->route('userShow',["user" => $user->id]);
      }
    }

    public function update(Request $request, User $user)
    {
      $input = $request->only(['name', 'date', 'zone', 'mods', 'description']);
      $user->fill($input);
      $user->save();
      return redirect()->route("userShow",["user" => $user->id])->with("success",["Successfully edited user!"]);
    }

    public function resetTokenRequest(Request $request, User $user)
    {
      if(Auth::user()->isAdmin()){
        $input["user"] = $user->id;
        $token = ResetToken::create($input);
        return $token;
      }
    }

    public function resetToken(Request $request, $resetToken)
    {
      $token = ResetToken::findByToken($resetToken);
      if($token->valid()){
        return view('User.reset',compact("token"));
      } else{
        return "Token expired!";
      }
    }

    public function resetTokenAction(Request $request)
    {
      $resetToken = $request->only(["token"]);

      //Find token
      $token = ResetToken::findByToken($resetToken);

      if($token->valid()){

        // Hash password
        $passwordRaw = $request->only('password');
        $hash = bcrypt($passwordRaw['password']);

        // Update user credentials
        $user = $token->User;
        $user->password = $hash;
        $user->save();

        // Attempt login
        $userInfo["username"] =  $user->username;
        $userInfo["password"] = $hash;

        // Redirect
        return redirect()->route("login")->with("success",["Successfully changed Password!"]);
      } else{
        return "Token expired!";
      }
    }

}
