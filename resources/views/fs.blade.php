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
                    <img src="images/fs.jpg" alt="#">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2 class="section-title">Enjoy splashing and sliding with friends & family</h2>
                    <p>
    Then our family slide is a must. Twist, turn and speed through tunnels before splashing down and discovering which rider was first to the finish. The fact that we have these slides means you can experience all of this with someone else at once while enjoying your own ride too. This all adds up to what we call an adrenaline-charged adventure every time you're at one of these amazing slides!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="csa">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                    <h2 class="section-title">Family Slide! Book Now</h2>
                    <a role="button" class="btn btn-primary" href="/buytickets">Book Tickets Now</a>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="images/fs1.jpg" alt="#">
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

@include('contact')

@endsection
