<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('restaurants.index') }}">
                    <span data-feather="box"></span>
                    Rooms &amp; Suites
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('facilities.index', ['type' => 'facility']) }}">
                    <span data-feather="award"></span>
                    Facilities
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('facilities.index', ['type' => 'restaurant']) }}">
                    <span data-feather="award"></span>
                    Restaurants
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('facilities.index', ['type' => 'meeting-event']) }}">
                    <span data-feather="award"></span>
                    Meetings &amp; Events
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('coupons.index') }}">
                    <span data-feather="gift"></span>
                    Coupons
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('banners.index') }}">
                    <span data-feather="layers"></span>
                    Banners
                </a>
            </li>
        </ul>
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Operations</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bookings.index') }}">
                    <span data-feather="shopping-cart"></span>
                    Bookings
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customers.index') }}">
                    <span data-feather="users"></span>
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('reports.index') }}">
                    <span data-feather="bar-chart-2"></span>
                    Reports
                </a>
            </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Administration</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle"></span>
            </a>
        </h6>
        <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <span data-feather="users"></span>
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('roles.index') }}">
                    <span data-feather="tag"></span>
                    Roles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('settings.index') }}">
                    <span data-feather="file-text"></span>
                    Settings
                </a>
            </li>
        </ul>
    </div>
</nav>
