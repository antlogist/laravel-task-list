@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

@isset ($tasks)

<div class="list-group">
    @forelse ($tasks as $task)

    <div class="list-group-item list-group-item-action">
        <div class="d-flex justify-content-between">
            <div>
                <a class="text-decoration-none text-primary" href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
                <div>{{ $task->completed ? 'completed' : 'not completed' }}</div>
            </div>

            <div class="d-flex">
                <form class="me-2" method="POST" action="{{ route('tasks.delete', $task) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-dark" type="submit">Delete</button>
                </form>

                <form method="POST" action="{{ route('tasks.complete', $task) }}">
                    @csrf
                    @method('PUT')
                    <button class="btn btn-outline-dark" type="submit">{{ $task->completed ? 'Completed' : 'Not completed' }}</button>
                </form>
            </div>

        </div>
    </div>

    @empty

    <p>There are no tasks</p>

    @endforelse

    <div class="my-5">
        {{ $tasks->links() }}
    </div>
</div>

@endisset

@endsection