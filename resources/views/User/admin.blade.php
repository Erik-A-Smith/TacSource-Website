@extends('Layouts.main.main')

@push('js')
<script type="text/javascript" src="{{ URL::asset('/js/User/admin.js') }}"></script>
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
  <form action="/user/{{$user->id}}/admin" method="post">
    {{csrf_field()}}
    <div class="row">
      <div class="col-12 text-center">
        <h1>Profile</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
          <button type="submit" class="btn btn-success w-100">Save</button>
      </div>
    </div>

    <!-- 1 -->
    <div class="row">
      <div class="col-3">
        Username
      </div>
      <div class="col-9">
        <div class="form-group">
          <input type="text" class="form-control" name="username" aria-describedby="emailHelp" value="{{$user->username}}">
        </div>
        <p></p>
      </div>
    </div>

    <!-- 2 -->
    <div class="row">
      <div class="col-3">
        Privilege
      </div>
      <div class="col-9">
        <div class="form-group">
          <select class="form-control" selected="{{$user->Rank->id}}" name="privilege">
            @foreach ($privileges as $privilege)
              @if($user->Privilege->id == $privilege->id)
                <option value="{{$privilege->id}}" selected>{{$privilege->name}}</option>
              @else
                <option value="{{$privilege->id}}">{{$privilege->name}}</option>
              @endif
            @endforeach
          </select>
        </div>
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
        <div class="form-group">
          <select class="form-control" selected="{{$user->Rank->id}}" name="rank">
            @foreach ($ranks as $rank)
              @if($user->Rank->id == $rank->id)
              <option value="{{$rank->id}}" selected>{{$rank->name}}</option>
              @else
              <option value="{{$rank->id}}">{{$rank->name}}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <!-- 2 -->
    <div class="row">
      <div class="col-3">
        Base Rank <br /><strong>(If the user has a rank prior to joining the website, they will gain its base amount of points)</strong>
      </div>
      <div class="col-9">
        <div class="form-group">
          <select class="form-control" selected="{{$user->BaseRank->id}}" name="base_rank">
            @foreach ($ranks as $rank)
              @if($user->BaseRank->id == $rank->id)
              <option value="{{$rank->id}}" selected>{{$rank->name}}</option>
              @else
              <option value="{{$rank->id}}">{{$rank->name}}</option>
              @endif
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <br />

    <!-- 2 -->
    <div class="row">
      <div class="col-3">
        Ops Attended
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
        Ops Hosted
      </div>
      <div class="col-9">
        @if( count($user->Attendances) == 0)
          <div class="alert alert-warning">
            Not hosted any events!
          </div>
        @else
          <ul class="list-group attendanceContainer">
            @foreach ($user->Hosted() as $event)
              <a href="/event/{{$attendance->Event->id}}">
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
  </form>

  <div class="row">
    <div class="col-12">
        <button type="button" id="passwordResetBtn" onCLick="passwordReset({{$user->id}})" class="btn btn-primary w-100">Request Password Reset</button>
        <div id="resetUrlInfo" style="display:none;">
          <h2>Only valid for 24h</h2>
          <p id="resetUrl"></p>
        </div>
    </div>
  </div>

</div>
@endsection
