<style>
    .sidebar .nav-link{
        background: #393c42 !important;
    }
</style>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin')}}" class="brand-link text-center">

            Boson Admin Panel

    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 text-center " style="color: yellow;">
            {{Auth::user()->name}}
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('admin')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.contact')}}" class="nav-link">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>
                            Contact
                            @if($pending_contacts > 0)
                                <span class="badge badge-danger right">{{$pending_contacts}}</span>
                            @endif
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            All Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.normal.users')}}" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>All normal users</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.all.authors')}}" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Authors</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">WEB MANAGEMENT</li>

                <li class="nav-item">
                    <a href="{{route('admin.gallery')}}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Gallery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.about')}}" class="nav-link">
                        <span style="font-size: 21px;">
                            <i class="far fa-question-circle"></i>
                        </span>
                        <p>
                             &nbsp;About Us
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.resources')}}" class="nav-link">
                        <span style="font-size: 21px;">
                            <i class="far fa-question-circle"></i>
                        </span>
                        <p>
                            &nbsp;Resources
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.faq')}}" class="nav-link">
                        <span style="font-size: 21px;">
                            <i class="far fa-question-circle"></i>
                        </span>
                        <p>
                            &nbsp;FAQ
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
