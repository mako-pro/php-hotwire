@extends('base')

@section('page-title', 'PHP Hotwire - Welcome Page')

@section('content')
    <div class="jumbotron h-screen py-5">
        <div class="w-full max-w-7xl mx-auto px-4">
            <h1 class="flex justify-center text-5xl text-emerald-800 mb-6">PHP Hotwire Application</h1>
            <h2 class="flex justify-center text-md uppercase text-white mb-6">Section navigation</h2>
            <p class="flex justify-center">
                <a class="btn-blue mr-3" href="{{ route('turbo-drive.index') }}" role="button">Turbo Drive</a>
                <a class="btn-blue mr-3" href="{{ route('turbo-frame.index') }}" role="button">Turbo Frame</a>
                <a class="btn-blue mr-3" href="{{ route('stimulus-basic.index') }}" role="button">Stimulus Basic</a>
                <a class="btn-blue mr-3" href="{{ route('stimulus-advanced.index') }}" role="button">Stimulus Advanced</a>
                <a class="btn-blue" href="{{ route('turbo-stream.index') }}" role="button">Turbo Stream</a>
            </p>
        </div>
    </div>
@stop