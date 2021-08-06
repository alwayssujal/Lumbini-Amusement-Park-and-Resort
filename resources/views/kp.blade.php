@extends('layouts.app')

@section('content')

<!-- Page Header Start -->
<div class="page-header">
    <div class="container">
    <div class="row">
        <div class="col-12">
            <a role="button" class="btn btn-primary" href="/buytickets">Buy Tickets Now</a>
        </div>
    </div>
    </div>
    </div>
    <!-- Page Header End -->

    <!-- About Start -->
    <div class="cs">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="images/kp.jpg" alt="#">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2 class="section-title">For kids who are looking for a little more water action</h2>
                    <p>
    Kids pool is an amazing playtime for kids. Exhilarating splash in the zero-depth kid's pool that is not only safe but complete satisfaction for kids. Children won't get hurt while having that extra fun which makes this perfect choice of activity. Kids will always have fun while still being close to their families.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="csa">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                    <h2 class="section-title">Kids Pool! Book Now</h2>
                    <a role="button" class="btn btn-primary" href="/buytickets">Book Tickets Now</a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="images/kp1.jpg" alt="#">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

@include('contact')

@endsection
