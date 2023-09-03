@extends('turbo-stream.base')

@section('page-title', 'Index')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Turbo Stream Index Page</h1>
        <div class="mb-4">
            <turbo-frame id="task-create" src="{{ route('turbo-stream.create') }}">
                Loading...
            </turbo-frame>
            <turbo-frame id="task-list" src="{{ route('turbo-stream.list') }}">
                Loading...
            </turbo-frame>
        </div>
    </div>
@stop
