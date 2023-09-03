@extends('turbo-stream.base')

@section('page-title', 'Delete')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Delete Task</h1>
        @include('turbo-stream.form.delete')
    </div>
@stop