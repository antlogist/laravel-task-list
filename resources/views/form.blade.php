<form method="POST" action="{{ isset($task) ? route('tasks.update', $task) : route('tasks.store') }}">
    @csrf

    @isset($task)
        @method('PUT')
    @endisset

    <div>
        <label class="form-label" for="title">Title</label>
        <input class="form-control" type="text" name="title" id="title" value="{{ isset($task) ? $task->title : old('title') }}">
        
        @error('title')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ isset($task) ? $task->description : old('description') }}</textarea>

        @error('description')
            <div class="text-danger small mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="my-3">
        <button class="btn btn-outline-dark" type="submit">{{ isset($task) ? 'Update' : 'Add' }}</button>
    </div>
</form>