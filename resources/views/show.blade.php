@extends('layouts.app')

@section('title', $task->title)

@section('content')

    {{ $task->title }}
    <br>
    {{ $task->description }}
    <br>
    <div>
        <a href="{{ route('tasks.edit', $task) }}">Edit</a>
        <form method="POST" action="{{ route('tasks.delete', $task) }}">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

        <form method="POST" action="{{ route('tasks.complete', $task) }}">
            @csrf
            @method('PUT')
            <button type="submit">{{ $task->completed ? 'Completed' : 'Not completed' }}</button>
        </form>
    </div>

@endsection
</body>

</html>