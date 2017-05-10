<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

    <title> Hero Host || @yield('title') </title>

    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/_all-skins.min.css')}}">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->

    

    @yield('page-css')

</head>
<body class="hold-transition skin-red sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            @include('includes.header_nav')
        </header>

        <aside class="main-sidebar">
            @include('includes.nav_aside')
        </aside>

        <div class="content-wrapper">
            @include('partials.flash')

            @yield('content')
        </div>

        <footer class="main-footer">
            @include('includes.footer')
        </footer>
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('assets/js/jquery.min.js')  }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')  }}"></script>
    <script src="{{ asset('assets/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

    <script>
        //$.widget.bridge('uibutton', $.ui.button);
        $("div.alert").delay(3000).slideUp();
    </script>
    @yield('page-scripts')
</body>
</html>
