@extends('admin.adminlayout')

@section('content')

<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Ticketing</h1>
    </div>

    @if (session('msg'))
          <div class="alert alert-info">
              {{ session('msg') }}
          </div>
      @endif

    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

  <div class="row">
    <div class="col-lg-6">
      <div class="card mb-4">
        <div class="card-body">
          <p>Select a date to close online booking.</p>
          <form action="/updatebookingstatus" method="POST">
            @csrf
            <div class="form-group" id="simple-date4">
              <label for="fromdate">Range Select</label>
              <div class="input-daterange input-group">
                <input type="date" class="input-sm form-control" name="fromdate" placeholder="Start Date" />
                <div class="input-group-prepend">
                  <span class="input-group-text">To</span>
                </div>
                <input type="date" class="input-sm form-control" name="todate" placeholder="End Date" />
              </div>
            </div>
            <input type="submit" class="btn btn-danger" value="Close online booking">
          </form>
        </div>
      </div>
      <div class="card mb-4">
          <div class="card-body">
              <p>Closed Online Booking Dates</p>
              @foreach ($booking_statuses as $booking_status)
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">{{date('F d (D), Y', strtotime($booking_status->fromdate)). ' - ' .date('F d (D), Y', strtotime($booking_status->todate)) }}</div>
                  </div>
                  <div class="col-auto">
                    <form action="/openbookingstatus/{{ $booking_status->id }}" class="mt-1">
                      @csrf
                      <input type="submit" class="btn btn-success" value="Open online booking">
                    </form>
                  </div>
                </div>
              @endforeach
              <br>
            </div>
        </div>
    </div>
  </div>
  <!---Container Fluid-->
</div>

@endsection
