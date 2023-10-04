@extends('layouts.app')

@section('title', 'New task')

@section('content')

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>

        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
        </div>

        <div>
            <button type="submit">Add</button>
        </div>
    </form>

@endsection
