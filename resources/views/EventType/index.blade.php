@extends('Layouts.main.main')

@push('js')
@endpush

@push('css')
@endpush

@section('content')
<div class="container">
  <form action="/admin/eventType/update" method="post">
    {{csrf_field()}}
    <div class="row text-center">
      <div class="col-12">
        <h2>Event Types</h2>
      </div>
    </div>
    <div class="row align-center">
      <div class="col-12">
          <ul class="list-group">
            @foreach ($eventTypes as $eventType)
              <li class="list-group-item">
                <span class="float-left">{{$eventType->name}}</span>
                <input type="hidden" name="eventTypes[]" value="{{$eventType->id}}">
                <span class="float-right">
                  <label> Points gained per attendance:</label>
                  <input type="number" name="points[]" value="{{$eventType->points}}">
                </span>
              </li>
            @endforeach
          </ul>
      </div>
    </div>
    <button type="submit" class="btn btn-success w-100 mt-1">Update</button>
  </form>
</div>
@endsection
