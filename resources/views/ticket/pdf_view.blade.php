<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>Lumbini Amusement Park & Resort</title>
  <link href="{{ public_path('vendor/fontawesome-free/css/all.min.css'); }}"  rel="stylesheet" type="text/css">
  <link href="{{ public_path('vendor/bootstrap/css/bootstrap.min.css'); }}"  rel="stylesheet" type="text/css">
</head>
<style>
  h3{
    color: rgb(43, 43, 43);
  }
    .card {
    width: 49%;
    background-color: #fff;
    color: #535353;
    margin-bottom: 10px;
    border-radius: 4px;
}
.datet {
    width: 25%;
    text-align: center;
    border-right: 2px dashed #dadde6;
}
.card-cont {
    width: 75%;
    font-size: 85%;
    padding: 10px 10px 30px 50px;
}
.datet time {
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
}
.datet time span:first-child {
    color: #2b2b2b;
    font-weight: 600;
    font-size: 250%;
}
.datet time span {
}
</style>
<body>
    <div class="row">
        <div class="col-lg-12">
          <article class="card" style="width: 100%">
            <section class="datet" style="float:left; height: 150px; padding-top:100px">
              <time>
                <span>{{ date('d', strtotime($booking->ticketDate)); }}</span>
                <span>{{ date('F', strtotime($booking->ticketDate)); }}</span>
                {{-- <span>30</span><span>July</span> --}}
              </time>
            </section>
            <section class="card-cont">
                <h3 style="text-decoration: none">{{ $booking->orderNo }}</h3>
              <h3 style="text-decoration: none">Customer - {{ Auth::user()->name }}</h3>
              <small style="margin-left: 50px">
                @foreach ($booking->details as $detail)
                  {{ $detail->name.' - '.$detail->quantity. ' | ' }}
                @endforeach
              </small>
              <h3 style="text-decoration: none">Total Price - Rs. {{ $booking->total }}</h3>
              @if ($booking->isPaid)
              <span class="badge badge-success" style="font-size: 12px; font-weight: 400; margin-left: 50px; background-color: green; color: white; padding: 5px">Paid by {{ $booking->payment_method }}</span>
              @else
              <span class="badge badge-danger" style="font-size: 12px; font-weight: 400; margin-left: 50px; background-color: red; color: white; padding: 5px">Unpaid</span>
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
            </section>
          </article>
        </div>
      </div>
</body>

</html>
