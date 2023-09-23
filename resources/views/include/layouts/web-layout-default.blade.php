<!DOCTYPE html>
<html lang="en">

    <head>

        @yield('seo')
        <link href="/web/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="/web/assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="/web/assets/css/prettyPhoto.css" rel="stylesheet">
        <link href="/web/assets/css/price-range.css" rel="stylesheet">
        <link href="/web/assets/css/animate.css" rel="stylesheet">
        <link href="/web/assets/css/main.css" rel="stylesheet">
        <link href="/web/assets/css/responsive.css" rel="stylesheet">
        <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
        <link rel="shortcut icon" href="/web/assets/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/web/assets/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/web/assets/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/web/assets/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/web/assets/images/ico/apple-touch-icon-57-precomposed.png">
        @yield('link')
    </head>
    </head><!--/head-->

    <body>
        <header id="header"><!--header-->
            <x-header.header-web />
        </header><!--/header-->
        @yield('content-top')
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <x-sidebar.left-sidebar />
                    </div>
                    <div class="col-sm-9 padding-right">
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>

        <footer id="footer"><!--Footer-->
            <x-footer.footer-web />

        </footer>
        <script src="/web/assets/js/jquery.js"></script>
        <script src="/web/assets/js/bootstrap.min.js"></script>
        <script src="/web/assets/js/jquery.scrollUp.min.js"></script>
        <script src="/web/assets/js/price-range.js"></script>
        <script src="/web/assets/js/jquery.prettyPhoto.js"></script>
        <script src="/web/assets/js/main.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        @yield('script')
    </body>

</html>
