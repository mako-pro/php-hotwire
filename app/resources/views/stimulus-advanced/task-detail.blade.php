<a class="btn-blue mr-3" href="{{ route('stimulus-advanced.update', ['id' => $task->id]) }}">Edit</a>
<a class="btn-red mr-3" href="{{ route('stimulus-advanced.delete', ['id' => $task->id]) }}">Delete</a>
{{ $task->due_date->format("Y-m-d") }} &nbsp; : &nbsp; {{ $task->title }}
