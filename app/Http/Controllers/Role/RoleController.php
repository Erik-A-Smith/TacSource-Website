<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Model inclusions
use App\Role;

use App\Providers\AuditServiceProvider;

class RoleController extends Controller
{
    public function index()
    {
      if(Auth::user()->isAdmin()){
        $roles = Role::all();
        return view('Role.index',compact("roles"));
      }
      return view('Index.index');
    }

    public function update(Request $request)
    {
      if(Auth::user()->isAdmin()){
        $input = $request->only("roles","points");
        if( count($input["roles"]) != count($input["points"]) ){
          return redirect()->route("roleIndex")->with("error", ["Something when't really wrong, contact your programmer ASAP!"]);
        } else{
          foreach ($input["roles"] as $key => $roleId) {
            $Role = Role::findOrFail($roleId);

            if($input["points"][$key] != $Role->points){
              AuditServiceProvider::rolePointChange(Auth::User(),$Role, $Role->points,$input["points"][$key]);
            }

            $Role->points = $input["points"][$key];
            $Role->save();
          }
          return redirect()->route("roleIndex")->with("success", ["Saved successfully"]);
        }
      }
      return redirect()->route("home");
    }
}
