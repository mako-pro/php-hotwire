@extends('stimulus-basic.base')

@section('page-title', 'Counter')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Counter</h1>
        <p class="mb-4">
            <button class="btn-blue"
                data-controller="counter"
                data-action="click->counter#increment turbo:before-cache@window->counter#reset"
                data-counter-hide-class="hidden"
            >
                <span data-counter-target="initialDiv">Click Me</span>
                <span data-counter-target="progressDiv" class="hidden">
                    You clicked <span class="font-bold px-1" data-counter-target="count"></span> times!
                </span>
            </button>
        </p>
        <p class="mb-4">
            <button class="btn-green"
                data-controller="counter"
                data-action="click->counter#increment turbo:before-cache@window->counter#reset"
                data-counter-hide-class="hidden"
            >
                <span data-counter-target="initialDiv">Click Me</span>
                <span data-counter-target="progressDiv" class="hidden">
                    You clicked <span class="font-bold px-1" data-counter-target="count"></span> times!
                </span>
            </button>
        </p>
        <p class="mb-4">
            <button class="btn-red"
                data-controller="counter"
                data-action="click->counter#increment turbo:before-cache@window->counter#reset"
                data-counter-hide-class="hidden"
            >
                <span data-counter-target="initialDiv">Click Me</span>
                <span data-counter-target="progressDiv" class="hidden">
                    You clicked <span class="font-bold px-1" data-counter-target="count"></span> times!
                </span>
            </button>
        </p>
    </div>
@stop