<form method="post" action="{{ route('turbo-frame.delete', ['id' => $form['id']]) }}">
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        Are you sure you want to delete "{{ $form['title'] }}"?
    </div>
    <input type="hidden" name="_token" value="{{ token() }}">
    <button type="submit" class="btn-green mt-2 block" value="Submit">Submit</button>
    @if (turbo_frame())
        <a href="{{ route('turbo-frame.detail', ['id' => $form['id']]) }}" class="btn-red ml-2">Cancel</a>
    @else
        <a href="{{ route('turbo-frame.list') }}" class="btn-red ml-2">Cancel</a>
    @endif
</form>