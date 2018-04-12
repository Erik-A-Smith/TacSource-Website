@extends('Layouts.main.main')

@push('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/js/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
  $(function () {
     $(".form_datetime").datetimepicker({format: 'yyyy-mm-dd hh:ii'});
  });
</script>
@endpush

@push('css')
  <link href="{{ URL::asset('/css/Admin/index.css') }}" rel="stylesheet" type="text/css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="container">
  <div class="row align-center">
    <div class="col-12 text-center">
      <h2>Awaiting promotions!</h2>
    </div>
    <div class="col-12">
      <div class="list-group">
        @foreach ($users as $user)
          @if($user->Rank->hasNext())
            @if($user->Points() >= $user->Rank->next()->points)
            <a href="/user/{{$user->id}}" class="list-group-item">
              {{$user->username}}
            </a>
            @endif
          @endif
        @endforeach
      </div>
    </div>
  </div>
</div>
@endsection
