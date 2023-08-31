<form method="post" action="{{ route('turbo-frame.create') }}">
    <div class="mb-4 mt-2">
        <div class="grid grid-cols-1 gap-6">
            <label class="block">
                <span class="text-gray-600">Title *</span>
                <input class="mt-1 block w-full rounded-md bg-gray-100 focus:border-gray-500 focus:bg-white focus:ring-0
                    @if ($errors['title'] ?? '') border-red-500 @else border-transparent @endif"
                    type="text"
                    name="title"
                    value="{{ $form['title'] }}"
                >
                @if ($errors['title'] ?? '')
                    <p class="text-red-500 text-xs italic"><strong>{{ $errors['title'] }}</strong></p>
                @endif
            </label>
            <label class="block">
                <span class="text-gray-600">Due date *</span>
                <input class="mt-1 block w-full rounded-md bg-gray-100 focus:border-gray-500 focus:bg-white focus:ring-0
                    @if ($errors['due_date'] ?? '') border-red-500 @else border-transparent @endif"
                    type="text"
                    name="due_date"
                    value="{{ $form['due_date'] }}"
                >
                @if ($errors['due_date'] ?? '')
                    <p class="text-red-500 text-xs italic"><strong>{{ $errors['due_date'] }}</strong></p>
                @endif
            </label>
        </div>
        <input type="hidden" name="_token" value="{{ token() }}">
        <button type="submit" class="btn-green mt-6 block" value="Submit">Submit</button>
    </div>
</form>