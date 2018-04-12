@extends('Layouts.main.main')

@push('css')
  <link href="{{ URL::asset('/css/Auth/login.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="container">
  <form class="form-signin text-center" action="/register" method="post">
    {{ csrf_field() }}
    <h2 class="form-signin-heading">Register</h2>
    <label for="inputUsername" class="sr-only">Username</label>
    <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required="" autofocus="">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <p>Have an account? Go <a href="/login">here</a></p>
  </form>
</div>
@endsection
