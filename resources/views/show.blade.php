@extends('layouts.app')

@section('title', $task->title)

@section('content')

<h1>{{ $task->title }}</h1>

<div class="mt-3">
    {{ $task->description }}
</div>

<div class="d-flex my-5">
    <div>
        <a class="btn btn-outline-dark" href="{{ route('tasks.edit', $task) }}">Edit</a>
    </div>

    <form class="ms-2" method="POST" action="{{ route('tasks.delete', $task) }}">
        @csrf
        @method('DELETE')
        <button class="btn btn-outline-dark" type="submit">Delete</button>
    </form>

    <form class="ms-2" method="POST" action="{{ route('tasks.complete', $task) }}">
        @csrf
        @method('PUT')
        <button class="btn btn-outline-dark" type="submit">{{ $task->completed ? 'Completed' : 'Not completed' }}</button>
    </form>
</div>

@endsection
</body>

</html>