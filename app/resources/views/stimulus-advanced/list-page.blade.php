@extends('stimulus-advanced.base')

@section('page-title', 'List')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Task List</h1>
        <div class="bg-white rounded-lg border mb-4">
            <ul class="divide-y-2 divide-gray-100" id="task-list-ul">
                @foreach ($tasks as $task)
                    <li class="p-3 items-center">
                        @include('stimulus-advanced.task-detail', ['task' => $task])
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop