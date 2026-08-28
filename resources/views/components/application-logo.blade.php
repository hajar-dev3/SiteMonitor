<a href="{{ url('/') }}" {{ $attributes->merge(['class' => 'flex items-center gap-3']) }}>

    {{-- Logo Icon --}}
    <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-600 text-white shadow-lg shadow-blue-600/20">

        <svg
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M13 2L3 14h9l-1 8 10-12h-9l1-8Z"
            />
        </svg>

    </div>

    {{-- Logo Text --}}
    <div>
        <span class="block text-lg font-bold tracking-tight text-current">
            SiteMonitor
        </span>

        <span class="block text-[10px] font-medium tracking-wide text-slate-400">
            WEBSITE MONITORING
        </span>
    </div>

</a>