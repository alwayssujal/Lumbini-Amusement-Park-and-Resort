@extends('layouts.app')

@section('content')

<!-- About Start -->
<div class="aboutus">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <video autoplay controls>
                    <source src="Video.mp4" type="video/mp4" />
                 </video>
            </div>
            <div class="col-md-6">
                <h2 class="section-title">About Us</h2>
                <p>
                    Lumbini Amusement Park and Resort is located in Belaiya, Bhairahawa. It is ideally located that helps to promote tourism. With easy access from Bhairahwa and Gorakhpur, it's a perfect getaway vacation.
                </p>
                <p>
                Whether you want to enjoy a big splash or a relaxing float, our water-focused resort and amusement park offers ample facilities to keep you & your family entertained throughout the summer.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

@include('contact')

@endsection