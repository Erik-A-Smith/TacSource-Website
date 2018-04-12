@extends('Layouts.main.main')

@push('css')
  <link href="{{ URL::asset('/css/Index/index.css') }}" rel="stylesheet" type="text/css" />
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

  <div class="row text-center">
    <div class="col-sm">
      <h2> Events </h2>
    </div>
  </div>
  <div class="row text-center">
    <div class="col-sm">
      <a type="button" href="/event/create" class="btn btn-success w-100">Create New</a>
    </div>
  </div>
  <div class="row">
    <div class="col-12">

      <!-- Nav tabs -->
      <ul class="nav nav-tabs text-center" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#Approved" role="tab">Approved</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Pending" role="tab">Pending</a>
        </li>
        @if(Auth::user() && Auth::user()->isModerator())
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Revoked" role="tab">Revoked</a>
        </li>
        @endif
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active" id="Approved" role="tabpanel">
          @foreach ($eventsApproved as $event)
          <div class="list-group-item flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <a href="/event/{{$event->id}}" ><h4 class="mb-1">{{$event->name}}</h4></a>
              <small>{{$event->date}}</small>
            </div>
            <p class="mb-1">{{$event->description}}</p>
            <div class="button-container float-right">
              @if(Auth::user()->isModerator())
                <form action="/event/{{$event->id}}/invalidate" method="post">
                  {{csrf_field()}}
                  <button type="submit" data-toggle="tooltip" data-placement="top" title="Inalidate Event"><i class="fa fa-ban" aria-hidden="true"></i></button>
                </form>
              @endif
            </div>
            <small>by <a href="/user/{{$event->Owner->id}}">{{$event->Owner->username}}</a></small>
          </div>
          @endforeach
        </div>

        <div class="tab-pane" id="Pending" role="tabpanel">
          @foreach ($eventsPending as $event)
          <div class="list-group-item flex-column align-items-start">
            <div class="d-flex w-100 justify-content-between">
              <a href="/event/{{$event->id}}" ><h4 class="mb-1">{{$event->name}}</h4></a>
              <small>{{$event->date}}</small>
            </div>
            <p class="mb-1">{{$event->description}}</p>
            <div class="button-container float-right">
              @if(Auth::user()->isModerator())
                <form action="/event/{{$event->id}}/validate" method="post">
                  {{csrf_field()}}
                  <button type="submit" data-toggle="tooltip" data-placement="top" title="Validate Event"><i class="fa fa-check" aria-hidden="true"></i></button>
                </form>
                <form action="/event/{{$event->id}}/invalidate" method="post">
                  {{csrf_field()}}
                  <button type="submit" data-toggle="tooltip" data-placement="top" title="Inalidate Event"><i class="fa fa-ban" aria-hidden="true"></i></button>
                </form>
              @endif
            </div>
            <small>by <a href="/user/{{$event->Owner->id}}">{{$event->Owner->username}}</a></small>
          </div>
          @endforeach
        </div>

        @if(Auth::user() && Auth::user()->isModerator())
          <div class="tab-pane" id="Revoked" role="tabpanel">
            @foreach ($eventsRevoked as $event)
            <div class="list-group-item flex-column align-items-start">
              <div class="d-flex w-100 justify-content-between">
                <a href="/event/{{$event->id}}" ><h4 class="mb-1">{{$event->name}}</h4></a>
                <small>{{$event->date}}</small>
              </div>
              <p class="mb-1">{{$event->description}}</p>
              <div class="button-container float-right">
                @if(Auth::user()->isModerator())
                  <form action="/event/{{$event->id}}/validate" method="post">
                    {{csrf_field()}}
                    <button type="submit" data-toggle="tooltip" data-placement="top" title="Validate Event"><i class="fa fa-check" aria-hidden="true"></i></button>
                  </form>
                @endif
              </div>
              <small>by <a href="/user/{{$event->Owner->id}}">{{$event->Owner->username}}</a></small>
            </div>
            @endforeach
          </div>
        @endif
      </div>

    </div>
  </div>

@endsection
