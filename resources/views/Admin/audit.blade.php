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
  <h2 class="col-12 text-center">Audit log</h2>

  @if(count($auditLogs) == 0)
  <div class="card">
    <div class="card-header text-center">
      No audit logs yet!
    </div>
  </div>
  @endif

  @foreach ($auditLogs as $auditLog)
  <div class="card">
    <div class="card-header">
      {{$auditLog->type}}
    </div>
    <div class="card-body">
      <h5 class="card-title"><a href="{{$baseUrl}}/user/{{$auditLog->Owner->id}}">{{$auditLog->Owner->username}}</a></h5>
      <p class="card-text">{!!$auditLog->text !!}</p>
      <i class="card-text">{{$auditLog->created_at }}</i>
    </div>
  </div>
  @endforeach

</div>
@endsection
