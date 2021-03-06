<?php

namespace App\Http\Controllers\Rank;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Model inclusions
use App\Rank;

use App\Providers\AuditServiceProvider;

class RankController extends Controller
{
    public function index()
    {
      if(Auth::user()->isAdmin()){
        $enlistedRanks = Rank::enlistedRanks();
        $officerRanks = Rank::officerRanks();
        return view('Rank.index',compact("enlistedRanks","officerRanks"));
      }
      return view('Index.index');
    }

    public function update(Request $request)
    {
      if(Auth::user()->isAdmin()){
        $input = $request->only("ranks","points","colors");

        if( count($input["ranks"]) != count($input["points"]) || count($input["ranks"]) != count($input["colors"]) ) {
          return redirect()->route("rankIndex")->with("error", ["Something when't really wrong, contact your programmer ASAP!"]);
        } else{
          foreach ($input["ranks"] as $key => $rankId) {
            $rank = Rank::findOrFail($rankId);

            if($input["points"][$key] != $rank->points){
              AuditServiceProvider::rankPointChange(Auth::User(),$rank, $rank->points,$input["points"][$key]);
            }

            $rank->points = $input["points"][$key];
            $rank->color = $input["colors"][$key];
            $rank->save();
          }
          return redirect()->route("rankIndex")->with("success", ["Saved successfully"]);
        }
      }
      return redirect()->route("home");
    }
}
