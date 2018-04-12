@extends('Layouts.main.main')

@push('js')
<script type="text/javascript" src="{{ URL::asset('/js/Event/event.js')}}"></script>
<script>
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();
  });
</script>
@endpush

@push('css')
  <link href="{{ URL::asset('/css/Event/show.css') }}" rel="stylesheet" type="text/css" />
  <style>
  .button-container form,
  .button-container form div {
    display: inline;
  }

  .button-container button {
    display: inline;
    vertical-align: middle;
  }
  </style>
@endpush

@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <h1>{{$event->name}}</h1>
    </div>
  </div>

  <!-- 1 -->
  @if($event->Owner == Auth::user())
    <div class="row">
      <div class="col-12">
          <a type="button" href="/event/{{$event->id}}/edit" class="btn btn-primary w-100">Edit your event</a>
      </div>
    </div>
  @endif

  <!-- 1 -->
  <div class="row">
    <div class="col-3">
      Status
    </div>
    <div class="col-9">
      <p>{{$event->Status->name}}</p>
    </div>
  </div>

  <!-- 1 -->
  <div class="row">
    <div class="col-3">
      Description
    </div>
    <div class="col-9">
      <p>{{$event->description}}</p>
    </div>
  </div>

  <!-- 1 -->
  <div class="row">
    <div class="col-3">
      Type
    </div>
    <div class="col-9">
      <p>{{$event->Type->name}}</p>
    </div>
  </div>

  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Date
    </div>
    <div class="col-9">
      <p>{{$event->date}}</p>
    </div>
  </div>

  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Time
    </div>
    <div class="col-9">
      @if($event->time != null)
      <p>{{$event->time}} in {{$event->zone}} </p>
      @else
      <p>No time picked for this event</p>
      @endif
    </div>
  </div>

  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Hosted by
    </div>
    <div class="col-9">
      <p><a href="/user/{{$event->Owner->id}}">{{$event->Owner->username}}</a></p>
    </div>
  </div>
  <!-- 2 -->
  <div class="row mb-3">
    <div class="col-3">
      Mods
    </div>
    <div class="col-9">
      @if($event->mods != null)
        <a href="/event/{{$event->id}}/downloadMod">Download</a>
      @else
        <p>No Mods for this event</p>
      @endif
    </div>
  </div>

  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Attendance
    </div>

    <div class="col-9">
      @if(Auth::user()->isModerator())
          <button type="button" data-toggle="modal" data-target="#addPlayer" class="btn btn-warning w-100">Add player</button>
      @endif

      @if($event->Owner != Auth::user() )
        @if(!$event->attending(Auth::user()) )
        <form action="/event/{{$event->id}}/attendance/attend" method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-primary w-100">Attend this event!</button>
        </form>
        @else
        <form action="/event/{{$event->id}}/attendance/unattend" method="post">
          {{csrf_field()}}
          <button type="submit" class="btn btn-danger w-100">Cancel my attendance</button>
        </form>
        @endif
      @endif

      <br />



      <div class="list-group">
        @foreach ($event->Attendances as $attendance)
        <div href="#" class="list-group-item flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><a href="/user/{{$attendance->User->id}}">{{$attendance->User->username}}</a></h5>
            <small class="text-muted">
              <span class="badge badge-primary badge-pill">{{$attendance->User->Rank->name}}</span>
            </small>
          </div>
          <p class="mb-1 text-center">
            @if($attendance->Status->name == "Pending")
              <span id="attendance_{{$attendance->id}}" class="badge badge-warning badge-pill">{{$attendance->Status->name}}</span>
            @elseif($attendance->Status->name == "Approved")
              <span id="attendance_{{$attendance->id}}" class="badge badge-success badge-pill">{{$attendance->Status->name}}</span>
            @elseif($attendance->Status->name == "Revoked")
              <span id="attendance_{{$attendance->id}}" class="badge badge-danger badge-pill">{{$attendance->Status->name}}</span>
            @endif
            <br />

            @if(Auth::user()->isModerator())
              <!-- <form class="" action="/event/attendance/{{$attendance->id}}/changeRole" method="post"> -->
                <!-- {{csrf_field()}} -->
                <select class="form-control" name="role" onchange="changeRole('{{$attendance->id}}',this.value)">
                  @foreach ($roles as $role)
                    @if($attendance->Role->id == $role->id)
                      <option value="{{$role->id}}" selected>{{$role->name}}</option>
                    @else
                      <option value="{{$role->id}}">{{$role->name}}</option>
                    @endif
                  @endforeach
                </select>
              <!-- </form> -->
            @elseif($attendance->Status->name == "Pending" && $attendance->User->id == Auth::user()->id)
            <!-- <form class="" action="/event/attendance/{{$attendance->id}}/changeRole" method="post"> -->
              <!-- {{csrf_field()}} -->
              <select class="form-control" name="role" onchange="changeRole('{{$attendance->id}}',this.value)">
                @foreach ($roles as $role)
                  @if($attendance->Role->id == $role->id)
                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                  @else
                    <option value="{{$role->id}}">{{$role->name}}</option>
                  @endif
                @endforeach
              </select>
            <!-- </form> -->
            @else
              <p>{{$attendance->Role->name}}</p>
            @endif

          </p>
          <div class="button-container">
            @if(Auth::user()->isModerator())

              <button type="button" onclick="validateAttendance({{$attendance->id}})" data-toggle="tooltip" data-placement="top" title="Validate Attendance"><i class="fa fa-check" aria-hidden="true"></i></button>
              <button type="button" onclick="invalidateAttendance({{$attendance->id}})" data-toggle="tooltip" data-placement="top" title="Invalidate Attendance"><i class="fa fa-ban" aria-hidden="true"></i></button>

              <!-- <form action="/event/attendance/{{$attendance->id}}/validate" method="post">
                {{csrf_field()}}
                <button type="submit" data-toggle="tooltip" data-placement="top" title="Validate Attendance"><i class="fa fa-check" aria-hidden="true"></i></button>
              </form>
              <form action="/event/attendance/{{$attendance->id}}/invalidate" method="post">
                {{csrf_field()}}
                <button type="submit" data-toggle="tooltip" data-placement="top" title="Invalidate Attendance"><i class="fa fa-ban" aria-hidden="true"></i></button>
              </form> -->


            @endif
          </div>
          </small>
        </div>
        @endforeach
      </div>
    </div>
  </div>

</div>
@endsection

@push("modal")
<!-- Modal -->
<div class="modal fade" id="addPlayer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Player</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- <form class="" action="/event/{{$event->id}}/addPlayer" method="post"> -->
        <!-- {{csrf_field()}} -->
        <ul class="list-group addPlayerListing">
          @foreach ($users as $user)
            <li class="list-group-item w-100 user-li-{{$user->id}}" value="{{$user->id}}">
              <button type="button" name="playerAdded" onclick="toggleActive('user-li-{{$user->id}}')" style="width: 100%;" class="btn btn-light">{{$user->username}}</button>
            </li>
          @endforeach
        </ul>
      <!-- </form> -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="addPlayer({{$event->id}})" onCLick="addPlayers" data-dismiss="modal">Add Players</button>
      </div>
    </div>
  </div>
</div>
@endpush
