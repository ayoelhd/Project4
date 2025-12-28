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

            <a class="nav-link px-3 {{ request()->routeIs('professor.*') ? 'active' : '' }}" href="{{ route('professor.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-chalkboard-teacher text-warning"></i></div>
                Professors
            </a>

            <a class="nav-link px-3 {{ request()->routeIs('course.*') ? 'active' : '' }}" href="{{ route('course.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-book-open text-light"></i></div>
                Courses
            </a>

            <a class="nav-link px-3 {{ request()->routeIs('enrollment.*') ? 'active' : '' }}" href="{{ route('enrollment.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-file-signature text-danger"></i></div>
                Enrollment
            </a>

            <div class="sb-sidenav-menu-heading border-top border-secondary mt-2">SYSTEM</div>
            
            <a class="nav-link px-3 text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                Logout
            </a>

            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
    </div>
    
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        <span class="fw-bold">Admin Portal</span>
    </div>
</nav>