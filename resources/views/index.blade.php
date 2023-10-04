<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
</head>

<body>

    <div>
        <a href="{{ route('tasks.create') }}">Create</a>
    </div>

    @isset ($tasks)

        @forelse ($tasks as $task)

        <div>
            <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
            <form method="POST" action="{{ route('tasks.delete', $task) }}">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @empty

        <p>There are no tasks</p>

        @endforelse

    @endisset

</body>

</html>