@extends('Layouts.main.main')

@push('css')
  <link href="{{ URL::asset('/css/Index/index.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<!--
  <input type="text" id="inputSearch" onkeyup="myFunction()" placeholder="Search for names..">

  <ul id="myUL">
  <li><a href="#">Adele</a></li>
  <li><a href="#">Agnes</a></li>

  <li><a href="#">Billy</a></li>
  <li><a href="#">Bob</a></li>

  <li><a href="#">Calvin</a></li>
  <li><a href="#">Christina</a></li>
  <li><a href="#">Cindy</a></li>
  </ul> -->

  <div class="row text-center">
    <div class="col-sm">
      <h2> Members </h2>
    </div>
  </div>
  <div class="row">
    <div class="col-sm">
      <div class="list-group">
        @php
        $listing = $users->groupBy("rank");
        $show = "show";
        @endphp
        <div id="accordion">
          @foreach ($listing as $userList)
            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn btn-link" data-toggle="collapse" data-target="#{{$userList->first()->Rank->name}}" style="color: {{$userList->first()->Rank->color}};" aria-expanded="true" aria-controls="collapseOne">
                    {{$userList->first()->Rank->name}}
                  </button>
                </h5>
              </div>

              <div id="{{$userList->first()->Rank->name}}" class="collapse {{$show}}" aria-labelledby="headingOne" data-parent="#accordion">

                @php
                  $show = "";
                @endphp
                <div class="card-body">
                  @foreach ($userList as $user)
                    <a href="/user/{{$user->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                      <div class="d-flex w-100 justify-content-between">
                        <h4  style="color: {{$userList->first()->Rank->color}};" class="mb-1">{{$user->username}}</h4>
                        <small>{{$user->Privilege->name}}</small>
                      </div>
                      <p style="color: {{$userList->first()->Rank->color}};" class="mb-1">{{$user->Rank->name}}</p>
                    </a>
                  @endforeach
                </div>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </div>
  </div>

@endsection
