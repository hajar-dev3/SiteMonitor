<x-app-layout>

    {{-- ========================================================= --}}
    {{-- ANIMATIONS --}}
    {{-- ========================================================= --}}

    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(.96);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .animate-fade-up {
            animation: fadeUp .65s ease-out both;
        }

        .animate-fade-in {
            animation: fadeIn .7s ease-out both;
        }

        .animate-scale-in {
            animation: scaleIn .55s ease-out both;
        }

        .delay-100 {
            animation-delay: .1s;
        }

        .delay-200 {
            animation-delay: .2s;
        }

        .delay-300 {
            animation-delay: .3s;
        }

        .delay-400 {
            animation-delay: .4s;
        }

        .delay-500 {
            animation-delay: .5s;
        }

        .delay-600 {
            animation-delay: .6s;
        }

        .dashboard-card {
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                border-color .25s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-4px);
        }

        .dashboard-row {
            transition:
                background-color .2s ease,
                transform .2s ease;
        }

        .dashboard-row:hover {
            transform: translateX(3px);
        }

        .dashboard-button {
            transition:
                transform .2s ease,
                box-shadow .2s ease;
        }

        .dashboard-button:hover {
            transform: translateY(-2px);
        }

        @media (prefers-reduced-motion: reduce) {

            .animate-fade-up,
            .animate-fade-in,
            .animate-scale-in {
                animation: none;
            }

            .dashboard-card,
            .dashboard-row,
            .dashboard-button {
                transition: none;
            }
        }
    </style>


    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <x-slot name="header">

        <div
            class="animate-fade-up relative overflow-hidden rounded-3xl border border-[#d8e8e6] bg-gradient-to-r from-[#f5fbfa] via-[#eef8f7] to-[#f8f3f8] px-6 py-6 shadow-sm sm:px-8">

            {{-- Decorative elements --}}
            <div
                class="pointer-events-none absolute -right-20 -top-24 h-64 w-64 rounded-full bg-[#9bdedc]/25 blur-3xl">
            </div>

            <div
                class="pointer-events-none absolute -bottom-28 left-1/3 h-64 w-64 rounded-full bg-[#c9b4d5]/20 blur-3xl">
            </div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="mb-2 flex items-center gap-2">

                        <span class="h-2 w-2 rounded-full bg-[#3f968d]"></span>

                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#568b85]">
                            SiteMonitor
                        </span>

                    </div>

                    <h2 class="text-3xl font-black tracking-tight text-[#163d3a]">
                        Dashboard
                    </h2>

                    <p class="mt-1 text-sm text-[#718582]">
                        Monitor your websites, uptime and system activity.
                    </p>

                </div>

                <a
                    href="{{ route('sites.create') }}"
                    class="dashboard-button group inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#126b70] to-[#247f8b] px-5 py-3 text-sm font-bold text-white shadow-lg shadow-[#126b70]/20 transition duration-200 hover:shadow-xl">

                    <span
                        class="flex h-6 w-6 items-center justify-center rounded-lg bg-white/15 text-lg transition group-hover:rotate-90">
                        +
                    </span>

                    Add Website

                </a>

            </div>

        </div>

    </x-slot>


    {{-- ========================================================= --}}
    {{-- MAIN --}}
    {{-- ========================================================= --}}

    <div class="min-h-screen bg-[#f5f1e8]">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">


            {{-- ================================================= --}}
            {{-- OVERVIEW --}}
            {{-- ================================================= --}}

            <div class="animate-fade-up delay-100 mb-8">

                <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">

                    <div>

                        <p class="text-sm font-semibold text-[#5d8e87]">
                            System Overview
                        </p>

                        <h1 class="mt-1 text-3xl font-black tracking-tight text-[#243c39] sm:text-4xl">
                            Monitoring Overview
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-6 text-[#7b8985]">
                            Keep track of your websites, availability and latest monitoring activity from one place.
                        </p>

                    </div>


                    {{-- System status --}}

                    @php
                        $systemOperational = $totalSites === 0 || $downSites === 0;
                    @endphp

                    <div
                        class="inline-flex w-fit items-center gap-3 rounded-2xl border
                        {{ $systemOperational
                            ? 'border-[#cde5df] bg-[#f3faf7]'
                            : 'border-[#efd0cd] bg-[#fff4f2]' }}
                        px-4 py-3">

                        <span class="relative flex h-3 w-3">

                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full
                                {{ $systemOperational ? 'bg-[#65a981]' : 'bg-[#d06a62]' }}
                                opacity-50">
                            </span>

                            <span
                                class="relative inline-flex h-3 w-3 rounded-full
                                {{ $systemOperational ? 'bg-[#438c61]' : 'bg-[#c44743]' }}">
                            </span>

                        </span>

                        <div>

                            <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#79928a]">
                                System Status
                            </p>

                            <p
                                class="text-sm font-bold
                                {{ $systemOperational ? 'text-[#3d6f56]' : 'text-[#a84542]' }}">
                                {{ $systemOperational ? 'Operational' : 'Attention required' }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- STATISTICS --}}
            {{-- ================================================= --}}

            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


                {{-- Total --}}

                <div
                    class="dashboard-card animate-scale-in delay-100 group relative overflow-hidden rounded-3xl border border-[#c9e5e5] bg-gradient-to-br from-white to-[#edf9f9] p-6 shadow-sm">

                    <div
                        class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#a8dfe0]/30 blur-2xl">
                    </div>

                    <div class="relative z-10">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-semibold text-[#668784]">
                                    Total Websites
                                </p>

                                <p class="mt-2 text-4xl font-black tracking-tight text-[#164f55]">
                                    {{ $totalSites }}
                                </p>

                            </div>

                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#cceeed] text-[#247b80] transition duration-300 group-hover:scale-110">

                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path stroke-linecap="round" d="M3 12h18"></path>
                                    <path stroke-linecap="round"
                                        d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z">
                                    </path>
                                </svg>

                            </div>

                        </div>

                        <div class="mt-5 border-t border-[#d8eeee] pt-4">

                            <p class="text-xs font-medium text-[#829795]">
                                Websites under monitoring
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Online --}}

                <div
                    class="dashboard-card animate-scale-in delay-200 group relative overflow-hidden rounded-3xl border border-[#cde4d3] bg-gradient-to-br from-white to-[#f0f8f1] p-6 shadow-sm">

                    <div
                        class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#b9dbbd]/30 blur-2xl">
                    </div>

                    <div class="relative z-10">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-semibold text-[#6d8874]">
                                    Online
                                </p>

                                <p class="mt-2 text-4xl font-black tracking-tight text-[#39734d]">
                                    {{ $onlineSites }}
                                </p>

                            </div>

                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#dcefdc] text-[#47845b] transition duration-300 group-hover:scale-110">

                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>

                            </div>

                        </div>

                        <div class="mt-5 border-t border-[#dcebdc] pt-4">

                            <p class="text-xs font-medium text-[#819184]">
                                Websites currently online
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Down --}}

                <div
                    class="dashboard-card animate-scale-in delay-300 group relative overflow-hidden rounded-3xl border border-[#f0d1d1] bg-gradient-to-br from-white to-[#fff2f1] p-6 shadow-sm">

                    <div
                        class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#f0b0aa]/25 blur-2xl">
                    </div>

                    <div class="relative z-10">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-semibold text-[#9b716e]">
                                    Down
                                </p>

                                <p class="mt-2 text-4xl font-black tracking-tight text-[#a83d3d]">
                                    {{ $downSites }}
                                </p>

                            </div>

                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#fde1df] text-[#c04444] transition duration-300 group-hover:scale-110">

                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z">
                                    </path>
                                </svg>

                            </div>

                        </div>

                        <div class="mt-5 border-t border-[#f1dada] pt-4">

                            <p class="text-xs font-medium text-[#997b78]">
                                Websites requiring attention
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Uptime --}}

                <div
                    class="dashboard-card animate-scale-in delay-400 group relative overflow-hidden rounded-3xl border border-[#d7cee2] bg-gradient-to-br from-white to-[#f5f0f8] p-6 shadow-sm">

                    <div
                        class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#d2bcdc]/30 blur-2xl">
                    </div>

                    <div class="relative z-10">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-semibold text-[#806d89]">
                                    Average Uptime
                                </p>

                                <p class="mt-2 text-4xl font-black tracking-tight text-[#694e77]">
                                    {{ number_format($averageUptime, 1) }}%
                                </p>

                            </div>

                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#eadff0] text-[#76577f] transition duration-300 group-hover:scale-110">

                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l5-5 4 4 7-8"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7h4v4"></path>
                                </svg>

                            </div>

                        </div>

                        <div class="mt-5 border-t border-[#e6ddea] pt-4">

                            <p class="text-xs font-medium text-[#8d8192]">
                                Overall availability
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- MONITORED WEBSITES --}}
            {{-- ================================================= --}}

            <div
                class="animate-fade-up delay-300 mt-8 overflow-hidden rounded-3xl border border-[#dddcd5] bg-white shadow-sm">

                <div
                    class="border-b border-[#e9e8e2] bg-gradient-to-r from-[#fafdfc] to-[#f9f5fa] px-6 py-6 sm:px-8">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-4">

                            <div
                                class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#dceff0] text-[#287980]">

                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                    stroke-width="1.7">
                                    <circle cx="12" cy="12" r="9"></circle>
                                    <path stroke-linecap="round" d="M3 12h18"></path>
                                    <path stroke-linecap="round"
                                        d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z">
                                    </path>
                                </svg>

                            </div>

                            <div>

                                <h2 class="text-xl font-black text-[#263d3a]">
                                    Monitored Websites
                                </h2>

                                <p class="mt-1 text-sm text-[#7e8c89]">
                                    Availability and latest monitoring results.
                                </p>

                            </div>

                        </div>

                        <a
                            href="{{ route('sites.index') }}"
                            class="dashboard-button inline-flex w-fit items-center gap-2 rounded-xl border border-[#cde3e3] bg-white px-4 py-2 text-sm font-bold text-[#32767b] transition hover:bg-[#edf8f7]">

                            View all

                            <span class="transition-transform duration-200 group-hover:translate-x-1">
                                →
                            </span>

                        </a>

                    </div>

                </div>


                @if($sites->count() > 0)

                    <div class="divide-y divide-[#eeeDE7]">

                        @foreach($sites as $site)

                            @php
                                $lastCheck = $site->verifications->first();

                                $status = strtoupper((string) ($lastCheck?->status ?? ''));

                                $isUp = $status === 'UP';
                                $isDown = $status === 'DOWN';
                            @endphp

                            <div class="dashboard-row p-6 transition hover:bg-[#fbfcfa] sm:p-7">

                                <div
                                    class="flex flex-col gap-6 xl:flex-row xl:items-center xl:justify-between">


                                    {{-- Website --}}

                                    <div class="flex min-w-0 items-start gap-4">

                                        <div
                                            class="flex h-13 w-13 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#d9eff0] to-[#c4e4e4] text-[#27767c] transition duration-300 hover:scale-105">

                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                stroke="currentColor" stroke-width="1.7">
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <path stroke-linecap="round" d="M3 12h18"></path>
                                                <path stroke-linecap="round"
                                                    d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z">
                                                </path>
                                            </svg>

                                        </div>


                                        <div class="min-w-0">

                                            <div class="flex flex-wrap items-center gap-3">

                                                <h3 class="text-base font-black text-[#293d3a]">
                                                    {{ $site->name }}
                                                </h3>


                                                @if($isUp)

                                                    <span
                                                        class="inline-flex items-center gap-2 rounded-full bg-[#e5f4e7] px-3 py-1 text-xs font-bold text-[#3d7950]">

                                                        <span class="h-1.5 w-1.5 rounded-full bg-[#4f9a63]"></span>

                                                        Online

                                                    </span>

                                                @elseif($isDown)

                                                    <span
                                                        class="inline-flex items-center gap-2 rounded-full bg-[#fde6e3] px-3 py-1 text-xs font-bold text-[#b03f3f]">

                                                        <span class="h-1.5 w-1.5 rounded-full bg-[#d04b47]"></span>

                                                        Down

                                                    </span>

                                                @else

                                                    <span
                                                        class="inline-flex items-center gap-2 rounded-full bg-[#f1f1ec] px-3 py-1 text-xs font-bold text-[#777d79]">

                                                        <span class="h-1.5 w-1.5 rounded-full bg-[#999f9b]"></span>

                                                        Not checked

                                                    </span>

                                                @endif

                                            </div>


                                            <a
                                                href="{{ $site->url }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="mt-1 block max-w-xl truncate text-sm font-medium text-[#3c8c91] transition hover:text-[#166b70]">

                                                {{ $site->url }}

                                            </a>


                                            <p class="mt-2 text-xs text-[#929c98]">

                                                Monitoring every

                                                <span class="font-bold text-[#65736f]">
                                                    {{ $site->monitoring_interval }} min
                                                </span>

                                            </p>

                                        </div>

                                    </div>


                                    {{-- Check Data --}}

                                    <div class="grid grid-cols-2 gap-3 sm:grid-cols-4 xl:min-w-[560px]">


                                        {{-- Last Check --}}

                                        <div class="rounded-2xl bg-[#f8f8f4] p-3 transition hover:bg-[#f2f2ed]">

                                            <p
                                                class="text-[10px] font-bold uppercase tracking-[0.12em] text-[#9aa39f]">
                                                Last Check
                                            </p>

                                            <p class="mt-1 text-sm font-bold text-[#4e5e59]">

                                                @if($lastCheck)
                                                    {{ $lastCheck->checked_at?->diffForHumans() ?? '—' }}
                                                @else
                                                    —
                                                @endif

                                            </p>

                                        </div>


                                        {{-- Response --}}

                                        <div class="rounded-2xl bg-[#f3f9f9] p-3 transition hover:bg-[#edf6f6]">

                                            <p
                                                class="text-[10px] font-bold uppercase tracking-[0.12em] text-[#7e9a99]">
                                                Response
                                            </p>

                                            <p class="mt-1 text-sm font-bold text-[#3d7477]">

                                                @if($lastCheck && $lastCheck->response_time !== null)
                                                    {{ $lastCheck->response_time }} ms
                                                @else
                                                    —
                                                @endif

                                            </p>

                                        </div>


                                        {{-- HTTP --}}

                                        <div class="rounded-2xl bg-[#f8f4fa] p-3 transition hover:bg-[#f1ebf4]">

                                            <p
                                                class="text-[10px] font-bold uppercase tracking-[0.12em] text-[#95869a]">
                                                HTTP
                                            </p>

                                            <p
                                                class="mt-1 text-sm font-black
                                                @if($lastCheck && $lastCheck->http_code >= 200 && $lastCheck->http_code < 400)
                                                    text-[#4b8a5b]
                                                @elseif($lastCheck && $lastCheck->http_code !== null)
                                                    text-[#bb4747]
                                                @else
                                                    text-[#66716e]
                                                @endif">

                                                {{ $lastCheck?->http_code ?? '—' }}

                                            </p>

                                        </div>


                                        {{-- Check Now --}}

                                        <div class="flex items-stretch">

                                            <form
                                                action="{{ route('sites.check', $site) }}"
                                                method="POST"
                                                class="w-full">

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="dashboard-button h-full w-full rounded-2xl bg-gradient-to-r from-[#126b70] to-[#278590] px-3 py-2 text-xs font-bold text-white shadow-sm hover:shadow-md">

                                                    Check Now

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="px-6 py-16 text-center">

                        <div
                            class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-[#e4f2f2] text-[#347e83] transition duration-300 hover:scale-110">
                            +
                        </div>

                        <h3 class="mt-5 text-lg font-black text-[#34433f]">
                            No websites yet
                        </h3>

                        <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-[#818c88]">
                            You haven't added any websites to monitor yet.
                        </p>

                        <div class="mt-6">

                            <a
                                href="{{ route('sites.create') }}"
                                class="dashboard-button inline-flex items-center gap-2 rounded-2xl bg-[#176e73] px-5 py-3 text-sm font-bold text-white shadow-md hover:bg-[#115e63]">

                                <span class="text-lg">+</span>

                                Add your first website

                            </a>

                        </div>

                    </div>

                @endif

            </div>


            {{-- ================================================= --}}
            {{-- MONITORING STATUS + RECENT CHECKS --}}
            {{-- ================================================= --}}

            <div class="mt-6 grid grid-cols-1 gap-6 lg:grid-cols-3">


                {{-- Monitoring Status --}}

                <div
                    class="animate-fade-up delay-400 overflow-hidden rounded-3xl border border-[#dddcd5] bg-white shadow-sm">

                    <div
                        class="border-b border-[#e9e8e2] bg-gradient-to-r from-[#f8fcfb] to-[#f5f1f8] px-6 py-6">

                        <div class="flex items-center justify-between">

                            <div>

                                <h2 class="text-lg font-black text-[#293e3a]">
                                    Monitoring Status
                                </h2>

                                <p class="mt-1 text-sm text-[#808d89]">
                                    Current system activity.
                                </p>

                            </div>

                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#e0eff0] text-[#277980]">

                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="1.7">
                                    <path stroke-linecap="round" d="M4 17a8 8 0 0116 0"></path>
                                    <path stroke-linecap="round" d="M7 14a5 5 0 0110 0"></path>
                                    <path stroke-linecap="round" d="M10 11a2 2 0 014 0"></path>
                                    <circle cx="12" cy="19" r="1"></circle>
                                </svg>

                            </div>

                        </div>

                    </div>


                    <div class="p-6">

                        @if($totalSites > 0)

                            @if($downSites > 0)

                                <div class="rounded-2xl border border-[#efd0cd] bg-[#fff2f0] p-5">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-11 w-11 items-center justify-center rounded-full bg-[#fde0dd] text-[#c44742]">
                                            !
                                        </div>

                                        <div>

                                            <h3 class="text-sm font-black text-[#a84542]">
                                                Attention required
                                            </h3>

                                            <p class="mt-1 text-xs text-[#a17773]">
                                                One or more websites are currently down.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            @elseif($onlineSites > 0)

                                <div class="rounded-2xl border border-[#cfe5d4] bg-[#f0f8f1] p-5">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-11 w-11 items-center justify-center rounded-full bg-[#d8eddc] text-[#47885a]">
                                            ✓
                                        </div>

                                        <div>

                                            <h3 class="text-sm font-black text-[#47734f]">
                                                Monitoring active
                                            </h3>

                                            <p class="mt-1 text-xs text-[#718b77]">
                                                Your monitored websites are online.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            @else

                                <div class="rounded-2xl border border-[#eadfba] bg-[#fff9e9] p-5">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-11 w-11 items-center justify-center rounded-full bg-[#f6edc9] text-[#9a8140]">
                                            ⏳
                                        </div>

                                        <div>

                                            <h3 class="text-sm font-black text-[#7f7047]">
                                                Initial check pending
                                            </h3>

                                            <p class="mt-1 text-xs text-[#93845c]">
                                                Run a check to begin monitoring.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            @endif


                            <div class="mt-6 space-y-4">

                                <div class="flex items-center justify-between border-b border-[#f0efea] pb-3">

                                    <span class="text-sm text-[#7c8884]">
                                        Websites
                                    </span>

                                    <span class="text-sm font-bold text-[#4f5e5a]">
                                        {{ $onlineSites }} / {{ $totalSites }}
                                    </span>

                                </div>


                                <div class="flex items-center justify-between border-b border-[#f0efea] pb-3">

                                    <span class="text-sm text-[#7c8884]">
                                        Last check
                                    </span>

                                    <span class="text-sm font-bold text-[#4f5e5a]">
                                        {{ $latestCheck?->checked_at?->diffForHumans() ?? '—' }}
                                    </span>

                                </div>


                                <div class="flex items-center justify-between border-b border-[#f0efea] pb-3">

                                    <span class="text-sm text-[#7c8884]">
                                        Response time
                                    </span>

                                    <span class="text-sm font-bold text-[#397b7f]">
                                        {{ $latestCheck?->response_time !== null ? $latestCheck->response_time . ' ms' : '—' }}
                                    </span>

                                </div>


                                <div class="flex items-center justify-between">

                                    <span class="text-sm text-[#7c8884]">
                                        HTTP code
                                    </span>

                                    <span class="text-sm font-black text-[#5c6870]">
                                        {{ $latestCheck?->http_code ?? '—' }}
                                    </span>

                                </div>

                            </div>

                        @else

                            <div class="rounded-2xl border border-dashed border-[#d8ddd9] bg-[#fafbf9] p-6 text-center">

                                <div
                                    class="mx-auto flex h-12 w-12 items-center justify-center rounded-2xl bg-[#e9f3f2] text-[#4d8784]">
                                    📡
                                </div>

                                <h3 class="mt-4 text-sm font-black text-[#3d4b47]">
                                    Monitoring not started
                                </h3>

                                <p class="mt-2 text-sm leading-6 text-[#7d8985]">
                                    Add a website to start monitoring its availability.
                                </p>

                            </div>

                        @endif

                    </div>

                </div>


                {{-- Recent Checks --}}

                <div
                    class="animate-fade-up delay-500 overflow-hidden rounded-3xl border border-[#dddcd5] bg-white shadow-sm lg:col-span-2">

                    <div
                        class="flex items-center justify-between border-b border-[#e9e8e2] bg-gradient-to-r from-[#fafdfc] to-[#f8f4fa] px-6 py-6">

                        <div>

                            <h2 class="text-lg font-black text-[#293e3a]">
                                Recent Checks
                            </h2>

                            <p class="mt-1 text-sm text-[#808d89]">
                                Latest monitoring results.
                            </p>

                        </div>

                        <a
                            href="{{ route('sites.index') }}"
                            class="hidden text-sm font-bold text-[#387d83] transition hover:text-[#17666b] sm:block">

                            View all →

                        </a>

                    </div>


                    @if($recentChecks->count() > 0)

                        <div class="divide-y divide-[#eeeDE7]">

                            @foreach($recentChecks as $check)

                                @php
                                    $checkStatus = strtoupper((string) ($check->status ?? ''));

                                    $checkIsUp = $checkStatus === 'UP';
                                    $checkIsDown = $checkStatus === 'DOWN';
                                @endphp

                                <div
                                    class="dashboard-row flex flex-col gap-4 px-6 py-5 transition hover:bg-[#fcfcfa] sm:flex-row sm:items-center sm:justify-between">

                                    <div class="min-w-0">

                                        <div class="flex items-center gap-3">

                                            <div
                                                class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl
                                                {{ $checkIsUp
                                                    ? 'bg-[#e5f3e7] text-[#478357]'
                                                    : 'bg-[#fde5e2] text-[#c44743]' }}">

                                                @if($checkIsUp)
                                                    ✓
                                                @elseif($checkIsDown)
                                                    !
                                                @else
                                                    ?
                                                @endif

                                            </div>

                                            <div class="min-w-0">

                                                <p class="truncate text-sm font-black text-[#354540]">
                                                    {{ $check->site?->name ?? 'Website' }}
                                                </p>

                                                <p class="truncate text-xs text-[#929c98]">
                                                    {{ $check->site?->url ?? '' }}
                                                </p>

                                            </div>

                                        </div>

                                    </div>


                                    <div class="flex flex-wrap items-center gap-3 text-xs">

                                        <span
                                            class="font-black
                                            {{ $checkIsUp
                                                ? 'text-[#478357]'
                                                : 'text-[#c44743]' }}">

                                            {{ $checkStatus !== '' ? $checkStatus : 'UNKNOWN' }}

                                        </span>


                                        <span
                                            class="rounded-lg bg-[#f4f5f1] px-2 py-1 font-semibold text-[#697571]">

                                            @if($check->response_time !== null)
                                                {{ $check->response_time }} ms
                                            @else
                                                —
                                            @endif

                                        </span>


                                        <span
                                            class="rounded-lg bg-[#f3f8f8] px-2 py-1 font-semibold text-[#4d7f82]">

                                            {{ $check->http_code ?? '—' }}

                                        </span>


                                        <span class="text-[#929c98]">

                                            {{ $check->checked_at?->diffForHumans() ?? '—' }}

                                        </span>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @else

                        <div class="px-6 py-14 text-center">

                            <div
                                class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#edf3f1] text-[#66847d]">
                                📋
                            </div>

                            <h3 class="mt-4 text-base font-black text-[#354540]">
                                No checks available yet
                            </h3>

                            <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-[#808c88]">
                                Once you check a website, your latest monitoring results will appear here.
                            </p>

                        </div>

                    @endif

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- RECENT ALERTS --}}
            {{-- ================================================= --}}

            <div
                class="animate-fade-up delay-500 mt-6 overflow-hidden rounded-3xl border border-[#dddcd5] bg-white shadow-sm">

                <div
                    class="border-b border-[#e9e8e2] bg-gradient-to-r from-[#fffaf9] via-white to-[#f8f3f9] px-6 py-6 sm:px-8">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#fde5e3] text-[#c44743]">

                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">

                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.4-1.4A2 2 0 0118 14.2V11a6 6 0 00-12 0v3.2a2 2 0 01-.6 1.4L4 17h5">
                                </path>

                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 21h6"></path>

                            </svg>

                        </div>

                        <div>

                            <h2 class="text-lg font-black text-[#3b3d3a]">
                                Recent Alerts
                            </h2>

                            <p class="mt-1 text-sm text-[#858c88]">
                                Latest events requiring attention.
                            </p>

                        </div>

                    </div>

                </div>


                @if($recentAlerts->count() > 0)

                    <div class="divide-y divide-[#eeeDE7]">

                        @foreach($recentAlerts as $alert)

                            <div
                                class="dashboard-row flex flex-col gap-4 px-6 py-5 transition hover:bg-[#fdfcf9] sm:flex-row sm:items-center sm:justify-between sm:px-8">

                                <div class="flex min-w-0 items-start gap-4">

                                    @if($alert->type === 'down')

                                        <div
                                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#fde3e0] text-[#c44743]">
                                            !
                                        </div>

                                    @else

                                        <div
                                            class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#e3f2e5] text-[#478357]">
                                            ✓
                                        </div>

                                    @endif


                                    <div class="min-w-0">

                                        <div class="flex flex-wrap items-center gap-3">

                                            <h3 class="text-sm font-black text-[#36423e]">
                                                {{ $alert->verification?->site?->name ?? 'Website' }}
                                            </h3>


                                            @if($alert->type === 'down')

                                                <span
                                                    class="inline-flex items-center rounded-full bg-[#fde4e1] px-2.5 py-1 text-[10px] font-black tracking-wide text-[#b33f3d]">
                                                    DOWN
                                                </span>

                                            @else

                                                <span
                                                    class="inline-flex items-center rounded-full bg-[#e4f3e6] px-2.5 py-1 text-[10px] font-black tracking-wide text-[#477b53]">
                                                    RECOVERY
                                                </span>

                                            @endif

                                        </div>


                                        <p class="mt-1 text-sm text-[#737f7b]">
                                            {{ $alert->message }}
                                        </p>


                                        <p class="mt-1 text-xs text-[#a0a7a3]">
                                            {{ $alert->created_at?->diffForHumans() ?? '—' }}
                                        </p>

                                    </div>

                                </div>


                                @if($alert->is_sent)

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-[#e5f3e7] px-3 py-1.5 text-xs font-bold text-[#477b53]">

                                        <span class="h-1.5 w-1.5 rounded-full bg-[#4f9863]"></span>

                                        Email sent

                                    </span>

                                @else

                                    <span
                                        class="inline-flex items-center gap-2 rounded-full bg-[#fff5d9] px-3 py-1.5 text-xs font-bold text-[#8c753c]">

                                        <span class="h-1.5 w-1.5 rounded-full bg-[#c2a04b]"></span>

                                        Pending

                                    </span>

                                @endif

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="px-6 py-14 text-center">

                        <div
                            class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#e7f3e8] text-[#4a895b]">
                            ✓
                        </div>

                        <h3 class="mt-4 text-base font-black text-[#394540]">
                            No alerts
                        </h3>

                        <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-[#818c88]">
                            Everything looks good. You don't have any monitoring alerts yet.
                        </p>

                    </div>

                @endif

            </div>


            {{-- ================================================= --}}
            {{-- QUICK ACTIONS --}}
            {{-- ================================================= --}}

            <div class="animate-fade-up delay-600 mt-6 grid grid-cols-1 gap-4 sm:grid-cols-3">


                {{-- Add Website --}}

                <a
                    href="{{ route('sites.create') }}"
                    class="dashboard-card group relative overflow-hidden rounded-3xl border border-[#c9e4e4] bg-gradient-to-br from-white to-[#edf8f8] p-6 shadow-sm">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#d7eeee] text-xl font-bold text-[#28767b] transition duration-300 group-hover:scale-110 group-hover:rotate-3">
                            +
                        </div>

                        <div>

                            <h3 class="text-sm font-black text-[#344541]">
                                Add Website
                            </h3>

                            <p class="mt-1 text-xs text-[#808d89]">
                                Start monitoring a website
                            </p>

                        </div>

                    </div>

                </a>


                {{-- My Websites --}}

                <a
                    href="{{ route('sites.index') }}"
                    class="dashboard-card group relative overflow-hidden rounded-3xl border border-[#d5cee0] bg-gradient-to-br from-white to-[#f5f0f8] p-6 shadow-sm">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#e8def0] text-[#74577f] transition duration-300 group-hover:scale-110">

                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">
                                <circle cx="12" cy="12" r="9"></circle>
                                <path stroke-linecap="round" d="M3 12h18"></path>
                            </svg>

                        </div>

                        <div>

                            <h3 class="text-sm font-black text-[#3f3d43]">
                                My Websites
                            </h3>

                            <p class="mt-1 text-xs text-[#85808a]">
                                Manage monitored sites
                            </p>

                        </div>

                    </div>

                </a>


                {{-- Monitoring --}}

                <a
                    href="{{ route('sites.index') }}"
                    class="dashboard-card group relative overflow-hidden rounded-3xl border border-[#cce4d5] bg-gradient-to-br from-white to-[#f0f8f1] p-6 shadow-sm">

                    <div class="flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#dcefdc] text-[#478357] transition duration-300 group-hover:scale-110">

                            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="1.8">

                                <path stroke-linecap="round" d="M4 17a8 8 0 0116 0"></path>

                                <path stroke-linecap="round" d="M7 14a5 5 0 0110 0"></path>

                                <path stroke-linecap="round" d="M10 11a2 2 0 014 0"></path>

                            </svg>

                        </div>

                        <div>

                            <h3 class="text-sm font-black text-[#344541]">
                                Monitoring
                            </h3>

                            <p class="mt-1 text-xs text-[#7d8b85]">
                                Review monitoring activity
                            </p>

                        </div>

                    </div>

                </a>

            </div>


            {{-- ================================================= --}}
            {{-- FOOTER --}}
            {{-- ================================================= --}}

            <div
                class="mt-10 flex flex-col gap-2 border-t border-[#dddcd4] pt-6 text-xs text-[#949b97] sm:flex-row sm:items-center sm:justify-between">

                <p>
                    © {{ date('Y') }} SiteMonitor
                </p>

                <p class="flex items-center gap-2">

                    <span class="h-1.5 w-1.5 animate-pulse rounded-full bg-[#4d9564]"></span>

                    Website monitoring made simple and reliable.

                </p>

            </div>

        </div>

    </div>

</x-app-layout>