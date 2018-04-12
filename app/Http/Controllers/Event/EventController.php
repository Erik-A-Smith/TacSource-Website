<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

// Model inclusions
use App\Event;
use App\EventType;
use App\User;
use App\Role;
use App\Attendance;
use App\Status;

class EventController extends Controller
{
    public function index()
    {
      $eventsPending = Event::Pending()->orderBy('date',"desc")->get();
      $eventsApproved = Event::Approved()->orderBy('date',"desc")->get();
      $eventsRevoked = Event::Revoked()->orderBy('date',"desc")->get();
      // dd($eventsPending,$eventsApproved,$eventsRevoked);
      return view('Event.list',compact("eventsPending","eventsApproved","eventsRevoked"));
    }

    public function create()
    {
      $eventTypes = EventType::all();
      return view('Event.create', compact("eventTypes"));
    }

    public function store(Request $request)
    {
      $input = $request->only(['name', 'date','time', 'zone', 'mods', 'description',"type"]);
      $input["mods"] = $request->file('file');
      $input["owner"] = Auth::id();
      $input["status"] = Status::Pending()->id;
      $event = Event::create($input);
      return redirect()->route('eventShow',["event" => $event->id])->with("success",["Successfully created event!"]);
    }

    public function show(Request $request, Event $event)
    {
      $users = User::all();
      $roles = Role::all();
      return view('Event.show',compact("event","users","roles"));
    }

    public function edit(Request $request, Event $event)
    {
      if($event->Owner == Auth::user()){
        $eventTypes = EventType::all();
        return view('Event.edit',compact("event","eventTypes"));
      } else{
        return redirect()->route('eventShow',["event" => $event->id]);
      }
    }

    public function update(Request $request, Event $event)
    {
      $input = $request->only(['name', 'date','time', 'zone', 'mods', 'description',"type"]);
      $modfile = $request->file('file');
      $input["mods"] = $event->storeMod($event,$modfile);

      $event->fill($input);
      $event->save();
      return redirect()->route("eventShow",["event" => $event->id])->with("success",["Successfully edited event!"]);
    }

    public function attend(Request $request, Event $event)
    {
      if(!$event->Attending(Auth::user())){
        if($event->Owner == Auth::user()){
          return redirect()->route("eventShow",["event"=> $event->id])->with("error",["Of course you are attending, you are hosting it!"]);
        }

        $event->Attendances()->create([
          "attendee" => Auth::user()->id,
          "status" => Status::where("name", "Pending")->first()->id,
          "role" => Role::default()->id
        ]);
      }
      return redirect()->route("eventShow",["event"=> $event->id]);
    }

    public function unattend(Request $request, Event $event)
    {
      if($event->Attending(Auth::user())){
        $attendance = $event->Attendance(Auth::user());
        $attendance->delete();
      }
      return redirect()->route("eventShow",["event"=> $event->id]);
    }

    public function validateAttendance(Request $request, Attendance $attendance)
    {
      if(Auth::user()->isModerator()){
        $attendance->status = Status::Approved()->id;
        $attendance->save();
      }
      return redirect()->route("eventShow",["event"=> $attendance->event->id]);
    }

    public function invalidateAttendance(Request $request, Attendance $attendance)
    {
      if(Auth::user()->isModerator()){
        $attendance->status = Status::Revoked()->id;
        $attendance->save();
      }
      return redirect()->route("eventShow",["event"=> $attendance->event->id]);
    }

    public function validateEvent(Request $request, Event $event)
    {
      if(Auth::user()->isModerator()){
        $event->status = Status::Approved()->id;
        $event->save();
        return redirect()->route("eventList")->with("message",["Event Validated!"]);
      }
      return redirect()->route("eventList");
    }

    public function invalidateEvent(Request $request, Event $event)
    {
      if(Auth::user()->isModerator()){
        $event->status = Status::Revoked()->id;
        $event->save();
        return redirect()->route("eventList")->with("message",["Event Inalidated!"]);
      }
      return redirect()->route("eventList");
    }

    public function downloadMod(Request $request, Event $event)
    {
         return response()->download(storage_path('app/mods/' . $event->mods));
    }

    public function addPlayer(Request $request, Event $event)
    {
      if(Auth::user()->isModerator()){
        $input = $request->only(["playerAdded"]);
        foreach ($input["playerAdded"] as $key => $userId) {
          $user = User::findOrFail($userId);
          if(!$event->Attending($user) && $event->Owner != $user){
            $event->Attendances()->create([
              "attendee" => $user->id,
              "status" => Status::Approved()->id,
              "role" => Role::default()->id
            ]);
          }
        }
      }
    }

    public function changeRole(Request $request, Attendance $attendance)
    {
      if($attendance->Status->name == "Pending" && $attendance->User == Auth::user() ) {
        $input = $request->only(["role"]);
        $attendance->role = $input["role"];
        $attendance->save();
        return redirect()->route('eventShow',["event" => $attendance->Event->id])->with("success", ["Role Change Successfull!"]);
      } else if(Auth::user()->isModerator()) {
        $input = $request->only(["role"]);
        $attendance->role = $input["role"];
        $attendance->save();
        return redirect()->route('eventShow',["event" => $attendance->Event->id])->with("success", ["Role Change Successfull!"]);
      }
      return redirect()->route('eventShow',["event" => $attendance->Event->id]);
    }

    public function destroy(Request $request, Event $event)
    {
      if($event->Owner == Auth::user()){
        $event->delete();
        return redirect()->route('eventList')->with("success", ["Deleted event successfully!"]);
      }elseif(Auth::user()->isModerator()){
        $event->delete();
        return redirect()->route('eventList')->with("success", ["Deleted event successfully!"]);
      }
      return redirect()->route('eventShow',["event" => $event->id]);
    }

}
