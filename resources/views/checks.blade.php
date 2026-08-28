<x-app-layout>

    {{-- ========================================================= --}}
    {{-- ANIMATIONS --}}
    {{-- ========================================================= --}}

    <style>

        @keyframes recentFade {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes recentSlide {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes recentScale {
            from {
                opacity: 0;
                transform: scale(.96);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes softFloat {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-5px);
            }
        }

        .recent-page {
            animation: recentFade .5s ease-out both;
        }

        .recent-slide {
            animation: recentSlide .65s cubic-bezier(.22, 1, .36, 1) both;
        }

        .recent-scale {
            animation: recentScale .6s cubic-bezier(.22, 1, .36, 1) both;
        }

        .recent-float {
            animation: softFloat 3s ease-in-out infinite;
        }

        .recent-row {
            animation: recentSlide .55s cubic-bezier(.22, 1, .36, 1) both;
        }

        .recent-row:nth-child(1) {
            animation-delay: .05s;
        }

        .recent-row:nth-child(2) {
            animation-delay: .10s;
        }

        .recent-row:nth-child(3) {
            animation-delay: .15s;
        }

        .recent-row:nth-child(4) {
            animation-delay: .20s;
        }

        .recent-row:nth-child(5) {
            animation-delay: .25s;
        }

        .recent-row:nth-child(6) {
            animation-delay: .30s;
        }

        .recent-row:nth-child(7) {
            animation-delay: .35s;
        }

        .recent-row:nth-child(8) {
            animation-delay: .40s;
        }

        .recent-row:nth-child(9) {
            animation-delay: .45s;
        }

        .recent-row:nth-child(10) {
            animation-delay: .50s;
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
            class="recent-slide relative overflow-hidden rounded-3xl
                   border border-[#ddd7e3]
                   bg-gradient-to-r
                   from-[#faf6ed]
                   via-[#f3f8fb]
                   to-[#f6f0f8]
                   px-6 py-6 shadow-sm
                   sm:px-8">

            {{-- Cream decorative --}}
            <div
                class="pointer-events-none absolute -left-20 -top-24
                       h-64 w-64 rounded-full
                       bg-[#ead9bb]/30 blur-3xl">
            </div>

            {{-- Blue decorative --}}
            <div
                class="pointer-events-none absolute -right-20 -top-20
                       h-64 w-64 rounded-full
                       bg-[#b9dfe8]/30 blur-3xl">
            </div>

            {{-- Purple decorative --}}
            <div
                class="pointer-events-none absolute -bottom-28 left-1/3
                       h-64 w-64 rounded-full
                       bg-[#d5c2df]/25 blur-3xl">
            </div>


            <div class="relative z-10">

                <div class="mb-2 flex items-center gap-2">

                    <span
                        class="h-2 w-2 rounded-full bg-[#5b9ca8]
                               animate-pulse">
                    </span>

                    <span
                        class="text-xs font-bold uppercase
                               tracking-[0.18em] text-[#648a91]">

                        SiteMonitor

                    </span>

                </div>


                <h2
                    class="text-3xl font-black tracking-tight
                           text-[#293f43]">

                    Recent Checks

                </h2>


                <p
                    class="mt-1 max-w-2xl text-sm
                           text-[#7b8587]">

                    View the latest monitoring activity and
                    performance checks for your websites.

                </p>

            </div>

        </div>

    </x-slot>


    {{-- ========================================================= --}}
    {{-- MAIN --}}
    {{-- ========================================================= --}}

    <div class="recent-page min-h-screen bg-[#f5f1e8]">

        <div
            class="mx-auto max-w-7xl px-4 py-8
                   sm:px-6 lg:px-8">


            {{-- ================================================= --}}
            {{-- PAGE INTRO --}}
            {{-- ================================================= --}}

            <div
                class="recent-slide mb-8"
                style="animation-delay:.08s">

                <div
                    class="flex flex-col gap-5
                           lg:flex-row lg:items-end
                           lg:justify-between">

                    <div>

                        <p
                            class="text-sm font-semibold
                                   text-[#638e95]">

                            Monitoring Activity

                        </p>


                        <h1
                            class="mt-1 text-3xl font-black
                                   tracking-tight text-[#293d40]
                                   sm:text-4xl">

                            Recent Checks

                        </h1>


                        <p
                            class="mt-2 max-w-2xl
                                   text-sm leading-6
                                   text-[#7e8889]">

                            Review the latest availability,
                            response time and HTTP status of
                            your monitored websites.

                        </p>

                    </div>


                    {{-- Manage Websites --}}
                    <a
                        href="{{ route('sites.index') }}"
                        wire:navigate
                        class="group inline-flex w-fit items-center
                               justify-center gap-2 rounded-2xl
                               bg-gradient-to-r
                               from-[#438b96]
                               to-[#5f91a9]
                               px-5 py-3 text-sm font-bold
                               text-white shadow-sm
                               transition-all duration-300
                               hover:-translate-y-1
                               hover:shadow-lg">

                        <span
                            class="transition-transform duration-300
                                   group-hover:translate-x-1">

                            →

                        </span>

                        Manage Websites

                    </a>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- STATISTICS --}}
            {{-- ================================================= --}}

            <div
                class="mb-7 grid grid-cols-1 gap-5
                       sm:grid-cols-3">


                {{-- Displayed Checks --}}
                <div
                    class="recent-slide group relative overflow-hidden
                           rounded-3xl border border-[#ded4c2]
                           bg-gradient-to-br
                           from-white to-[#faf3e5]
                           p-6 shadow-sm
                           transition-all duration-500
                           hover:-translate-y-1
                           hover:shadow-lg"
                    style="animation-delay:.15s">

                    <div
                        class="pointer-events-none absolute
                               -right-10 -top-10 h-32 w-32
                               rounded-full bg-[#e8d2ad]/30
                               blur-2xl
                               transition-transform duration-700
                               group-hover:scale-125">
                    </div>


                    <div
                        class="relative z-10
                               flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold
                                       text-[#8d806b]">

                                Displayed Checks

                            </p>


                            <p
                                class="mt-2 text-3xl font-black
                                       tracking-tight text-[#665b4c]
                                       transition-transform
                                       duration-300
                                       group-hover:scale-105">

                                {{ $checks->total() }}

                            </p>


                            <p
                                class="mt-3 text-xs font-medium
                                       text-[#a09787]">

                                Total monitoring records

                            </p>

                        </div>


                        <div
                            class="flex h-11 w-11
                                   items-center justify-center
                                   rounded-2xl
                                   bg-[#eee1ca]
                                   text-[#8d7957]
                                   transition-all duration-500
                                   group-hover:rotate-6
                                   group-hover:scale-110">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 5h6M9 3h6a2 2 0 012 2v1h1a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2h1V5a2 2 0 012-2z">
                                </path>

                                <path
                                    stroke-linecap="round"
                                    d="M8 11h8M8 15h6">
                                </path>

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- Current Page --}}
                <div
                    class="recent-slide group relative overflow-hidden
                           rounded-3xl border border-[#cbdfe7]
                           bg-gradient-to-br
                           from-white to-[#edf7fa]
                           p-6 shadow-sm
                           transition-all duration-500
                           hover:-translate-y-1
                           hover:shadow-lg"
                    style="animation-delay:.24s">

                    <div
                        class="pointer-events-none absolute
                               -right-10 -top-10 h-32 w-32
                               rounded-full bg-[#b9dfe8]/30
                               blur-2xl
                               transition-transform duration-700
                               group-hover:scale-125">
                    </div>


                    <div
                        class="relative z-10
                               flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold
                                       text-[#65858c]">

                                Current Page

                            </p>


                            <p
                                class="mt-2 text-3xl font-black
                                       tracking-tight text-[#397888]
                                       transition-transform
                                       duration-300
                                       group-hover:scale-105">

                                {{ $checks->count() }}

                            </p>


                            <p
                                class="mt-3 text-xs font-medium
                                       text-[#849ba0]">

                                Checks shown on this page

                            </p>

                        </div>


                        <div
                            class="flex h-11 w-11
                                   items-center justify-center
                                   rounded-2xl
                                   bg-[#d9edf2]
                                   text-[#4d8998]
                                   transition-all duration-500
                                   group-hover:-rotate-6
                                   group-hover:scale-110">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M4 6a2 2 0 012-2h12a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V6z">
                                </path>

                                <path
                                    stroke-linecap="round"
                                    d="M8 8h8M8 12h8M8 16h5">
                                </path>

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- Latest Check --}}
                <div
                    class="recent-slide group relative overflow-hidden
                           rounded-3xl border border-[#d9cee2]
                           bg-gradient-to-br
                           from-white to-[#f5eff8]
                           p-6 shadow-sm
                           transition-all duration-500
                           hover:-translate-y-1
                           hover:shadow-lg"
                    style="animation-delay:.33s">

                    <div
                        class="pointer-events-none absolute
                               -right-10 -top-10 h-32 w-32
                               rounded-full bg-[#d6c2df]/30
                               blur-2xl
                               transition-transform duration-700
                               group-hover:scale-125">
                    </div>


                    <div
                        class="relative z-10
                               flex items-start justify-between">

                        <div>

                            <p
                                class="text-sm font-semibold
                                       text-[#83738e]">

                                Latest Check

                            </p>


                            <p
                                class="mt-2 text-base font-black
                                       text-[#62536d]">

                                @if($checks->first())

                                    {{ $checks->first()->checked_at->diffForHumans() }}

                                @else

                                    No checks yet

                                @endif

                            </p>


                            <p
                                class="mt-3 text-xs font-medium
                                       text-[#9b8fa1]">

                                Most recent monitoring activity

                            </p>

                        </div>


                        <div
                            class="recent-float flex h-11 w-11
                                   items-center justify-center
                                   rounded-2xl
                                   bg-[#e8ddef]
                                   text-[#846e91]">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8">

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9">
                                </circle>

                                <path
                                    stroke-linecap="round"
                                    d="M12 7v5l3 2">
                                </path>

                            </svg>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- HISTORY CARD --}}
            {{-- ================================================= --}}

            <div
                class="recent-scale overflow-hidden rounded-3xl
                       border border-[#ddd9d1]
                       bg-white shadow-sm
                       transition-shadow duration-500
                       hover:shadow-lg"
                style="animation-delay:.38s">


                {{-- Card Header --}}
                <div
                    class="relative overflow-hidden
                           border-b border-[#e9e5de]
                           bg-gradient-to-r
                           from-[#faf5ea]
                           via-[#f4f8fa]
                           to-[#f6f0f8]
                           px-6 py-6 sm:px-8">

                    <div
                        class="pointer-events-none absolute
                               -right-16 -top-20 h-44 w-44
                               rounded-full bg-[#c8e1e7]/25
                               blur-3xl">
                    </div>

                    <div
                        class="pointer-events-none absolute
                               -left-20 -bottom-24 h-48 w-48
                               rounded-full bg-[#dbc8df]/20
                               blur-3xl">
                    </div>


                    <div class="relative z-10 flex items-center gap-4">

                        <div
                            class="flex h-12 w-12 shrink-0
                                   items-center justify-center
                                   rounded-2xl
                                   bg-gradient-to-br
                                   from-[#d9edf0]
                                   to-[#e7dcef]
                                   text-[#557f8c]
                                   transition-all duration-500
                                   hover:scale-110
                                   hover:rotate-6">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 5h6a2 2 0 012 2v1h1a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2v-9a2 2 0 012-2h1V7a2 2 0 012-2z">
                                </path>

                                <path
                                    stroke-linecap="round"
                                    d="M8 13h8M8 17h5">
                                </path>

                            </svg>

                        </div>


                        <div>

                            <h2
                                class="text-xl font-black
                                       text-[#293d40]">

                                Monitoring History

                            </h2>


                            <p
                                class="mt-1 text-sm
                                       text-[#7f898b]">

                                Latest website availability checks.

                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- TABLE --}}
                {{-- ================================================= --}}

                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead>

                            <tr
                                class="border-b border-[#ebe7df]
                                       bg-[#faf9f6]">

                                <th
                                    class="px-6 py-4 text-left
                                           text-[10px] font-bold
                                           uppercase tracking-[0.14em]
                                           text-[#8a918f]">

                                    Website

                                </th>

                                <th
                                    class="px-6 py-4 text-left
                                           text-[10px] font-bold
                                           uppercase tracking-[0.14em]
                                           text-[#8a918f]">

                                    Status

                                </th>

                                <th
                                    class="px-6 py-4 text-left
                                           text-[10px] font-bold
                                           uppercase tracking-[0.14em]
                                           text-[#8a918f]">

                                    Response

                                </th>

                                <th
                                    class="px-6 py-4 text-left
                                           text-[10px] font-bold
                                           uppercase tracking-[0.14em]
                                           text-[#8a918f]">

                                    HTTP

                                </th>

                                <th
                                    class="px-6 py-4 text-left
                                           text-[10px] font-bold
                                           uppercase tracking-[0.14em]
                                           text-[#8a918f]">

                                    Checked At

                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($checks as $check)

                                <tr
                                    class="recent-row group
                                           border-b border-[#efebe5]
                                           last:border-b-0
                                           transition-all duration-300
                                           hover:bg-gradient-to-r
                                           hover:from-[#fffaf1]
                                           hover:via-[#f5fafb]
                                           hover:to-[#faf5fb]">


                                    {{-- Website --}}
                                    <td class="px-6 py-5">

                                        <div
                                            class="flex items-center gap-3">

                                            <div
                                                class="flex h-10 w-10
                                                       shrink-0
                                                       items-center
                                                       justify-center
                                                       rounded-xl
                                                       bg-gradient-to-br
                                                       from-[#e0eff1]
                                                       to-[#ebe1ef]
                                                       text-[#577f8a]
                                                       transition-all
                                                       duration-300
                                                       group-hover:scale-110
                                                       group-hover:rotate-3">

                                                <svg
                                                    class="h-5 w-5"
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

                                                <p
                                                    class="text-sm font-bold
                                                           text-[#344447]
                                                           transition-colors
                                                           duration-300
                                                           group-hover:text-[#3e8190]">

                                                    {{ $check->site->name }}

                                                </p>


                                                <p
                                                    class="mt-1 max-w-xs truncate
                                                           text-xs
                                                           text-[#9a9d9c]">

                                                    {{ $check->site->url }}

                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    {{-- Status --}}
                                    <td class="whitespace-nowrap px-6 py-5">

                                        @if(strtolower($check->status) === 'up')

                                            <span
                                                class="inline-flex items-center gap-2
                                                       rounded-full
                                                       border border-[#cde4d3]
                                                       bg-[#eef8ef]
                                                       px-3 py-1.5
                                                       text-xs font-bold
                                                       text-[#47805a]
                                                       transition-all duration-300
                                                       hover:scale-105">

                                                <span
                                                    class="h-1.5 w-1.5 rounded-full
                                                           bg-[#55a06a]">
                                                </span>

                                                UP

                                            </span>

                                        @else

                                            <span
                                                class="inline-flex items-center gap-2
                                                       rounded-full
                                                       border border-[#efd2d0]
                                                       bg-[#fff0ef]
                                                       px-3 py-1.5
                                                       text-xs font-bold
                                                       text-[#b14b48]
                                                       transition-all duration-300
                                                       hover:scale-105">

                                                <span
                                                    class="h-1.5 w-1.5 rounded-full
                                                           bg-[#d15b55]">
                                                </span>

                                                DOWN

                                            </span>

                                        @endif

                                    </td>


                                    {{-- Response --}}
                                    <td class="whitespace-nowrap px-6 py-5">

                                        @if($check->response_time !== null)

                                            <span
                                                class="inline-flex items-center
                                                       rounded-xl
                                                       bg-[#edf7fa]
                                                       px-3 py-1.5
                                                       text-sm font-bold
                                                       text-[#467d8a]
                                                       transition-all duration-300
                                                       hover:-translate-y-0.5">

                                                {{ number_format($check->response_time, 0) }}
                                                ms

                                            </span>

                                        @else

                                            <span
                                                class="text-sm
                                                       text-[#aaa9a4]">

                                                —

                                            </span>

                                        @endif

                                    </td>


                                    {{-- HTTP --}}
                                    <td class="whitespace-nowrap px-6 py-5">

                                        @if($check->http_code)

                                            @if(
                                                $check->http_code >= 200 &&
                                                $check->http_code < 400
                                            )

                                                <span
                                                    class="rounded-xl
                                                           bg-[#f0f7f1]
                                                           px-3 py-1.5
                                                           text-xs font-bold
                                                           text-[#4c8058]">

                                                    {{ $check->http_code }}

                                                </span>

                                            @else

                                                <span
                                                    class="rounded-xl
                                                           bg-[#fff0ef]
                                                           px-3 py-1.5
                                                           text-xs font-bold
                                                           text-[#b14b48]">

                                                    {{ $check->http_code }}

                                                </span>

                                            @endif

                                        @else

                                            <span
                                                class="text-sm
                                                       text-[#aaa9a4]">

                                                —

                                            </span>

                                        @endif

                                    </td>


                                    {{-- Date --}}
                                    <td class="whitespace-nowrap px-6 py-5">

                                        <p
                                            class="text-sm font-bold
                                                   text-[#536064]">

                                            {{ $check->checked_at->diffForHumans() }}

                                        </p>


                                        <p
                                            class="mt-1 text-xs
                                                   text-[#9b9f9f]">

                                            {{ $check->checked_at->format('d/m/Y H:i:s') }}

                                        </p>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="px-6 py-20 text-center">

                                        <div
                                            class="mx-auto max-w-sm">

                                            <div
                                                class="recent-float mx-auto
                                                       flex h-16 w-16
                                                       items-center
                                                       justify-center
                                                       rounded-3xl
                                                       bg-gradient-to-br
                                                       from-[#e4f1f2]
                                                       to-[#eee4f1]
                                                       text-[#60818b]">

                                                <svg
                                                    class="h-7 w-7"
                                                    fill="none"
                                                    viewBox="0 0 24 24"
                                                    stroke="currentColor"
                                                    stroke-width="1.6">

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        d="M9 5h6a2 2 0 012 2v1h1a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2v-9a2 2 0 012-2h1V7a2 2 0 012-2z">
                                                    </path>

                                                    <path
                                                        stroke-linecap="round"
                                                        d="M8 13h8M8 17h5">
                                                    </path>

                                                </svg>

                                            </div>


                                            <h3
                                                class="mt-5 text-lg
                                                       font-black
                                                       text-[#3b484b]">

                                                No checks yet

                                            </h3>


                                            <p
                                                class="mt-2 text-sm
                                                       leading-6
                                                       text-[#858d8e]">

                                                Monitoring checks will appear
                                                here once your websites are
                                                checked.

                                            </p>


                                            <a
                                                href="{{ route('sites.index') }}"
                                                wire:navigate
                                                class="group mt-6 inline-flex
                                                       items-center gap-2
                                                       rounded-2xl
                                                       bg-gradient-to-r
                                                       from-[#438b96]
                                                       to-[#657fa4]
                                                       px-5 py-3
                                                       text-sm font-bold
                                                       text-white shadow-md
                                                       transition-all duration-300
                                                       hover:-translate-y-1
                                                       hover:shadow-lg">

                                                <span
                                                    class="transition-transform
                                                           duration-300
                                                           group-hover:translate-x-1">

                                                    →

                                                </span>

                                                View Websites

                                            </a>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>


                {{-- ================================================= --}}
                {{-- PAGINATION --}}
                {{-- ================================================= --}}

                @if($checks->hasPages())

                    <div
                        class="border-t border-[#e9e5de]
                               bg-gradient-to-r
                               from-[#faf7f0]
                               via-white
                               to-[#f8f3fa]
                               px-6 py-5">

                        {{ $checks->links() }}

                    </div>

                @endif

            </div>


            {{-- ================================================= --}}
            {{-- FOOTER --}}
            {{-- ================================================= --}}

            <div
                class="recent-slide mt-10 flex flex-col gap-2
                       border-t border-[#ddd9d1]
                       pt-6 text-xs text-[#979d9c]
                       sm:flex-row sm:items-center
                       sm:justify-between"
                style="animation-delay:.55s">

                <p>
                    © {{ date('Y') }} SiteMonitor
                </p>


                <p class="flex items-center gap-2">

                    <span
                        class="h-1.5 w-1.5 rounded-full
                               bg-[#5b91a0]">
                    </span>

                    Monitoring made simple and reliable.

                </p>

            </div>

        </div>

    </div>

</x-app-layout>