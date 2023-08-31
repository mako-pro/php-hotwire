@extends('turbo-frame.base')

@section('page-title', 'Detail')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Task Detail</h1>
        <div class="mb-3 p-3 border">
            @include('turbo-frame.task-detail', ['task' => $task])
        </div>
        <div>
            <a href="{{ route('turbo-frame.list') }}" class="btn-blue">Go to list</a>
        </div>
    </div>
@stop