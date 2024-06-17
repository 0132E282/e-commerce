@php
    use App\Models\Setting;
    if (!session()->has('setting_system')) {
        $settingSystem = json_decode(Setting::where('key', 'setting_system')->first()?->value, true) ?? [];
        session()->put('setting_system', $settingSystem);
    }
@endphp
<!DOCTYPE html>
<html lang="en">

    <head>
        @yield('seo')
        <link href="{{ asset('web/assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href=" {{ asset('web/assets/css/font-awesome.min.css') }} " rel="stylesheet">
        <link href=" {{ asset('web/assets/css/prettyPhoto.css') }}" rel="stylesheet">
        <link href="{{ asset('web/assets/css/price-range.css') }} " rel="stylesheet">
        <link href="{{ asset('web/assets/css/animate.css') }} " rel="stylesheet">
        <link href="{{ asset('web/assets/css/main.css') }} " rel="stylesheet">
        <link href="{{ asset('web/assets/css/responsive.css') }} " rel="stylesheet">
        <link rel="shortcut icon" href="{{ session('setting_system')['icon_title_website'] ?? '' }}">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('web/assets/images/ico/apple-touch-icon-144-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('web/assets/images/ico/apple-touch-icon-114-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset(' web/assets/images/ico/apple-touch-icon-72-precomposed.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('web/assets/images/ico/apple-touch-icon-57-precomposed.png') }}">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @stack('links')
    </head>
    </head>

    <body>
        <header id="header">
            <x-header.header-web />
        </header>
        @yield('content-top')
        <section>
            <div class="container">
                @yield('content')
            </div>
        </section>
        <footer id="footer" style="margin-top: 50px;">
            <x-footer.footer-web />
        </footer>
        <script src="/web/assets/js/jquery.js"></script>
        <script src="/web/assets/js/bootstrap.min.js"></script>
        <script src="/web/assets/js/price-range.js"></script>
        <script src="/web/assets/js/jquery.prettyPhoto.js"></script>
        <script src="/web/assets/js/main.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        @stack('scripts')
    </body>

</html>
