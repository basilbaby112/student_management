<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
</head>
<body>
    <nav>
        <a href="{{ route('students.index') }}">Students</a>
        <a href="{{ route('marks.index') }}">Marks</a>
    </nav>
    <div>
        @yield('content')
    </div>
</body>
</html>
