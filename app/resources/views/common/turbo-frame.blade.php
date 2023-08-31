<turbo-frame id="{{ $frame }}">
    @if ($view === null)
        {{ $text ?? '' }}
    @else
        @include($view)
    @endif
</turbo-frame>