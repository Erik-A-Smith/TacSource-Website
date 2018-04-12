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

    <div class="col-3">
      <a href="/admin/rank">
        <div class="card">
          <img src="https://arma3.com/assets/img/promo/low_logo.png" alt="Avatar" style="width:100%">
          <div class="container">
            <h4><b>Rank Manager</b></h4>
            <p>Manage rank points</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-3">
      <a href="/admin/eventType">
        <div class="card">
          <img src="https://arma3.com/assets/img/promo/low_logo.png" alt="Avatar" style="width:100%">
          <div class="container">
            <h4><b>Event Type Manager</b></h4>
            <p>Manage rewards from attendances</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-3">
      <a href="/admin/role">
        <div class="card">
          <img src="https://arma3.com/assets/img/promo/low_logo.png" alt="Avatar" style="width:100%">
          <div class="container">
            <h4><b>Role Manager</b></h4>
            <p>Manage rewards playing certain roles</p>
          </div>
        </div>
      </a>
    </div>

    <div class="col-3">
      <a href="/admin/promotion">
        <div class="card">
          <img src="https://arma3.com/assets/img/promo/low_logo.png" alt="Avatar" style="width:100%">
          <div class="container">
            <h4><b>Promotion Manager</b></h4>
            <p>See who is awaiting promotions!</p>
          </div>
        </div>
      </a>
    </div>


  </div>
</div>
@endsection
