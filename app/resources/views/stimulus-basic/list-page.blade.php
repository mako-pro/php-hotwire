@extends('stimulus-basic.base')

@section('page-title', 'List')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Task List</h1>
        <div class="md:w-2/3 bg-white rounded-lg border mb-4">
            <ul class="divide-y-2 divide-gray-100" id="task-list-ul">
                @foreach ($tasks as $task)
                    <li class="p-3 flex items-center">
                        {{ $task->due_date->format("Y-m-d") }} &nbsp; : &nbsp; {{ $task->title }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop