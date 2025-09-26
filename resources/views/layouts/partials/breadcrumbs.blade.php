<nav class="bg-white rounded-md shadow-none border px-4 py-2 w-full">
    <div class="flex items-center justify-between gap-3">

        <!-- Left: breadcrumbs -->
        <ol class="flex items-center text-sm" style="color: #3E0703;">

            <!-- Home -->
            <li class="flex items-center">
                <a href="/" class="flex items-center" style="color: #3E0703;">
                    <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 16 16" style="color: #3E0703;">
                        <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                    <span>Home</span>
                </a>
            </li>

            <!-- Dynamic breadcrumbs -->
            @for ($i = 0; $i < 10; $i++)
                @php
                    $slotVar = 'url_' . $i;
                    $slotValue = isset($$slotVar) ? json_decode($$slotVar, true) : null;
                @endphp

                @if (!empty($slotValue) && is_array($slotValue))
                    <li class="flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: #3E0703;">
                            <path d="M9 517 7-7 7" />
                        </svg>
                        <a href="{{ $slotValue['link'] ?? '#' }}" style="color: #3E0703;" onmouseover="this.style.color='#ff4433'" onmouseout="this.style.color='#3E0703'">
                            {{ $slotValue['text'] ?? 'Plan Panther' . $i }}
                        </a>
                    </li>
                @endif
            @endfor

            <!-- Current page -->
            @if (!empty($active))
                <li class="flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="color: #3E0703;">
                        <path d="M9 517 7-7 7" />
                    </svg>
                    <span class="mx-2" style="color: #3E0703;">{{ $active }}</span>
                </li>
            @endif
        </ol>
        
    </div>
</nav>
