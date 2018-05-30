@extends('Layouts.main.main')

@push('js')
@endpush

@push('css')
  <link href="{{ URL::asset('/css/User/show.css') }}" rel="stylesheet" type="text/css" />
  <style>
    .row{
      margin-top: 5px;
      margin-bottom: 5px;
    }
  </style>
@endpush

@section('content')
<div class="container">

  <div class="row">
    <div class="col-12 text-center">
      <h1>Profile</h1>
    </div>
  </div>

  <!-- 1 -->
  @if(Auth::user() && Auth::user()->isAdmin())
    <div class="row">
      <div class="col-12">
          <a type="button" href="/user/{{$user->id}}/admin" class="btn btn-primary w-100" disabled>Admin Edit</a>
      </div>
    </div>
  @endif

  <!-- 1 -->
  <div class="row">
    <div class="col-3">
      Username
    </div>
    <div class="col-9">
      <p>{{$user->username}}</p>
    </div>
  </div>

  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Privilege 
    </div>
    <div class="col-9">
      @if(isset($user->Privilege->name) && $user->Privilege->name != NULL)
        <p>{{$user->Privilege->name}}</p>
      @else
        <p>N/A</p>
      @endif
    </div>
  </div>

  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Created
    </div>
    <div class="col-9">
      <p>{{$user->created_at}}</p>
    </div>
  </div>

  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Rank
    </div>
    <div class="col-9">
      <p>{{$user->Rank->name}}</p>
    </div>
  </div>


  @if(Auth::user() && Auth::user()->isAdmin())
  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Base Rank <br /><strong>(If the user has a rank prior to joining the website, they will gain its base amount of points)</strong>
    </div>
    <div class="col-9">
      <p>{{$user->BaseRank->name}}</p>
    </div>
  </div>
  <br />
  @endif

  <!-- 2 -->
  <div class="row">
    <div class="col-3">

      @if($user->Rank->hasNext())
        <p>Experience till {{$user->Rank->next()->name}}</p>
      @else
        <p>Experience</p>
      @endif

    </div>

    <div class="col-9">
      @if($user->Rank->hasNext())
      @if($user->Points() <= $user->Rank->next()->points)
      <div class="progress">
        <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar"
          aria-valuenow="{{$user->Points() - $user->Rank->points}}"
          aria-valuemin="0"
          aria-valuemax="{{$user->Rank->next()->points}}"
          style="width:{{ ( ($user->Points() - $user->Rank->points) / ($user->Rank->next()->points - $user->Rank->points) ) * 100}}%">
        </div>
      </div>
      <p>{{$user->Points()}} /  {{$user->Rank->next()->points}}</p>
      @else
      <div class="progress">
        <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar"
          aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
        </div>
      </div>
      <p>{{$user->Points()}} /  {{$user->Rank->next()->points}}</p>
      @endif

      @else
        <p>{{$user->Points()}}</p>
      @endif
    </div>

  </div>
  <br />

  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Events Attended
    </div>
    <div class="col-9">
      @if( count($user->Attendances) == 0)
        <div class="alert alert-warning">
          Not attended any events!
        </div>
      @else
        <ul class="list-group attendanceContainer">
          @foreach ($user->Attendances as $attendance)
            <a href="/event/{{$attendance->Event->id}}">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$attendance->Event->name}}

                @if($attendance->Status->name == "Pending")
                  <span class="badge badge-warning badge-pill">{{$attendance->Status->name}}</span>
                @elseif($attendance->Status->name == "Approved")
                  <span class="badge badge-success badge-pill">{{$attendance->Status->name}}</span>
                @elseif($attendance->Status->name == "Revoked")
                  <span class="badge badge-danger badge-pill">{{$attendance->Status->name}}</span>
                @endif

                @if($attendance->Event->Owner == Auth::user())
                  <span class="badge badge-primary badge-pill">Host</span>
                @else
                  <span class="badge badge-primary badge-pill">Player</span>
                @endif
              </li>
            </a>
          @endforeach
        </ul>
      @endif

    </div>
  </div>

  <!-- 2 -->
  <div class="row">
    <div class="col-3">
      Events Hosted
    </div>
    <div class="col-9">
      @if( count($user->Hosted()) == 0)
        <div class="alert alert-warning">
          Not hosted any events!
        </div>
      @else
        <ul class="list-group attendanceContainer">
          @foreach ($user->Hosted() as $event)
            <a href="/event/{{$event->id}}">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                {{$event->name}}
                <span class="badge badge-primary badge-pill">Host</span>
              </li>
            </a>
          @endforeach
        </ul>
      @endif
    </div>
  </div>
@endsection
