@extends('Layouts.main.main')

@push('js')
@endpush

@push('css')
@endpush

@section('content')
<div class="container">
  <form action="/admin/role/update" method="post">
    {{csrf_field()}}
    <div class="row text-center">
      <div class="col-12">
        <h2>Role Types</h2>
      </div>
    </div>
    <div class="row align-center">
      <div class="col-12">
          <ul class="list-group">
            @foreach ($roles as $role)
              <li class="list-group-item">
                <span class="float-left">{{$role->name}}</span>
                <input type="hidden" name="roles[]" value="{{$role->id}}">
                <span class="float-right">
                  <label> Points gained for being role:</label>
                  <input type="number" name="points[]" value="{{$role->points}}">
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
