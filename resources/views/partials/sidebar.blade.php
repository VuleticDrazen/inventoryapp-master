<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="{{ asset('/img/amplitudo.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">InventoryApp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">

                <img src="https://eu.ui-avatars.com/api/?name={{\Illuminate\Support\Facades\Auth::user()->name }}"/>

                   </div>
            <div class="info">
                <a href="/users/{{\Illuminate\Support\Facades\Auth::user()->id}}" class="d-block">{{\Illuminate\Support\Facades\Auth::user()->name}}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
{{--        <div class="form-inline">--}}
{{--            <div class="input-group" data-widget="sidebar-search">--}}
{{--                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">--}}
{{--                <div class="input-group-append">--}}
{{--                    <button class="btn btn-sidebar">--}}
{{--                        <i class="fas fa-search fa-fw"></i>--}}
{{--                    </button>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-header">Menu options</li>
{{--                <li class="nav-item menu-open">--}}
{{--                    <a href="#" class="nav-link active">--}}
{{--                        <i class="nav-icon fas fa-tachometer-alt"></i>--}}
{{--                        <p>--}}
{{--                            Dashboard--}}
{{--                            <i class="right fas fa-angle-left"></i>--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <ul class="nav nav-treeview">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="./index.html" class="nav-link active">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Dashboard v1</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="./index2.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Dashboard v2</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="./index3.html" class="nav-link">--}}
{{--                                <i class="far fa-circle nav-icon"></i>--}}
{{--                                <p>Dashboard v3</p>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

               @if(\Illuminate\Support\Facades\Auth::user()->role_id == 1)
                    <li class="nav-item">
                        <a href="/departments" class="nav-link {{ request()->is('departments*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-microchip" aria-hidden="true"></i>
                            <p>
                                Departments
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/positions" class="nav-link {{ request()->is('positions*') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-hat-wizard" aria-hidden="true"></i>
                            <p>
                                Positions
                            </p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/users" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Employees
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/equipment" class="nav-link {{ request()->is('equipment*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-laptop-code"></i>
                        <p>
                            Equipment
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/documents" class="nav-link {{ request()->is('documents*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-paperclip"></i>
                        <p>
                            Documents
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/tickets" class="nav-link {{ request()->is('tickets*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-envelope-open" aria-hidden="true"></i>
                        <p>
                            Tickets
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
