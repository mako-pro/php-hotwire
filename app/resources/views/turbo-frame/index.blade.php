@extends('turbo-frame.base')

@section('page-title', 'Index')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Turbo Frame Index Page</h1>
        <turbo-frame id="task-list">
            <a class="btn-blue" href="{{ route('turbo-frame.list') }}">Click to load...</a>
        </turbo-frame>
    </div>
@stop
