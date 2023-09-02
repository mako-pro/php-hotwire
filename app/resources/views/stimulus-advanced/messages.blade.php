@foreach ($messages ?? flashdata() as $key => $message)
    <div class="px-6 py-4 border-0 relative text-white
        @if ($key == 'info')
            bg-sky-500
        @elseif ($key == 'success')
            bg-emerald-500
        @elseif ($key == 'error')
            bg-red-500
        @elseif ($key == 'warning')
            bg-amber-500
        @endif"
        data-turbo-temporary="true"
        role="alert"
    >
        <span class="inline-block align-middle mr-8">
            {{ $message }}
        </span>
    </div>
@endforeach