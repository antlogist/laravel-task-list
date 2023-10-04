<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container position-relative">
        @if(session()->has('success'))
        <div class="alert alert-success mt-5" id="successAlert">
            {{ session('success') }}
        </div>
        @endif

        <div class="d-flex my-5">
            <a class="btn btn-outline-dark" href="{{ route('tasks.index') }}">Task List</a>
            <a class="btn btn-outline-dark mx-2" href="{{ route('tasks.create') }}">Create</a>
        </div>

        @yield('content')
    </div>

    <script>
        const successAlert = document.querySelector('#successAlert')
        if(successAlert) {
            setTimeout(function(){
                successAlert.remove();
            }, 1000);
        }
    </script>

</body>

</html>