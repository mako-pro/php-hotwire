@extends('stimulus-advanced.base')

@section('page-title', 'Modal')

@section('content')
    <div class="w-full max-w-3xl mx-auto px-4">
        <h1 class="text-3xl sm:text-4xl mb-6">Modal Demo</h1>
        <div class="relative z-10"
            data-controller="modal"
            data-action="keydown.esc->modal#close"
            data-modal-url-value="{{ route('stimulus-advanced.create') }}"
            tabindex="-1"
        >
            <a href="#" data-action="click->modal#open" class="btn-blue">Open Modal</a>
            <!-- Modal Background -->
            <div class="hidden fixed inset-0 bg-black bg-opacity-80 overflow-y-auto flex items-center justify-center"
                data-modal-target="background"
                data-action="click->modal#closeBackground"
                data-transition-enter="transition-all ease-in-out duration-300"
                data-transition-enter-from="bg-opacity-0"
                data-transition-enter-to="bg-opacity-80"
                data-transition-leave="transition-all ease-in-out duration-300"
                data-transition-leave-from="bg-opacity-80"
                data-transition-leave-to="bg-opacity-0">
                <!-- Modal Container -->
                <div class="max-h-screen w-full max-w-lg relative"
                    data-modal-target="container"
                >
                    <!-- Modal Card -->
                    <div class="m-1 bg-white rounded shadow">
                        <div class="p-8">
                            <turbo-frame id="modal-content" src="{{ route('stimulus-advanced.create') }}">
                            </turbo-frame>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
