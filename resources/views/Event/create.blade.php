@extends('Layouts.main.main')

@push('js')
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

  <script type="text/javascript">
    $('.date').datepicker({format: 'yyyy-mm-dd'});
  </script>
@endpush

@push('css')
  <link href="{{ URL::asset('/css/Index/index.css') }}" rel="stylesheet" type="text/css" />
  <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/css/bootstrap-datetimepicker.css" rel="stylesheet" type="text/css" /> -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css" rel="stylesheet" type="text/css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
@endpush

@section('content')
<div class="container">
  <form action="/event/create" method="post" enctype="multipart/form-data">
    {{ csrf_field()}}
    <!-- Titles -->
    <div class="row text-center">
      <div class="col-5">
        <h2>Labels</h2>
        <h4>
      </div>
      <div class="col-7">
        <h2>Data</h2>
      </div>
    </div>

    <!-- Data -->

    <!-- 1 -->
    <div class="row">
      <div class="col-5">
        <label for="usr">Name:</label>
      </div>
      <div class="col-7">
        <input type="text" class="form-control" name="name" required>
      </div>
    </div>


    <!-- 1 -->
    <div class="row">
      <div class="col-5">
        <label for="usr">Description:</label>
      </div>
      <div class="col-7">
        <div class="form-group">
          <textarea class="form-control" rows="5" name="description"></textarea>
        </div>
      </div>
    </div>
    <hr />

    <!-- 3 -->
    <div class="row">
      <div class="col-5">
        <label for="usr">Type</label>
      </div>
      <div class="col-7">
        <div class="form-group">
          <select class="form-control" id="sel1" name="type" required>
            @foreach ($eventTypes as $eventType)
            <option value="{{$eventType->id}}">{{$eventType->name}}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>

    <!-- 2 -->
    <div class="row">
      <div class="col-5">
        <label for="usr">Date:</label>
      </div>
      <div class="col-7">
        <div class="input-group date">
          <input type="text" class="form-control" name="date"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
        </div>
      </div>
    </div>

    <!-- 2 -->
    <div class="row">
      <div class="col-5">
        <label for="usr">Time:</label>
      </div>
      <div class="col-7">
        <input type='text' class="form-control time" name="time" />
      </div>
    </div>

    <!-- 3 -->
    <div class="row">
      <div class="col-5">
        <label for="usr">Time Zone:</label>
      </div>
      <div class="col-7">
        <div class="form-group">
          <select class="form-control" id="sel1" name="zone" required>
            <option>HST (HST)</option>
            <option>Alaska (AKST)</option>
            <option>Pacific (PST)</option>
            <option>Mountain (MST)</option>
            <option>Central Time Zone	(CST)</option>
            <option>Eastern Time Zone	(EST)</option>
          </select>
        </div>
      </div>
    </div>

    <!-- 2 -->
    <div class="row">
      <div class="col-5">
        <label for="usr">Mod List:</label>
      </div>
      <div class="col-7">
				<input type="file" class="form-control-file" name="file[]">
      </div>
    </div>
    <button type="submit" class="btn btn-primary w-100 mt-1">Submit</button>
  </form>

</div>
@endsection
