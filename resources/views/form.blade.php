<form method="POST" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}">
    @csrf

    @isset($task)
        @method('PUT')
    @endisset

    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ isset($task) ? $task->title : old('title') }}">
        
        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">Description</label>
        <textarea name="description" id="description" cols="30" rows="10">{{ isset($task) ? $task->description : old('description') }}</textarea>

        @error('description')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">{{ isset($task) ? 'Update' : 'Add' }}</button>
    </div>
</form>