@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10">{{ $task->description }}</textarea>
        </div>

        <button type="submit">Update</button>

    </form>

@endsection