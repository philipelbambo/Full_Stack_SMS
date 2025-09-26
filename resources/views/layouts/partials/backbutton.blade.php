@if (isset($return))
    @php
        $defaultBack = json_decode($return ?? '{"link":"/", "text":"Back"}');
        $text = $defaultBack->text;
        $link $defaultBack->link;
    @endphp
    <a href="{{ $link }}" class="inline-flex items-center mb-3 gap-1 text-sm text-gray-600 hover:underline">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="icon icon-tabler icons-tabler-outline icon-tabler-arrow-left-dashed">
            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
            <path d="M5 12h6m3 0h1.5m3 0h.5" />
            <path d="M5 1216 6" />
            <path d="M5 1216 -6" />
        </svg>
        {{ $text }}
    </a>
@endif