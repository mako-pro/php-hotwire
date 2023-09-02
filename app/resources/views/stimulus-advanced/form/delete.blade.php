<form method="post" action="{{ route('stimulus-advanced.delete', ['id' => $form['id']]) }}">
    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        Are you sure you want to delete "{{ $form['title'] }}"?
    </div>
    <input type="hidden" name="_token" value="{{ token() }}">
    <button type="submit" class="btn-green mt-2 block" value="Submit">Submit</button>
    <a href="{{ route('stimulus-advanced.list') }}" class="btn-red ml-2">Cancel</a>
</form>