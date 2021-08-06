@extends('user.userlayout')

@section('content')


<!-- Container Fluid-->
<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">My Tickets</h1>
    </div>
    <p class="text-gray-700">Note: Online tickets cannot be cancelled before 24 hour.</p>

    @if (session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      @if (session('error'))
          <div class="alert alert-danger">
              {{ session('error') }}
          </div>
      @endif

    @if (session('msg'))
          <div class="alert alert-success">
              {{ session('msg') }}
          </div>
      @endif

  <div class="row">
    @foreach ($bookings as $booking)
    <div class="col-lg-6">
      <article class="card">
        <section class="datet">
          <time>
            <span>{{ date('d', strtotime($booking->ticketDate)); }}</span>
            <span>{{ date('F', strtotime($booking->ticketDate)); }}</span>
            {{-- <span>30</span><span>July</span> --}}
          </time>
          @if (!$booking->isCancelled)
          <a href="/saveticket/{{ $booking->id }}" class="btn-sm btn-link" style="color: #3abaf4;">Save ticket</a>
          @endif
        </section>
        <section class="card-cont">
            <h3 style="{{ $booking->isCancelled ? '' : 'text-decoration: none' }}">{{ $booking->orderNo }}</h3>
          <small>
            @foreach ($booking->details as $detail)
              {{ $detail->name.' - '.$detail->quantity. ' | ' }}
            @endforeach
          </small>
          <h3 style="{{ $booking->isCancelled ? '' : 'text-decoration: none' }}">Total Price - Rs. {{ $booking->total }}</h3>
          @if ($booking->isCancelled)
          <span class="badge badge-danger" style="font-size: 12px; font-weight: 400;">Cancelled</span>
          @else
            @if ($booking->isPaid)
            <span class="badge badge-success" style="font-size: 12px; font-weight: 400;">Paid by {{ $booking->payment_method }}</span>
            @else
            <span class="badge badge-danger" style="font-size: 12px; font-weight: 400;">Unpaid</span>
            @endif
          @endif
          <div class="even-info">
            <i class="fa fa-calendar"></i>
            <p>
              {{ date('F d (D), Y', strtotime($booking->ticketDate)); }}
              {{-- July 30 (Fri), 2021 --}}
            </p>
          </div>
          <div class="even-info">
            <i class="fa fa-map-marker"></i>
            <p>
              Belhaiya-1, Bhairahawa (Lumbini Amusement Park & Resort)
            </p>
          </div>
          @if (!$booking->isCancelled)
            @if ($booking->payment_method == 'Cash')
              <a onclick="return confirm('Are you sure?')" href="/cancelticket/{{ $booking->id }}">Cancel</a>
            @else
                @if(Carbon\Carbon::parse($booking->ticketDate)->subDays(1) > Carbon\Carbon::now())
                    <a onclick="return confirm('Are you sure?')" href="/cancelticket/{{ $booking->id }}">Cancel</a>
                @endif
            @endif
          @endif
        </section>
      </article>
    </div>
    @endforeach
  </div>
  </div>
  <!---Container Fluid-->

@endsection
