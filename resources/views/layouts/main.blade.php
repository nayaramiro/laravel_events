<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>


        {{-- fonts css --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito" rel="stylesheet">

        {{-- bootstraop --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


        {{-- our script --}}
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="/js/script.js">
        

        
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="navbar">
                    <a href="/" class="navbar-brand">
                        <img src="/img/logo.svg" alt="HDC EVENTS">
                    </a>
                    <ul class="navbar-nav">
                        <li class="nav-items">
                            <a href="/" class="nav-link">Events</a>
                        </li>

                        <li class="nav-items">
                            <a href="/create" class="nav-link">Create</a>
                        </li>



                        {{-- if user is logged --}}
                        @auth
                            <li class="nav-items">
                                <a href="/dashboard" class="nav-link">Dashboard</a>
                            </li>

                            <li class="nav-items">
                                <form id="logout" action="/logout" method="POST" class="p-0">
                                    @csrf
                                        <a href="/logout" class="nav-link" 
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">Logout
                                        </a>
                                </form>    
                            </li>
                        @endauth

                        {{-- if user isn't logged --}}
                        @guest
                            <li class="nav-items">
                                <a href="/login" class="nav-link">Log in</a>
                            </li>

                            <li class="nav-items">
                                <a href="/register" class="nav-link">Register</a>
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
            
        </header>
        <main>
            <div class="container-fluid">
                <div class="row">
                    @if(session('msg'))
                        <p class="msg row align-items-center justify-content-center col-12 p-3">{{session('msg')}}</p>
                    @endif
                    @yield('content')

                </div>
            </div>
        </main>
        <footer class="d-flex justify-content-center align-items-center">
            <p>HDC Events &copy; 2024</p>
        </footer>

        {{-- script js ionics --}}
        <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    </body>
</html>