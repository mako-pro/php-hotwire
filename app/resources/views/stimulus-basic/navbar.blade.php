<nav class="flex items-center justify-between flex-wrap bg-teal-600 p-6 mb-4">
    <div class="w-full max-w-3xl mx-auto font-bold">
        <a href="{{ route('index') }}" class="inline-block mt-0 text-teal-200 hover:text-white mx-4">
            Index
        </a>
        <a href="{{ route('stimulus-basic.counter') }}" class="inline-block mt-0 text-teal-200 hover:text-white mr-4">
            Counter
        </a>
        <a href="{{ route('stimulus-basic.load') }}" class="inline-block mt-0 text-teal-200 hover:text-white mr-4">
            Turbo Frame
        </a>
        <a href="{{ route('stimulus-basic.list') }}" class="inline-block mt-0 text-teal-200 hover:text-white mr-4">
            List
        </a>
        <a href="{{ route('stimulus-basic.create') }}" class="inline-block mt-0 text-teal-200 hover:text-white mr-4">
            Create
        </a>
    </div>
</nav>
