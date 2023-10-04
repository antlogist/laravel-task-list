<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    {{ $task->title }}
    <br>
    {{ $task->description }}
    <br>
    <div>
        <a href="{{ route('tasks.edit', $task) }}">Edit</a>
    </div>
</body>

</html>