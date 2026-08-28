<x-app-layout>

    {{-- ========================================================= --}}
    {{-- ANIMATIONS --}}
    {{-- ========================================================= --}}

    <style>
        @keyframes pageFade {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(22px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideRight {
            from {
                opacity: 0;
                transform: translateX(-24px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
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

        @keyframes floatSoft {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }
        }

        @keyframes softPulse {
            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.12);
                opacity: .7;
            }
        }

        @keyframes rowReveal {
            from {
                opacity: 0;
                transform: translateY(12px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .page-fade {
            animation: pageFade .5s ease-out both;
        }

        .header-animation {
            animation: slideRight .7s cubic-bezier(.22, 1, .36, 1) both;
        }

        .slide-up {
            animation: slideUp .65s cubic-bezier(.22, 1, .36, 1) both;
        }

        .scale-animation {
            animation: scaleIn .65s cubic-bezier(.22, 1, .36, 1) both;
        }

        .float-animation {
            animation: floatSoft 3s ease-in-out infinite;
        }

        .pulse-animation {
            animation: softPulse 2s ease-in-out infinite;
        }

        .website-row {
            animation: rowReveal .55s cubic-bezier(.22, 1, .36, 1) both;
        }

        .website-row:nth-child(1) {
            animation-delay: .08s;
        }

        .website-row:nth-child(2) {
            animation-delay: .16s;
        }

        .website-row:nth-child(3) {
            animation-delay: .24s;
        }

        .website-row:nth-child(4) {
            animation-delay: .32s;
        }

        .website-row:nth-child(5) {
            animation-delay: .40s;
        }

        .website-row:nth-child(6) {
            animation-delay: .48s;
        }

        .website-row:nth-child(7) {
            animation-delay: .56s;
        }

        .website-row:nth-child(8) {
            animation-delay: .64s;
        }

        .website-row:nth-child(9) {
            animation-delay: .72s;
        }

        .website-row:nth-child(10) {
            animation-delay: .80s;
        }

        @media (prefers-reduced-motion: reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
        }
    </style>


    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <x-slot name="header">

        <div
            class="header-animation relative overflow-hidden rounded-3xl
                   border border-[#d8e8e6]
                   bg-gradient-to-r from-[#f5fbfa] via-[#eef8f7] to-[#f8f3f8]
                   px-6 py-6 shadow-sm sm:px-8">

            {{-- Decorative --}}
            <div
                class="pointer-events-none absolute -right-20 -top-24
                       h-64 w-64 rounded-full bg-[#9bdedc]/25 blur-3xl">
            </div>

            <div
                class="pointer-events-none absolute -bottom-28 left-1/3
                       h-64 w-64 rounded-full bg-[#c9b4d5]/20 blur-3xl">
            </div>

            <div
                class="pointer-events-none absolute -left-16 top-10
                       h-28 w-28 rounded-full bg-[#dff5f2]/40 blur-2xl">
            </div>


            <div class="relative z-10">

                <div class="mb-2 flex items-center gap-2">

                    <span
                        class="pulse-animation h-2 w-2 rounded-full bg-[#3f968d]">
                    </span>

                    <span
                        class="text-xs font-bold uppercase tracking-[0.18em]
                               text-[#568b85]">

                        SiteMonitor

                    </span>

                </div>


                <h2
                    class="text-3xl font-black tracking-tight text-[#163d3a]">

                    Monitoring

                </h2>


                <p class="mt-1 text-sm text-[#718582]">

                    Monitor the current status and performance of your websites.

                </p>

            </div>

        </div>

    </x-slot>


    {{-- ========================================================= --}}
    {{-- MAIN --}}
    {{-- ========================================================= --}}

    <div class="page-fade min-h-screen bg-[#f5f1e8]">

        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">


            {{-- ================================================= --}}
            {{-- MONITORING OVERVIEW --}}
            {{-- ================================================= --}}

            @php

                $totalSites = $sites->count();

                $onlineSites = $sites->filter(function ($site) {

                    $lastCheck = $site->verifications->first();

                    return $lastCheck &&
                        strtoupper((string) $lastCheck->status) === 'UP';

                })->count();

                $downSites = $sites->filter(function ($site) {

                    $lastCheck = $site->verifications->first();

                    return $lastCheck &&
                        strtoupper((string) $lastCheck->status) === 'DOWN';

                })->count();

                $systemOperational = $totalSites === 0 || $downSites === 0;

            @endphp


            <div class="slide-up mb-8">

                <div
                    class="flex flex-col gap-5
                           lg:flex-row lg:items-end lg:justify-between">

                    <div>

                        <p class="text-sm font-semibold text-[#5d8e87]">

                            Monitoring Overview

                        </p>


                        <h1
                            class="mt-1 text-3xl font-black tracking-tight
                                   text-[#243c39] sm:text-4xl">

                            Monitoring Overview

                        </h1>


                        <p
                            class="mt-2 max-w-2xl text-sm leading-6
                                   text-[#7b8985]">

                            Check the current availability, response time and
                            latest activity of all your monitored websites.

                        </p>

                    </div>


                    {{-- System Status --}}
                    <div
                        class="scale-animation inline-flex w-fit items-center gap-3
                               rounded-2xl border
                               {{ $systemOperational
                                    ? 'border-[#cde5df] bg-[#f3faf7]'
                                    : 'border-[#efd0cd] bg-[#fff4f2]' }}
                               px-4 py-3
                               transition-all duration-300
                               hover:-translate-y-1 hover:shadow-md">

                        <span class="relative flex h-3 w-3">

                            <span
                                class="absolute inline-flex h-full w-full
                                       animate-ping rounded-full
                                       {{ $systemOperational
                                            ? 'bg-[#65a981]'
                                            : 'bg-[#d06a62]' }}
                                       opacity-50">
                            </span>

                            <span
                                class="relative inline-flex h-3 w-3 rounded-full
                                       {{ $systemOperational
                                            ? 'bg-[#438c61]'
                                            : 'bg-[#c44743]' }}">
                            </span>

                        </span>


                        <div>

                            <p
                                class="text-[10px] font-bold uppercase
                                       tracking-[0.15em] text-[#79928a]">

                                System Status

                            </p>


                            <p
                                class="text-sm font-bold
                                    {{ $systemOperational
                                        ? 'text-[#3d6f56]'
                                        : 'text-[#a84542]' }}">

                                {{ $systemOperational
                                    ? 'Operational'
                                    : 'Attention required' }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- STATISTICS --}}
            {{-- ================================================= --}}

            <div
                class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-3">


                {{-- Total --}}
                <div
                    class="slide-up group relative overflow-hidden rounded-3xl
                           border border-[#c9e5e5]
                           bg-gradient-to-br from-white to-[#edf9f9]
                           p-6 shadow-sm
                           transition-all duration-500
                           hover:-translate-y-2 hover:shadow-xl">

                    <div
                        class="pointer-events-none absolute -right-10 -top-10
                               h-32 w-32 rounded-full bg-[#a8dfe0]/30 blur-2xl
                               transition-transform duration-700
                               group-hover:scale-125">
                    </div>


                    <div
                        class="relative z-10 flex items-start justify-between">

                        <div>

                            <p class="text-sm font-semibold text-[#668784]">
                                Total Websites
                            </p>

                            <p
                                class="mt-2 text-4xl font-black tracking-tight
                                       text-[#164f55]
                                       transition-transform duration-300
                                       group-hover:scale-105">

                                {{ $totalSites }}

                            </p>

                            <p class="mt-4 text-xs font-medium text-[#829795]">
                                Websites under monitoring
                            </p>

                        </div>


                        <div
                            class="flex h-12 w-12 items-center justify-center
                                   rounded-2xl bg-[#cceeed] text-[#247b80]
                                   transition-all duration-500
                                   group-hover:rotate-6
                                   group-hover:scale-110">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8">

                                <circle cx="12" cy="12" r="9"></circle>

                                <path
                                    stroke-linecap="round"
                                    d="M3 12h18">
                                </path>

                                <path
                                    stroke-linecap="round"
                                    d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z">
                                </path>

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- Online --}}
                <div
                    class="slide-up group relative overflow-hidden rounded-3xl
                           border border-[#cde4d3]
                           bg-gradient-to-br from-white to-[#f0f8f1]
                           p-6 shadow-sm
                           transition-all duration-500
                           hover:-translate-y-2 hover:shadow-xl"
                    style="animation-delay:.12s">

                    <div
                        class="pointer-events-none absolute -right-10 -top-10
                               h-32 w-32 rounded-full bg-[#b9dbbd]/30 blur-2xl
                               transition-transform duration-700
                               group-hover:scale-125">
                    </div>


                    <div
                        class="relative z-10 flex items-start justify-between">

                        <div>

                            <p class="text-sm font-semibold text-[#6d8874]">
                                Online
                            </p>

                            <p
                                class="mt-2 text-4xl font-black tracking-tight
                                       text-[#39734d]
                                       transition-transform duration-300
                                       group-hover:scale-105">

                                {{ $onlineSites }}

                            </p>

                            <p class="mt-4 text-xs font-medium text-[#819184]">
                                Websites currently online
                            </p>

                        </div>


                        <div
                            class="flex h-12 w-12 items-center justify-center
                                   rounded-2xl bg-[#dcefdc] text-[#47845b]
                                   transition-all duration-500
                                   group-hover:-rotate-6
                                   group-hover:scale-110">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 13l4 4L19 7">
                                </path>

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- Down --}}
                <div
                    class="slide-up group relative overflow-hidden rounded-3xl
                           border border-[#f0d1d1]
                           bg-gradient-to-br from-white to-[#fff2f1]
                           p-6 shadow-sm
                           transition-all duration-500
                           hover:-translate-y-2 hover:shadow-xl"
                    style="animation-delay:.24s">

                    <div
                        class="pointer-events-none absolute -right-10 -top-10
                               h-32 w-32 rounded-full bg-[#f0b0aa]/25 blur-2xl
                               transition-transform duration-700
                               group-hover:scale-125">
                    </div>


                    <div
                        class="relative z-10 flex items-start justify-between">

                        <div>

                            <p class="text-sm font-semibold text-[#9b716e]">
                                Down
                            </p>

                            <p
                                class="mt-2 text-4xl font-black tracking-tight
                                       text-[#a83d3d]
                                       transition-transform duration-300
                                       group-hover:scale-105">

                                {{ $downSites }}

                            </p>

                            <p class="mt-4 text-xs font-medium text-[#997b78]">
                                Websites requiring attention
                            </p>

                        </div>


                        <div
                            class="flex h-12 w-12 items-center justify-center
                                   rounded-2xl bg-[#fde1df] text-[#c04444]
                                   transition-all duration-500
                                   group-hover:rotate-6
                                   group-hover:scale-110">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 8v4m0 4h.01">
                                </path>

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z">
                                </path>

                            </svg>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- AUTO MONITORING --}}
            {{-- ================================================= --}}

            <div
                class="slide-up mt-6 overflow-hidden rounded-3xl
                       border border-[#cfe4e2]
                       bg-gradient-to-r from-[#eef8f7] via-white to-[#f6f1f8]
                       p-6 shadow-sm
                       transition-all duration-500
                       hover:-translate-y-1 hover:shadow-lg"
                style="animation-delay:.34s">

                <div
                    class="flex flex-col gap-4
                           sm:flex-row sm:items-center sm:justify-between">

                    <div class="flex items-center gap-4">

                        <div
                            class="float-animation flex h-12 w-12
                                   items-center justify-center
                                   rounded-2xl bg-[#dceff0]
                                   text-[#277980]">

                            <span class="text-xl">
                                📡
                            </span>

                        </div>


                        <div>

                            <h2 class="text-lg font-black text-[#293e3a]">
                                Auto Monitoring Active
                            </h2>

                            <p class="mt-1 text-sm text-[#718582]">
                                Your websites are monitored automatically.
                            </p>

                        </div>

                    </div>


                    <div
                        class="inline-flex w-fit items-center gap-2 rounded-full
                               bg-[#e4f3e6] px-4 py-2
                               text-xs font-bold text-[#477b53]">

                        <span
                            class="pulse-animation h-2 w-2 rounded-full
                                   bg-[#4f9863]">
                        </span>

                        Monitoring active

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- WEBSITE MONITORING --}}
            {{-- ================================================= --}}

            <div
                class="scale-animation mt-6 overflow-hidden rounded-3xl
                       border border-[#dddcd5] bg-white shadow-sm
                       transition-shadow duration-500
                       hover:shadow-lg"
                style="animation-delay:.42s">


                {{-- Header --}}
                <div
                    class="border-b border-[#e9e8e2]
                           bg-gradient-to-r from-[#fafdfc] to-[#f9f5fa]
                           px-6 py-6 sm:px-8">

                    <div class="flex items-center gap-4">

                        <div
                            class="group flex h-12 w-12 items-center justify-center
                                   rounded-2xl bg-[#dceff0] text-[#287980]
                                   transition-all duration-500
                                   hover:rotate-6 hover:scale-110">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7">

                                <circle cx="12" cy="12" r="9"></circle>

                                <path
                                    stroke-linecap="round"
                                    d="M3 12h18">
                                </path>

                                <path
                                    stroke-linecap="round"
                                    d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z">
                                </path>

                            </svg>

                        </div>


                        <div>

                            <h2 class="text-xl font-black text-[#263d3a]">
                                Website Monitoring
                            </h2>

                            <p class="mt-1 text-sm text-[#7e8c89]">
                                Current monitoring status of your websites.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- WEBSITES --}}
                {{-- ================================================= --}}

                @if($sites->count() > 0)

                    <div class="divide-y divide-[#eeeDE7]">

                        @foreach($sites as $site)

                            @php

                                $lastCheck = $site->verifications->first();

                                $status = strtoupper(
                                    (string) ($lastCheck?->status ?? '')
                                );

                                $isUp = $status === 'UP';

                                $isDown = $status === 'DOWN';

                            @endphp


                            <div
                                class="website-row group p-6
                                       transition-all duration-300
                                       hover:bg-[#fbfcfa]
                                       sm:p-7">

                                <div
                                    class="flex flex-col gap-6
                                           xl:flex-row xl:items-center
                                           xl:justify-between">


                                    {{-- Website Info --}}
                                    <div
                                        class="flex min-w-0 items-start gap-4">

                                        <div
                                            class="flex h-13 w-13 shrink-0
                                                   items-center justify-center
                                                   rounded-2xl
                                                   bg-gradient-to-br
                                                   from-[#d9eff0] to-[#c4e4e4]
                                                   text-[#27767c]
                                                   transition-all duration-500
                                                   group-hover:scale-110
                                                   group-hover:rotate-3">

                                            <svg
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.7">

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="9">
                                                </circle>

                                                <path
                                                    stroke-linecap="round"
                                                    d="M3 12h18">
                                                </path>

                                                <path
                                                    stroke-linecap="round"
                                                    d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z">
                                                </path>

                                            </svg>

                                        </div>


                                        <div class="min-w-0">

                                            <div
                                                class="flex flex-wrap items-center gap-3">

                                                <h3
                                                    class="text-base font-black
                                                           text-[#293d3a]
                                                           transition-colors
                                                           duration-300
                                                           group-hover:text-[#176e73]">

                                                    {{ $site->name }}

                                                </h3>


                                                @if($isUp)

                                                    <span
                                                        class="inline-flex items-center
                                                               gap-2 rounded-full
                                                               bg-[#e5f4e7] px-3 py-1
                                                               text-xs font-bold
                                                               text-[#3d7950]">

                                                        <span
                                                            class="pulse-animation
                                                                   h-1.5 w-1.5 rounded-full
                                                                   bg-[#4f9a63]">
                                                        </span>

                                                        UP

                                                    </span>

                                                @elseif($isDown)

                                                    <span
                                                        class="inline-flex items-center
                                                               gap-2 rounded-full
                                                               bg-[#fde6e3] px-3 py-1
                                                               text-xs font-bold
                                                               text-[#b03f3f]">

                                                        <span
                                                            class="h-1.5 w-1.5 rounded-full
                                                                   bg-[#d04b47]">
                                                        </span>

                                                        DOWN

                                                    </span>

                                                @else

                                                    <span
                                                        class="inline-flex items-center
                                                               gap-2 rounded-full
                                                               bg-[#f1f1ec] px-3 py-1
                                                               text-xs font-bold
                                                               text-[#777d79]">

                                                        <span
                                                            class="h-1.5 w-1.5 rounded-full
                                                                   bg-[#999f9b]">
                                                        </span>

                                                        NOT CHECKED

                                                    </span>

                                                @endif

                                            </div>


                                            <a
                                                href="{{ $site->url }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="mt-1 block max-w-xl truncate
                                                       text-sm font-medium
                                                       text-[#3c8c91]
                                                       transition-all duration-300
                                                       hover:translate-x-1
                                                       hover:text-[#166b70]">

                                                {{ $site->url }}

                                            </a>

                                        </div>

                                    </div>


                                    {{-- ================================================= --}}
                                    {{-- DATA --}}
                                    {{-- ================================================= --}}

                                    <div
                                        class="grid grid-cols-2 gap-3
                                               sm:grid-cols-4
                                               xl:min-w-[600px]">


                                        {{-- Last Check --}}
                                        <div
                                            class="rounded-2xl bg-[#f8f8f4] p-3
                                                   transition-all duration-300
                                                   hover:-translate-y-1
                                                   hover:shadow-sm">

                                            <p
                                                class="text-[10px] font-bold
                                                       uppercase tracking-[0.12em]
                                                       text-[#9aa39f]">

                                                Last Check

                                            </p>

                                            <p
                                                class="mt-1 text-sm font-bold
                                                       text-[#4e5e59]">

                                                @if($lastCheck)

                                                    {{ $lastCheck->checked_at?->format('d/m/Y H:i:s') ?? '—' }}

                                                @else

                                                    —

                                                @endif

                                            </p>

                                        </div>


                                        {{-- Response --}}
                                        <div
                                            class="rounded-2xl bg-[#f3f9f9] p-3
                                                   transition-all duration-300
                                                   hover:-translate-y-1
                                                   hover:shadow-sm">

                                            <p
                                                class="text-[10px] font-bold
                                                       uppercase tracking-[0.12em]
                                                       text-[#7e9a99]">

                                                Response

                                            </p>

                                            <p
                                                class="mt-1 text-sm font-bold
                                                       text-[#3d7477]">

                                                @if(
                                                    $lastCheck &&
                                                    $lastCheck->response_time !== null
                                                )

                                                    {{ round($lastCheck->response_time) }} ms

                                                @else

                                                    —

                                                @endif

                                            </p>

                                        </div>


                                        {{-- HTTP --}}
                                        <div
                                            class="rounded-2xl bg-[#f8f4fa] p-3
                                                   transition-all duration-300
                                                   hover:-translate-y-1
                                                   hover:shadow-sm">

                                            <p
                                                class="text-[10px] font-bold
                                                       uppercase tracking-[0.12em]
                                                       text-[#95869a]">

                                                HTTP

                                            </p>

                                            <p
                                                class="mt-1 text-sm font-black
                                                    @if(
                                                        $lastCheck &&
                                                        $lastCheck->http_code >= 200 &&
                                                        $lastCheck->http_code < 400
                                                    )
                                                        text-[#4b8a5b]
                                                    @elseif(
                                                        $lastCheck &&
                                                        $lastCheck->http_code !== null
                                                    )
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
                                                    onclick="this.disabled=true; this.innerHTML='Checking...';"
                                                    class="group/button h-full w-full
                                                           rounded-2xl
                                                           bg-gradient-to-r
                                                           from-[#126b70]
                                                           to-[#278590]
                                                           px-3 py-2
                                                           text-xs font-bold text-white
                                                           shadow-sm
                                                           transition-all duration-300
                                                           hover:-translate-y-1
                                                           hover:shadow-lg
                                                           active:translate-y-0
                                                           disabled:cursor-wait
                                                           disabled:opacity-70">

                                                    <span
                                                        class="inline-flex items-center
                                                               justify-center gap-1.5">

                                                        <span
                                                            class="transition-transform
                                                                   duration-500
                                                                   group-hover/button:rotate-180">

                                                            ↻

                                                        </span>

                                                        Check Now

                                                    </span>

                                                </button>

                                            </form>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>


                @else

                    {{-- ================================================= --}}
                    {{-- EMPTY STATE --}}
                    {{-- ================================================= --}}

                    <div class="px-6 py-16 text-center">

                        <div
                            class="float-animation mx-auto flex h-16 w-16
                                   items-center justify-center
                                   rounded-3xl bg-[#e4f2f2]
                                   text-[#347e83]">

                            <span class="text-2xl">
                                📡
                            </span>

                        </div>


                        <h3
                            class="mt-5 text-lg font-black text-[#34433f]">

                            No websites yet

                        </h3>


                        <p
                            class="mx-auto mt-2 max-w-md
                                   text-sm leading-6 text-[#818c88]">

                            Add a website first to start monitoring.

                        </p>


                        <div class="mt-6">

                            <a
                                href="{{ route('sites.create') }}"
                                class="group inline-flex items-center gap-2
                                       rounded-2xl bg-[#176e73]
                                       px-5 py-3 text-sm font-bold text-white
                                       shadow-md
                                       transition-all duration-300
                                       hover:-translate-y-1
                                       hover:bg-[#115e63]
                                       hover:shadow-lg">

                                <span
                                    class="text-lg transition-transform duration-300
                                           group-hover:rotate-90">

                                    +

                                </span>

                                Add Website

                            </a>

                        </div>

                    </div>

                @endif

            </div>


            {{-- ================================================= --}}
            {{-- FOOTER --}}
            {{-- ================================================= --}}

            <div
                class="slide-up mt-10 flex flex-col gap-2
                       border-t border-[#dddcd4] pt-6
                       text-xs text-[#949b97]
                       sm:flex-row sm:items-center
                       sm:justify-between"
                style="animation-delay:.55s">

                <p>
                    © {{ date('Y') }} SiteMonitor
                </p>


                <p class="flex items-center gap-2">

                    <span
                        class="pulse-animation h-1.5 w-1.5 rounded-full
                               bg-[#4d9564]">
                    </span>

                    Website monitoring made simple and reliable.

                </p>

            </div>

        </div>

    </div>

</x-app-layout>