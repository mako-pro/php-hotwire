@extends('turbo-frame.base')

@section('page-title', 'Index')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Turbo Frame Index Page</h1>
        <turbo-frame id="task-create" src="{{ route('turbo-frame.create') }}">
            Loading...
        </turbo-frame>
        <turbo-frame id="task-list" src="{{ route('turbo-frame.list') }}">
            Loading...
        </turbo-frame>
    </div>
@stop
