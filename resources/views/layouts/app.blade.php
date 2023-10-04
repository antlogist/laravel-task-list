<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>

<body>

    @if(session()->has('success'))
        <div>
            <h2>{{ session('success') }}</h2>
        </div>
    @endif

    <div>
        <a href="{{ route('tasks.index') }}">Task List</a>
    </div>

    @yield('content')
</body>

</html>