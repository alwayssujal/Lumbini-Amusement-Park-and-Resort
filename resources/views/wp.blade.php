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
                    <img src="images/wp.jpg" alt="#">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2 class="section-title">Waves that are gentle and relaxing,suitable for of all ages.</h2>
                    <p>
    Wave pool replicates the movement o the ocean creating rapids waves that are gentle and relaxing, suitable for guests of all ages until you get thrown off balance to frenzy joy and laughter. Be ready to get knocked over by the waves.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="csa">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                    <h2 class="section-title">Wave Pool! Book Now</h2>
                    <a role="button" class="btn btn-primary" href="/buytickets">Book Tickets Now</a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="images/wp1.jpg" alt="#">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

@include('contact')

@endsection
