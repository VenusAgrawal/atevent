<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- meta description tag (SEO) -->
    <meta name="description" content="Find the most beautiful event venues in Luxembourg: birthdays, weddings, parties, you name it!">
    <title>@yield('title')</title>

    <!-- local stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/stylebody.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleheader.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylefooter.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleaboutus.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dropdown.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-upload.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styletransaction.css') }}">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <!-- font-awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

    <!-- material design for bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />

    <!-- particles -->
    <link rel="stylesheet" href="{{ asset('assets/particles.js-2.0.0/demo/css/style.css') }}" />

    <!-- animation icons -->
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.css" />

    <!-- OSM with leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>

    <!-- calendar -->
    <script src="{{ asset('js/calender.js') }}"></script>

    <!-- search -->
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <!-- HEADER -->

    <!-- mobile version -->
    <div class="mobileversionnavbar">
    <nav class="navbar navbar-light bg-light">
    <!-- search bar -->
        <div class="container-fluid">
            <div class="searchcontainerheader">
                {{-- <form action="/" method="GET" class="searchformbody"> --}}
                <input type="search" placeholder="Search your desired location" class="search-fieldbody" />
                <button type="submit" class="search-buttonbody">
                    <img src="{{ asset('assets/search.png') }}">
                </button>
                {{-- </form> --}}
            </div>
            <button class="navbar-toggler ms-auto" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarToggleExternalContent3" aria-controls="navbarToggleExternalContent3"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- if not logged in (guest auth only works with (default) user guard)-->
    @guest
        @guest('provider')
            <div class="collapse" id="navbarToggleExternalContent3">
                <div class="bg-light shadow-3 p-4">
                    <button onclick="location.href='{{ route('connect') }}'" type="button"
                        class="btn btn-link btn-block border-bottom m-0">Provider</button>
                    <button onclick="location.href='{{ route('register') }}'" type="button"
                        class="btn btn-link btn-block border-bottom m-0">Register</button>
                    <button onclick="location.href='{{ route('login') }}'" type="button"
                        class="btn btn-link btn-block m-0">Log In</button>
                </div>
            </div>
        @endguest
    @endguest


    {{-- if logged in as user --}}
    @auth('web')
        <div class="collapse" id="navbarToggleExternalContent3">
            <div class="bg-light shadow-3 p-4">
                <button onclick="location.href='{{ route('dashboard') }}'" type="button"
                    class="btn btn-link btn-block border-bottom m-0">User account</button>
                <button onclick="location.href='{{ route('settings.profile.index') }}'" type="button"
                    class="btn btn-link btn-block border-bottom m-0">Edit profile</button>
                <button onclick="location.href='{{ route('logout') }}'" type="button"
                    class="btn btn-link btn-block m-0">Logout</button>
            </div>
        </div>
    @endauth


    {{-- if logged in as provider --}}
    @auth('provider')
        <div class="collapse" id="navbarToggleExternalContent3">
            <div class="bg-light shadow-3 p-4">
                <button onclick="location.href='{{ route('provider.dashboard') }}'" type="button"
                    class="btn btn-link btn-block border-bottom m-0">User account</button>
                <button onclick="location.href='{{ route('provider.settings.profile.index') }}'" type="button"
                    class="btn btn-link btn-block border-bottom m-0">Edit profile</button>
                <button onclick="location.href='{{ route('provider.logout') }}'" type="button"
                    class="btn btn-link btn-block m-0">Logout</button>
            </div>
        </div>
    @endauth
