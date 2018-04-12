<?php

namespace App\Http\Controllers\EventType;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Model inclusions
use App\EventType;

class EventTypeController extends Controller
{
    public function index()
    {
      if(Auth::user()->isAdmin()){
        $eventTypes = eventType::all();
        return view('EventType.index',compact("eventTypes"));
      }
      return view('Index.index');
    }

    public function update(Request $request)
    {
      if(Auth::user()->isAdmin()){
        $input = $request->only("eventTypes","points");
        if( count($input["eventTypes"]) != count($input["points"]) ){
          return redirect()->route("eventTypeIndex")->with("error", ["Something when't really wrong, contact your programmer ASAP!"]);
        } else{
          foreach ($input["eventTypes"] as $key => $eventTypeId) {
            $EventType = EventType::findOrFail($eventTypeId);
            $EventType->points = $input["points"][$key];
            $EventType->save();
          }
          return redirect()->route("eventTypeIndex")->with("success", ["Saved successfully"]);
        }
      }
      return redirect()->route("home");
    }
}
