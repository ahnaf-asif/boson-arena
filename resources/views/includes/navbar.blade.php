<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top my-navbar"
     style="">
    <!-- Container wrapper -->
    <div class="container brand-container">

        <a class="navbar-brand" href="/" style="font-weight: bolder; letter-spacing: 0.1em; font-size: 1.3em;">বোসন বিজ্ঞান সংঘ</a>

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
                    <li class="nav-item dropdown">
                        <a
                            id="navbarDropdown1"
                            class="nav-link dropdown-toggle"
                            href="#" role="button"
                            data-mdb-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            <img src="{{asset('custom_icons/medal.svg')}}" style="
                                height:45px;
                                margin-right:-3px;
                                margin-top: -5px;
                            ">Compete
                        </a>


                        <div class="dropdown-menu nav-dropdown" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{route('problems')}}">
                                <i class="far fa-folder"></i> Problems
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-folder"></i> Olympiad
                            </a>

                            <a class="dropdown-item" href="#">
                                <i class="far fa-folder"></i> Quiz
                            </a>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>
                               <img src="{{asset('custom_icons/puzzle.svg')}}" style="
                                height:55px;
                                margin-right:-3px;
                                margin-top: -10px;
                                ">Events
                            </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span>
                              <img src="{{asset('custom_icons/bulb.svg')}}" style="
                                height:45px;
                                margin-right:-3px;
                                margin-top: -3px;
                                ">Blog
                            </span>
                        </a>
                    </li>

                    @guest
                        @if(Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link login-regi" href="{{ route('login') }}">
                                        <span style="display: flex;align-items: center;">
                                        <i style="font-size: 25px;" class="fas fa-sign-in-alt"></i>
                                        &nbsp;&nbsp;Login
                                        </span>
                                </a>
                            </li>
                        @endif
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link login-regi" href="{{ route('register') }}">
                                        <span style="">
                                        <i style="font-size: 22px;" class="fas fa-user"></i>
                                         &nbsp;Register
                                        </span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a
                                id="navbarDropdown"
                                class="nav-link login-regi dropdown-toggle"
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

                                @foreach(Auth::user()->roles as $role)

                                    @if($role->name == 'author' or $role->name=='moderator' or $role->name == 'admin')

                                        <a class="dropdown-item" href="{{route('draft')}}">
                                            <i class="far fa-folder"></i> Draft
                                        </a>
                                    @endif

                                @endforeach

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