</div>
    <!--/end mobile version-->


    <!-- desktop version -->
    <section class="headersection">
        <nav class="headernav">
            <div class="headerlogo">
                <x-application-logo />
            </div>
            <div class="searchcontainerbody">
                <input type="text" id="search" name="search" placeholder="Search your desired location"
                    class="search-fieldbody" required /><span class="input-group-btn">
            </div>


            <ul>
                <li class="headernavlist">
                    <a href="{{ route('homepage') }}" class="headernav_a">Home</a>
                    <a href="{{ route('aboutus') }}" class="headernav_a">About Us</a>
                    <!-- if not logged in (guest auth only works with (default) user guard)-->
                    @guest
                        @guest('provider')
                            <button onclick="location.href='{{ route('connect') }}'" type="button"
                                class="headerbtn headerprovider">Provider</button>
                            <button onclick="location.href='{{ route('register') }}'" type="button"
                                class="headerbtn headerregister">Register</button>
                            <button onclick="location.href='{{ route('login') }}'" type="button"
                                class="headerbtn headerlogin">Log In</button>
                        @endguest
                    @endguest

                    {{-- if logged in as user --}}
                    @auth('web')
                        <div class="dropdown">
                            <button class="btn dashboard loggedinbutton">{{ Auth::user()->first_name }}</button>
                            <div class="dropdown-content">
                                <a href="{{ route('dashboard') }}">User account</a>
                                <a href="{{ route('settings.profile.index') }}">Edit profile</a>
                                <a href="{{ route('logout') }}">Logout</a>
                            </div>
                        </div>
                    @endauth

                    {{-- if logged in as provider --}}
                    @auth('provider')
                        <div class="dropdown">
                            <button class="dropbtn dashboard">{{ Auth::guard('provider')->user()->first_name }}</button>
                            <div class="dropdown-content">
                                <a href="{{ route('provider.dashboard') }}">User account</a>
                                <a href="{{ route('provider.settings.profile.index') }}">Edit profile</a>
                                <a href="{{ route('provider.logout') }}">Logout</a>
                            </div>
                        </div>
                    @endauth
                </li>
            </ul>
        </nav>
    </section>
    <!-- end desktop version -->

    <!-- END HEADER -->


    <!-- MAIN CONTENT -->
    <main class="content">
        {{-- validation errors --}}
        @if ($errors->any())
            <div class="alert danger">
                @foreach ($errors->all() as $error)
                    <li style="color: red"> {{ $error }}</li>
                @endforeach
            </div>
        @endif

        <!-- particles -->
        <div id="particles-js"></div>

        <!-- search -->
        <div class="picturecontainerbody">
            <blob></blob>
        </div>


        @yield('content')
    </main>
    <!-- END MAIN CONTENT -->

    <!-- FOOTER -->
    <Section>
        <div class="footer">
            <div id="footerround"></div>
            <div class="footercontainer">
                <div class="footergrid">
                    <div class="footerbox-init" id="box-init-logo">
                        <div id="box-init-logo">
                            <x-application-logo />
                        </div>
                        <div class="footerbox-init">
                            <p>14 porte de France,<br> L-4364 Esch/Alzette</p>
                        </div>
                        <div class="footerbox-init">
                            <a href="{{ route('aboutus') }}" class="footerbox-init-description">About Us</a>
                        </div>
                        
                        
                        <div class="footerbox-init">
                        <a href="{{ route('contact.contact') }}" class="footerbutton">Contact Us</a>
                        </div>
                        <div class="footerbox-init">
                             <p>Privacy Policy</p>
                        </div>
                        <div class="footerbox-init">
                             <p>Terms and Conditions</p>
                        </div>
                        <div class="footerbox-init">
                             <p>&copy atEvent 2022</p>
                        </div>
                    </div>
                    <div class="footerbox-init">
                        <a href="{{ route('aboutus') }}" class="footerbox-init-description">About Us</a>
                    </div>
                    <div class="footerbox-init">
                        <a href="{{ route('contact.contact') }}" class="footerbutton">Send us a message</a>
                    </div>
                </div>
            </div>
        </div>
    </Section>
    <!-- END FOOTER -->


    <!-- JS SCRIPTS -->

    <!-- material design for bootstrap -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>

    <!-- particles -->
    <script src="{{ asset('assets/particles.js-2.0.0/particles.js') }}"></script>
    <script src="{{ asset('assets/particles.js-2.0.0/demo/js/app.js') }}"></script>

    <!-- calendar -->
    <script src="{{ asset('js/calender.js') }}"></script>

    <!-- OSM & geoportail APIs -->
    <script src="{{ asset('js/map.js') }}"></script>

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

    <!-- popperjs positioning engine -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.2/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>

    <!-- tempus dominus datepicker -->
    <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"
        crossorigin="anonymous"></script>

    <!-- tempus dominus datepicker styles -->
    <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css"
        rel="stylesheet" crossorigin="anonymous">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- search -->
    <script type="text/javascript">
        $('#search').on('keyup', function() {
            $value = $(this).val();
            $.ajax({
                type: 'get',
                url: '{{ URL::to('search') }}',
                data: {
                    'search': $value
                },
                success: function(data) {
                    $('blob').html(data);
                }
            });
        })
        $.ajaxSetup({
            headers: {
                'csrftoken': '{{ csrf_token() }}'
            }
        });
    </script>


</body>

</html>