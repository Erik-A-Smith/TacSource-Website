@extends('Layouts.main.main')

@push('css')
  <link href="{{ URL::asset('/css/Index/index.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('content')

@include('Index.carousel')
<section class="py-5">
  <div class="container">
    <h1>Welcome to TacSource!</h1>
    <p>
      We are a casual Mil-sim group for arma 3.<br />
      Our group runs regular weekly OP's and we are always seeking new talent!
    </p>
  </div>
</section>
@endsection
