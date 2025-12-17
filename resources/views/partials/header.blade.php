<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home.index') }}">University Portal</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('student.index') }}">Students</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('department.index') }}">Departments</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('course.index') }}">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('professor.index') }}">Professors</a></li>
            </ul>
        </div>
    </div>
</nav>
