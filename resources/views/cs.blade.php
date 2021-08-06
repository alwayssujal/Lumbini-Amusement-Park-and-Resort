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
                    <img src="images/cs1.jpg" alt="#">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2 class="section-title">Crazy slide safe yet exciting and insanely fun</h2>
                    <p>
        Get ready to be sent down an enclosed tube into a  bowl, where you will feel a moment of zero-gravity, or weightlessness, before hitting an embankment and landing in the splash pool below. Throughout the whole water ride, you'll be screaming around every slippery turn.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="csa">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                    <h2 class="section-title">Crazy Slide! Book Now </h2>
                        <a role="button" class="btn btn-primary" href="/buytickets">Book Tickets Now</a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="images/cs.jpg" alt="#">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

@include('contact')

@endsection
