@extends('Layouts.main.main')

@push('css')
  <link href="{{ URL::asset('/css/Index/index.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<section class="py-5">
  <div class="container">
    <form class="" action="/user/reset" method="post">
      <input type="hidden" name="token" value="{{$token->token}}">
      {{csrf_field()}}
      <div class="form-group">
        <label for="exampleInputEmail1">New password</label>
        <input type="text" class="form-control" name="password" id="password" aria-describedby="emailHelp" placeholder="New password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if(isset($hash))
      <div class="form-group">
        <label for="exampleInputEmail1">Hash</label>
        <input type="text" class="form-control" name="password" id="password" aria-describedby="emailHelp" value="{{$hash}}">
      </div>
    @endif($hash)
  </div>
</section>
@endsection
