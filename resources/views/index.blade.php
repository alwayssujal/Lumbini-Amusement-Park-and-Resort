@extends('layouts.app')

@section('content')

<div id="video-container">
    <div class="video-overlay"></div>
    <div class="video-content">
        <div class="inner">
            <h1>Unlimited Fun</h1>
            <p>Water parks, resort, multi-purpose hall, sovineur shop, all in one place!</p>
            <br />
            <a role="button" class="btn btn-primary btn-lg" href="/buytickets">Buy Tickets</a>
        </div>
    </div>
    <video autoplay loop muted>
        <source src="Video.mp4" type="video/mp4" />
    </video>
</div>

<div class="mimage">
    <img src="images/cover.jpg" style="margin-bottom: 30px;" alt="cover">
    <br />
    <button type="button" class="btn btn-primary" style="margin: 0 auto;display: block;">Buy Tickets</button>
</div>

<div class="about">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ">
                <div class="titlepage">
                    <h2>Get Ready To Be Dazzeled</h2>
                    <span>Welcome To Lumbini Amusement Park & Resort. A must visit for fun, excitement, family holiday! All in one location! Enjoy endless fun, rides and slides, and family -friendly attractions</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="feature">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-bottom:15px;">
                        <div class="full-screen-portfolio">
                            <div class="card bg-dark text-white">
                                <div class="portfolio-item">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <a href="/cs" alt="page">
                                                <img class="card-img" src="{{ URL('images/crazy_slide.jpg') }}" alt="Card image">
                                                <div class="card-img-overlay">
                                                    <p class="card-text bottom" style="background-color: #ff9800; padding: 5px 8px; border-radius: .25rem;">Crazy Slide</p>
                                                    <span style="background-color: #ff9800;" class="card-text bot">Whirl & Twirl</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-bottom:15px;">
                        <div class="full-screen-portfolio">
                            <div class="card bg-dark text-white">
                                <div class="portfolio-item">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <a href="/fs" alt="page">
                                                <img class="card-img" src="{{ URL('images/family_slide.jpg') }}" alt="Card image">
                                                <div class="card-img-overlay">
                                                    <p class="card-text bottom" style="background-color: #f44336; padding: 5px 8px; border-radius: .25rem;">Family Slide</p>
                                                    <span style="background-color: #f44336;" class="card-text bot">Family Fun Times</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top:15px;padding-bottom:30px;">
                        <div class="full-screen-portfolio">
                            <div class="card bg-dark text-white">
                                <div class="portfolio-item">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <a href="/wp" alt="page">
                                                <img class="card-img" src="{{ URL('images/wave_pool.jpg') }}" alt="Card image">
                                                <div class="card-img-overlay">
                                                    <p class="card-text bottom" style="background-color: #9c27b0; padding: 5px 8px; border-radius: .25rem;">Wave Pool</p>
                                                    <span style="background-color: #9c27b0;" class="card-text bot">Rapid Splash</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" style="padding-top:15px;padding-bottom:30px;">
                        <div class="full-screen-portfolio">
                            <div class="card bg-dark text-white">
                                <div class="portfolio-item">
                                    <div class="hover-effect">
                                        <div class="hover-content">
                                            <a href="/kp" alt="page">
                                                <img class="card-img" src="images/kids_pool.jpg" alt="Card image">
                                                <div class="card-img-overlay">
                                                    <p class="card-text bottom" style="background-color: #673ab7; padding: 5px 8px; border-radius: .25rem;">Kids Pool</p>
                                                    <span style="background-color: #673ab7;" class="card-text bot">Kids Love It </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12" style="padding-bottom:30px;">
                <div class="card bg-dark text-white">
                    <img class="card-img" src="images/lumbini.jpg" alt="Card image">
                    <div class="card-img-overlay">
                        <div class="card-title" style="text-align: center;">
                            <h2 style="color:#fff;font-weight: bold;">Best Aqua Park</h2>
                            <p>Water park, Crazy slide, Family slide, Wave Pool, Kids Pool, Multi-purpose hall, Delicious bites & Loads of fun.</p>
                            <br />
                            <a role="button" class="btn btn-outline-primary" href="/buytickets">Book Now</a>
                        </div>
                        <!-- <p class="card-text bottom" style="background-color: #3f51b5; padding: 5px 8px; border-radius: .25rem;">Last updated 3 mins ago</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="area">
    <div class="container">
        <h2 style="font-size: 32px;font-weight: 700;color: #111111;text-transform: uppercase;padding: 0px 0px 25px 0px;text-align: center;">Eat at different restaurants but at the same place</h2>
        <div class="row">
            <div class="col-lg-5 col-md-12">
                <ul class="visual-list">
                    <li>
                        <div class="text-holder">
                            <h3>Food court</h3>
                            <p>With varieties of food that is served to satisfy your hunger and palate.</p>
                        </div>
                    </li>
                    <li>
                        <div class="text-holder">
                            <h3>Food</h3>
                            <p>Hygienically prepared,tasty and delicious dishes that you can choose from our menu of delights. Now you can eat well and spend less. We serve fresh and fast so that you won't miss out the fun.</p>
                        </div>
                    </li>
                    <li>
                        <div class="text-holder">
                            <h3>Our Service</h3>
                            <p>Our team of staff and chef ensure you top the best service & mouth watering treats, fast service, value for money and served with a smile in a fun-filled friendly environment.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="slide-holder">
                    <div class="img-slide scroll-trigger"><img src="images/fc.jpg" height="624" width="684" alt="food court"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="item content">
    <div class="container">
        <h2 style="font-size: 32px;font-weight: 700;color: #111111;text-transform: uppercase;padding-bottom: 60px;text-align: center;">Opening Soon</h2>
        <div class="row">
            <div class="col-md-6">
                <i class="fa fa-building infoareaicon"></i>
                <div class="infoareawrap">
                    <h3 class="text-center">Lumbini Resort</h3>
                    <p>
                        Vacation for relaxation, leisure and recharge while having fun at the same time. We help to make your time away from home, a holiday to remember.
                    </p>
                </div>
            </div>
            <!-- /.col-md-4 col -->
            <div class="col-md-6">
                <i class="fa fa-cutlery infoareaicon"></i>
                <div class="infoareawrap">
                    <h3 class="text-center">Lumbini Banquet</h3>
                    <p>
                        The best arrangement for every occasion. Banquet hall with an ambiance that accommodates your every theme. Lumbini Amusement Park & Resort.
                    </p>
                </div>
            </div>
            <!-- /.col-md-4 col -->
            <!-- <div class="col-md-4">
            <i class="fa fa-bullhorn infoareaicon"></i>
            <div class="infoareawrap">
                <h1 class="text-center subtitle">Hire Us</h1>
                <p>
                     If you wish to change an element to look or function differently than shown in the demo, we will be glad to assist you. This is a paid service due to theme support requests solved with priority.
                </p>
                <p class="text-center">
                    <a href="#">- Get in Touch -</a>
                </p>
            </div>
        </div> -->
        </div>
    </div>
</div>

@include('contact')

@endsection
