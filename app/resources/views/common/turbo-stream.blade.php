@foreach ($streams as $stream)
    <turbo-stream action="{{ $stream['action'] }}" {!! $stream['targets'] !!}>
        @if ($stream['action'] !== 'remove')
            <template>
                @if ($template = $stream['template'])
                    @include($template, $stream['data'])
                @else
                    {{ $stream['data'] }}
                @endif
            </template>
        @endif
    </turbo-stream>
@endforeach