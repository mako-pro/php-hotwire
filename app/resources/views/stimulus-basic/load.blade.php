@extends('stimulus-basic.base')

@section('page-title', 'Load')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Load Content with Turbo Frame</h1>
        <turbo-frame id="page-content">
            <a class="btn-blue" href="{{ route('stimulus-basic.counter') }}">
                Click to load content with Turbo Frame
            </a>
        </turbo-frame>
    </div>
@stop