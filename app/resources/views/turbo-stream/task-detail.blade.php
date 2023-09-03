@if ($task->streamingFlag ?? false)
    <li class="p-3 items-center" id="task-detail-li-{{ $task->id }}">
        <turbo-frame id="task-detail-{{ $task->id }}">
            <a class="btn-blue mr-3" href="{{ route('turbo-stream.update', ['id' => $task->id]) }}">Edit</a>
            <a class="btn-red mr-3" href="{{ route('turbo-stream.delete', ['id' => $task->id]) }}">Delete</a>
            {{ $task->due_date->format("Y-m-d") }} &nbsp; : &nbsp; {{ $task->title }}
        </turbo-frame>
    </li>
@elseif (turbo_frame())
    <turbo-frame id="task-detail-{{ $task->id }}">
        <a class="btn-blue mr-3" href="{{ route('turbo-stream.update', ['id' => $task->id]) }}">Edit</a>
        <a class="btn-red mr-3" href="{{ route('turbo-stream.delete', ['id' => $task->id]) }}">Delete</a>
        {{ $task->due_date->format("Y-m-d") }} &nbsp; : &nbsp; {{ $task->title }}
    </turbo-frame>
@else
    <a class="btn-blue mr-3" href="{{ route('turbo-stream.update', ['id' => $task->id]) }}">Edit</a>
    <a class="btn-red mr-3" href="{{ route('turbo-stream.delete', ['id' => $task->id]) }}">Delete</a>
    {{ $task->due_date->format("Y-m-d") }} &nbsp; : &nbsp; {{ $task->title }}
@endif