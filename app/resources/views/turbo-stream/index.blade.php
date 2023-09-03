@extends('turbo-stream.base')

@section('page-title', 'Index')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Turbo Stream Index Page</h1>
        <div class="mb-4">
            <turbo-frame id="task-create" src="{{ route('turbo-stream.create') }}">
                Loading...
            </turbo-frame>
            <h2 class="flex justify-between rounded text-md bg-amber-100 py-1 px-4 my-4">
                <span>Task list</span>
                <span class="text-sm mt-1">Total count: <span id="task-count">{{ $count }}</span></span>
            </h2>
            <turbo-frame id="task-list" src="{{ route('turbo-stream.list') }}">
                Loading...
            </turbo-frame>
        </div>
    </div>
@stop
