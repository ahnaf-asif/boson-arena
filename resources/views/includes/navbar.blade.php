<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top my-navbar" style="background-color: #1f6fb2;">
    <!-- Container wrapper -->
    <div class="container brand-container">

        <a class="navbar-brand" href="/">{{config('app.name', 'Boson Arena')}}</a>

        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <div class="d-flex align-items-center navbar-inside-1">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-inside-2">

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>
                                <i class="fas fa-medal"></i> Problems
                            </span>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                            <span>--}}
{{--                               <i class="fas fa-medal"></i> Olympiad--}}
{{--                            </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                            <span>--}}
{{--                              <i class="fas fa-medal"></i>  Quiz--}}
{{--                            </span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li class="nav-item dropdown">
                        <a
                            id="navbarDropdown1"
                            class="nav-link dropdown-toggle"
                            href="#" role="button"
                            data-mdb-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            Contests
                        </a>


                        <div class="dropdown-menu nav-dropdown" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{route('profile', ['username'=>'asifthen00b'])}}">
                                <i class="far fa-id-badge"></i> Olympiad
                            </a>

                            <a class="dropdown-item" href="#">
                                <i class="far fa-folder"></i> Quiz
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>
                               <i class="fas fa-medal"></i> Events
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>
                              <i class="fas fa-medal"></i>  Blog
                            </span>
                        </a>
                    </li>

                    @guest
                        @if(Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link " href="{{ route('login') }}">
                                        <span>
                                        <i class="fas fa-sign-in-alt"></i>
                                        Login
                                        </span>
                                </a>
                            </li>
                        @endif
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">
                                        <span>
                                        <i class="fas fa-user"></i>
                                        Register
                                        </span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a
                                id="navbarDropdown"
                                class="nav-link dropdown-toggle"
                                href="#" role="button"
                                data-mdb-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>


                            <div class="dropdown-menu nav-dropdown" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{route('profile', ['username'=>'asifthen00b'])}}">
                                    <i class="far fa-id-badge"></i> Profile
                                </a>

                                <a class="dropdown-item" href="#">
                                    <i class="far fa-folder"></i> Draft
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                    @endguest
                </ul>
            </div>

        </div>
    </div>
    <!-- Container wrapper -->
</nav>
<div class="navbar-boilerplate"></div>
<!-- Navbar -->
