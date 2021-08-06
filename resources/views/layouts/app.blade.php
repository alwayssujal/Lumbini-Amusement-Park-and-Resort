<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Best Fun/Water Park in Nepal | Lumbini Amusement Park & Resort</title>
    <!-- site metas -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Best Fun/Water Park in Nepal | Lumbini Amusement Park & Resort" />
    <meta property="og:description" content="Apart from the birthplace of Lord Gautama Buddha, Lumbini also has the best water and fun park spot to hang out here in Lumbini Amusement Park & Resort." />
    <meta property="og:site_name" content="Lumbini Amusement Park & Resort" />
    <meta property="og:url" content="https://lumbinifunpark.com" />
    <meta property="og:image" content="https://lumbinifunpark.com/images/logo.png" />
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ URL::asset('css/responsive.css') }}">
    <!-- favicon -->
    <link rel="icon" href="{{ URL::asset('images/favicon.png') }}" type="image/png" />

    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C22W3X9LHP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-C22W3X9LHP');

    </script>
</head>
<!-- body -->

<body class="main-layout">

    <!-- Messenger Chat Plugin Code -->
    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v10.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution="page_inbox" page_id="106337010972295">
    </div>

    <!-- header -->
    <header>
        <!-- header inner -->
        @include('layouts.header')
        <!-- end header inner -->
    </header>
    <!-- end header -->

    @yield('content')

    @include('layouts.footer')

    <!-- Javascript files-->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ URL::asset('js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ URL::asset('js/custom.js') }}"></script>
    <!-- javascript -->

</body>

</html>
