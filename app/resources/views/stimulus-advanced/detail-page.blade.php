@extends('stimulus-advanced.base')

@section('page-title', 'Detail')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Task Detail</h1>
        <div class="mb-3 p-3 border">
            @include('stimulus-advanced.task-detail', ['task' => $task])
        </div>
        <div>
            <a href="{{ route('stimulus-advanced.list') }}" class="btn-blue">Go to list</a>
        </div>
    </div>
@stop