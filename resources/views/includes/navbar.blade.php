<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark  fixed-top my-navbar bg-super-light shadow-2"
     style="">
    <!-- Container wrapper -->
    <div class="container brand-container">

        <a class="navbar-brand" href="/" style="font-weight: bolder; font-size: 1.5rem; color:black"> বোসন বিজ্ঞান সংঘ</a>

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
                            COMPETE
                        </a>
                        <div class="dropdown-menu nav-dropdown" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{route('problems')}}">
                                <i class="far fa-folder"></i> Problems
                            </a>
{{--                            <a class="dropdown-item" href="#">--}}
{{--                                <i class="far fa-folder"></i> Contests--}}
{{--                            </a>--}}

                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a
                            id="navbarDropdown1"
                            class="nav-link dropdown-toggle"
                            href="#" role="button"
                            data-mdb-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            ARCHIVE
                        </a>
                        <div class="dropdown-menu nav-dropdown" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{route('blog')}}">
                                <i class="far fa-folder"></i> Blog
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="far fa-folder"></i> Article
                            </a>
                            <a class="dropdown-item" href="{{route('resources')}}">
                                <i class="far fa-folder"></i> Resources
                            </a>
                            <a class="dropdown-item" href="{{route('faq')}}">
                                <i class="far fa-folder"></i> FAQ
                            </a>
                        </div>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="#">--}}
{{--                            EVENTS--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('gallery')}}">
                            GALLERY
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('about')}}">
                            ABOUT
                        </a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{route('contact')}}">
                            CONTACT
                        </a>
                    </li>
                    @guest
                        @if(Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">

                                        LOGIN

                                </a>
                            </li>
                        @endif
                        @if(Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">

{{--                                        <i style="font-size: 22px;" class="fas fa-user"></i>--}}
                                         REGISTER

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
                                {{ Auth::user()->username }}
                            </a>


                            <div class="dropdown-menu nav-dropdown" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{route('profile', ['username'=>Auth::user()->username])}}">
                                    <i class="far fa-id-badge"></i> Profile
                                </a>

                                @foreach(Auth::user()->roles as $role)

                                    @if($role->name == 'author' or $role->name=='moderator' or $role->name == 'admin')

                                        <a class="dropdown-item" href="{{route('draft')}}">
                                            <i class="far fa-folder"></i> Draft
                                        </a>
                                        <a class="dropdown-item" href="{{route('blog.draft')}}">
                                            <i class="far fa-folder"></i> Blog Draft
                                        </a>
                                        <a class="dropdown-item" href="{{route('article.draft')}}">
                                            <i class="far fa-folder"></i> Article Draft
                                        </a>
                                        @break
                                    @endif

                                @endforeach

                                @foreach(Auth::user()->roles as $role)

                                    @if($role->name == 'admin')

                                        <a class="dropdown-item" href="{{route('admin')}}">
                                            <i class="far fa-folder"></i> Admin Panel
                                        </a>

                                        @break
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
