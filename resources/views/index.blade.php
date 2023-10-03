<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>

<body>

    @isset ($tasks)

        @forelse ($tasks as $task)

        <div>
            <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
        @empty

        <p>There are no tasks</p>

        @endforelse

    @endisset

</body>

</html>