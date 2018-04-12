@extends('Layouts.main.main')

@push('js')
@endpush

@push('css')
@endpush

@section('content')
<div class="container">
  <form action="/admin/rank/update" method="post">
    {{csrf_field()}}
    <div class="row text-center">
      <div class="col-12">
        <h2>Ranks</h2>
      </div>
    </div>
    <div class="row align-center">
      <div class="col-12">
          <ul class="list-group">
            @foreach ($ranks as $rank)
              <li class="list-group-item">
                <span class="float-left">{{$rank->name}}</span>
                <input type="hidden" name="ranks[]" value="{{$rank->id}}">
                <span class="float-right">
                  <input type="number" name="points[]" value="{{$rank->points}}">
                </span>
                <span class="float-right">
                  <input type="color" name="colors[]" value="{{$rank->color}}">
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
