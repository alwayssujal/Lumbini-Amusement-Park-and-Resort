<!-- header inner -->
<div class="header">
    <div class="header_white_section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="header_information">
                        <ul>
                            <li><img src="{{ URL::asset('icon/fast-time.png') }}" alt="Opening Hours" width="40px" /> Opening Hours 10:00 AM - 6:00 PM</li>
                            <li><img src="{{ URL::asset('icon/telephone.png') }}" alt="Phone Number" width="35px" /> 985-7039218</li>
                            <li><img src="{{ URL::asset('icon/placeholder.png') }}" alt="Location" width="35px" /> Bhairahawa, Nepal</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="logo"> <a href="/"><img src="{{ URL::asset('images/logo.png') }}" alt="#"></a> </div>
                <div class="menu-area">
                    <div class="limit-box">
                        <nav class="main-menu">
                            <ul class="menu-area-main">
                                <li class="{{ request()->is('/') ? 'active' : ''}}"> <a href="/">Home</a> </li>
                                <li class="{{ request()->is('about') ? 'active' : ''}}"> <a href="/about">About</a> </li>
                                <li><a href="#travel">Special Offers</a></li>
                                <li><a href="#blog">Gallery</a></li>
                                <li><a href="#contact-us">Contact Us</a></li>
                                @guest
                                @if (Route::has('login'))
                                    <li class="nav-item {{ request()->is('login') ? 'active' : ''}}">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item {{ request()->is('register') ? 'active' : ''}}">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                            <a class="dropdown-item" href="{{ Auth::user()->isAdmin ? route('admin') : route('buytickets') }}">Dashboard</a>

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header inner -->
