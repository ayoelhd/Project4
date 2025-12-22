<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav d-flex flex-column">
            
            <div class="sb-sidenav-menu-heading">MAIN</div>
            <a class="nav-link px-3 {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt text-primary"></i></div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading border-top border-secondary mt-2">MANAGEMENT</div>
            
            <a class="nav-link px-3 {{ request()->routeIs('department.*') ? 'active' : '' }}" href="{{ route('department.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-university text-success"></i></div>
                Departments
            </a>

            <a class="nav-link px-3 {{ request()->routeIs('student.*') ? 'active' : '' }}" href="{{ route('student.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-user-graduate text-info"></i></div>
                Students
            </a>

            <a class="nav-link px-3" href="#">
                <div class="sb-nav-link-icon"><i class="fas fa-book text-warning"></i></div>
                Courses
            </a>

            <a class="nav-link px-3 {{ request()->routeIs('enrollment.*') ? 'active' : '' }}" href="{{ route('enrollment.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-file-signature text-danger"></i></div>
                Enrollment
            </a>

            <div class="sb-sidenav-menu-heading border-top border-secondary mt-2">SYSTEM</div>
            <a class="nav-link px-3 text-info" href="{{ url('/') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-arrow-left"></i></div>
                Back to Site
            </a>

        </div>
    </div>
    
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <span class="fw-bold">Admin Portal</span>
    </div>
</nav>