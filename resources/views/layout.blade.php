<!doctype html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS files -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/reset.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/libs/bootstrap/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/css/style.css">
    <!-- SCRITP files -->
    <script src="{{ url('/') }}/libs/jQuery/jquery2.1.4.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ url('/') }}/libs/bootstrap/js/bootstrap.min.js"></script>
    <!-- SMART MENU files https://www.smartmenus.org/download/-->
    <script type="text/javascript" src="{{ url('/') }}/libs/bootstrap/js/jquery.smartmenus.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/libs/bootstrap/js/jquery.smartmenus.bootstrap.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
{{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


    <script src="{{ url('/') }}/js/rvtis.js"></script>

    @yield('script')

</head>
<body>
<section class="container-fluid">
    <section class="row">
        <header class="col-md-12">
            <div class="headerInline"><img src="{{ url('/') }}./images/rvt-logo.svg" id="logo"/></div>
            <div class="headerInline"><span id="title">PIKC RVT informāciajs sistāma</span></div>
        </header>
    </section>
    <section class="row">
        <nav class="navbar navbar-inverse col-md-12">
            <div class="navbar-header">
                {{--<a class="navbar-brand" href="#"><img src="{{ url('/') }}/images/rvt-logo.svg" id="logo"/></a>--}}
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <a href="http://inventars.local/tabulas/darbinieki"><input type="button" class="btn btn-info" value="Darbinieki"></a>
                <a href="http://inventars.local/tabulas/filiales"><input type="button" class="btn btn-info" value="Filiāles"></a>
                <a href="http://inventars.local/tabulas/kabineti"> <input type="button" class="btn btn-info"  value="Kabineti"></a>
                <a href="http://inventars.local/tabulas/mazvertigie_lidzekli"><input type="button" class="btn btn-info" href="darbinieki" value="Mazvērtīgie līdzekļi"></a>
                <a href="http://inventars.local/tabulas/pamatlidzekli"><input type="button" class="btn btn-info" class="btn btn-info" href="darbinieki" value="Pamatlīdzekļi"></a>
                <a href="http://inventars.local/tabulas/pavadzime"><input type="button" class="btn btn-info" value="Pavadzīme"></a>
                <style>

                    .navigation{
                        background-color: white;
                        color: black;
                        border: 2px solid #00008b;
                    }

                </style>
            </div>
        </nav>
    </section>
    <section class="row">
        <aside class="col-md-2">
            @yield('asideLeft')
        </aside>
        <main class="col-md-8">
            @yield('content')
        </main>
        <aside class="col-md-2">
            @yield('asideRight')
        </aside>
    </section>
</section>
@yield('modal')
</body>
</html>
