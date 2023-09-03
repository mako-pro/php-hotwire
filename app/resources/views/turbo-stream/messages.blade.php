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
        data-controller="alert"
        data-alert-dismiss-after-value="1000"
        data-alert-remove-delay-value="0"
        role="alert"
    >
        <span class="inline-block align-middle mr-8">
            {{ $message }}
        </span>
        <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none"
            data-action="alert#close"
        >
            <span>×</span>
        </button>
    </div>
@endforeach