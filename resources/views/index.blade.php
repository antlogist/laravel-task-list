@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

<div>
    <a href="{{ route('tasks.create') }}">Create</a>
</div>

    @isset ($tasks)

        @forelse ($tasks as $task)
        
            <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
            <div>{{ $task->completed ? 'completed' : 'not completed' }}</div>
            
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

        @empty

            <p>There are no tasks</p>

        @endforelse

    @endisset

@endsection