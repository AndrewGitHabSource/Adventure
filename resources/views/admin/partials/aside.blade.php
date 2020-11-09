<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/admin" class="brand-link">
        <img src="{{ asset('admin_panel/img/AdminLTELogo.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->profile_photo_path }}" class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>

                                <p>Admin Panel</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Hotels

                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/hotels" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>List Hotels</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/hotels/create" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Hotel</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Countries

                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/countries" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>List Countries</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/countries/create" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Country</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Cities

                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/cities" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>List Cities</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/cities/create" class="nav-link">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Add City</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
