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

        @keyframes floatSoft {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-4px);
            }
        }

        @keyframes shine {
            from {
                transform: translateX(-120%);
            }

            to {
                transform: translateX(120%);
            }
        }

        @keyframes pulseStatus {
            0%,
            100% {
                box-shadow: 0 0 0 0 rgba(79, 154, 99, .35);
            }

            50% {
                box-shadow: 0 0 0 6px rgba(79, 154, 99, 0);
            }
        }

        .animate-fade-up {
            animation: fadeUp .65s ease-out both;
        }

        .animate-fade-in {
            animation: fadeIn .7s ease-out both;
        }

        .animate-float-soft {
            animation: floatSoft 3.5s ease-in-out infinite;
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

        .delay-700 {
            animation-delay: .7s;
        }

        .animated-card {
            position: relative;
            overflow: hidden;
            transition:
                transform .3s ease,
                box-shadow .3s ease,
                border-color .3s ease;
        }

        .animated-card::after {
            content: "";
            position: absolute;
            inset: 0;
            pointer-events: none;
            background: linear-gradient(
                120deg,
                transparent 0%,
                rgba(255, 255, 255, .55) 45%,
                transparent 70%
            );
            transform: translateX(-120%);
        }

        .animated-card:hover::after {
            animation: shine .8s ease;
        }

        .animated-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px rgba(30, 64, 80, .08);
        }

        .website-card {
            transition:
                transform .3s ease,
                box-shadow .3s ease,
                border-color .3s ease;
        }

        .website-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 40px rgba(30, 64, 80, .10);
        }

        .animated-button {
            transition:
                transform .25s ease,
                box-shadow .25s ease,
                background-color .25s ease;
        }

        .animated-button:hover {
            transform: translateY(-2px);
        }

        .icon-float {
            transition:
                transform .3s ease,
                box-shadow .3s ease;
        }

        .group:hover .icon-float {
            transform: translateY(-3px) scale(1.06);
        }

        .status-dot {
            animation: pulseStatus 2s ease-in-out infinite;
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

        <div class="animate-fade-up relative overflow-hidden rounded-3xl border border-[#d8e8e6] bg-gradient-to-r from-[#f5fbfa] via-[#eef8f7] to-[#f8f3f8] px-6 py-6 shadow-sm sm:px-8">

            {{-- Decorative background --}}
            <div class="pointer-events-none absolute -right-20 -top-24 h-64 w-64 rounded-full bg-[#9bdedc]/25 blur-3xl"></div>

            <div class="pointer-events-none absolute -bottom-28 left-1/3 h-64 w-64 rounded-full bg-[#c9b4d5]/20 blur-3xl"></div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="mb-2 flex items-center gap-2">

                        <span class="status-dot h-2 w-2 rounded-full bg-[#3f968d]"></span>

                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#568b85]">
                            SiteMonitor
                        </span>

                    </div>

                    <h2 class="text-3xl font-black tracking-tight text-[#163d3a]">
                        My Websites
                    </h2>

                    <p class="mt-1 text-sm text-[#718582]">
                        Manage, monitor and check the availability of your websites.
                    </p>

                </div>


                <a
                    href="{{ route('sites.create') }}"
                    class="animated-button group inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#126b70] to-[#247f8b] px-5 py-3 text-sm font-bold text-white shadow-lg shadow-[#126b70]/20 hover:shadow-xl"
                >

                    <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-white/15 text-lg">
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
            {{-- SUCCESS MESSAGE --}}
            {{-- ================================================= --}}

            @if(session('success'))

                <div class="animate-fade-in mb-6 flex items-start gap-4 rounded-2xl border border-[#cce5d5] bg-[#f0f8f2] px-5 py-4 shadow-sm">

                    <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#dcefdc] text-[#478357]">
                        ✓
                    </div>

                    <div>

                        <p class="text-sm font-black text-[#3f704d]">
                            Action completed
                        </p>

                        <p class="mt-0.5 text-sm text-[#718878]">
                            {{ session('success') }}
                        </p>

                    </div>

                </div>

            @endif


            {{-- ================================================= --}}
            {{-- OVERVIEW --}}
            {{-- ================================================= --}}

            @php

                $totalWebsites = $sites->count();

                $activeWebsites = $sites->where('is_active', true)->count();

                $inactiveWebsites = $sites->where('is_active', false)->count();

            @endphp


            <div class="animate-fade-up mb-8">

                <div class="flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">

                    <div>

                        <p class="text-sm font-semibold text-[#5d8e87]">
                            Website Management
                        </p>

                        <h1 class="mt-1 text-3xl font-black tracking-tight text-[#243c39] sm:text-4xl">
                            Monitoring workspace
                        </h1>

                        <p class="mt-2 max-w-2xl text-sm leading-6 text-[#7b8985]">
                            Keep your websites organized and monitor their availability from one professional workspace.
                        </p>

                    </div>


                    {{-- System status --}}
                    <div class="animate-fade-in delay-200 inline-flex w-fit items-center gap-3 rounded-2xl border border-[#cde5df] bg-[#f3faf7] px-4 py-3">

                        <span class="relative flex h-3 w-3">

                            <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#65a981] opacity-50"></span>

                            <span class="status-dot relative inline-flex h-3 w-3 rounded-full bg-[#438c61]"></span>

                        </span>

                        <div>

                            <p class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#79928a]">
                                Monitoring system
                            </p>

                            <p class="text-sm font-bold text-[#3d6f56]">
                                Ready to monitor
                            </p>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- STATISTICS --}}
            {{-- ================================================= --}}

            <div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-3">


                {{-- Total --}}

                <div class="animated-card animate-fade-up rounded-3xl border border-[#c9e5e5] bg-gradient-to-br from-white to-[#edf9f9] p-6 shadow-sm">

                    <div class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#a8dfe0]/30 blur-2xl"></div>

                    <div class="relative z-10 flex items-center justify-between">

                        <div>

                            <p class="text-sm font-semibold text-[#668784]">
                                Total Websites
                            </p>

                            <p class="mt-2 text-4xl font-black tracking-tight text-[#164f55]">
                                {{ $totalWebsites }}
                            </p>

                            <p class="mt-2 text-xs font-medium text-[#829795]">
                                Websites in your workspace
                            </p>

                        </div>


                        <div class="icon-float animate-float-soft flex h-12 w-12 items-center justify-center rounded-2xl bg-[#cceeed] text-[#247b80]">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >

                                <circle cx="12" cy="12" r="9"></circle>

                                <path
                                    stroke-linecap="round"
                                    d="M3 12h18"
                                />

                                <path
                                    stroke-linecap="round"
                                    d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z"
                                />

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- Active --}}

                <div class="animated-card animate-fade-up delay-100 rounded-3xl border border-[#cde4d3] bg-gradient-to-br from-white to-[#f0f8f1] p-6 shadow-sm">

                    <div class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#b9dbbd]/30 blur-2xl"></div>

                    <div class="relative z-10 flex items-center justify-between">

                        <div>

                            <p class="text-sm font-semibold text-[#6d8874]">
                                Active
                            </p>

                            <p class="mt-2 text-4xl font-black tracking-tight text-[#39734d]">
                                {{ $activeWebsites }}
                            </p>

                            <p class="mt-2 text-xs font-medium text-[#819184]">
                                Currently monitored
                            </p>

                        </div>


                        <div class="icon-float animate-float-soft flex h-12 w-12 items-center justify-center rounded-2xl bg-[#dcefdc] text-[#47845b]">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 13l4 4L19 7"
                                />

                            </svg>

                        </div>

                    </div>

                </div>


                {{-- Inactive --}}

                <div class="animated-card animate-fade-up delay-200 rounded-3xl border border-[#d7cee2] bg-gradient-to-br from-white to-[#f5f0f8] p-6 shadow-sm">

                    <div class="pointer-events-none absolute -right-10 -top-10 h-32 w-32 rounded-full bg-[#d2bcdc]/30 blur-2xl"></div>

                    <div class="relative z-10 flex items-center justify-between">

                        <div>

                            <p class="text-sm font-semibold text-[#806d89]">
                                Inactive
                            </p>

                            <p class="mt-2 text-4xl font-black tracking-tight text-[#694e77]">
                                {{ $inactiveWebsites }}
                            </p>

                            <p class="mt-2 text-xs font-medium text-[#8d8192]">
                                Currently paused
                            </p>

                        </div>


                        <div class="icon-float animate-float-soft flex h-12 w-12 items-center justify-center rounded-2xl bg-[#eadff0] text-[#76577f]">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 18L18 6M6 6l12 12"
                                />

                            </svg>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- SECTION HEADER --}}
            {{-- ================================================= --}}

            <div class="animate-fade-up delay-300 mb-5 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#75908b]">
                        Your monitoring list
                    </p>

                    <h2 class="mt-1 text-2xl font-black tracking-tight text-[#293f3b]">
                        Monitored Websites
                    </h2>

                    <p class="mt-1 text-sm text-[#7f8c88]">
                        Availability, monitoring settings and quick actions.
                    </p>

                </div>


                <a
                    href="{{ route('sites.create') }}"
                    class="animated-button inline-flex w-fit items-center gap-2 rounded-xl border border-[#cde3e3] bg-white px-4 py-2.5 text-sm font-bold text-[#32767b] shadow-sm hover:bg-[#edf8f7]"
                >

                    <span class="text-base">
                        +
                    </span>

                    Add another website

                </a>

            </div>


            {{-- ================================================= --}}
            {{-- WEBSITES --}}
            {{-- ================================================= --}}

            @if($sites->count() > 0)

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-3">

                    @foreach($sites as $index => $site)

                        @php
                            $delayClasses = [
                                '',
                                'delay-100',
                                'delay-200',
                                'delay-300',
                                'delay-400',
                                'delay-500',
                            ];

                            $delayClass = $delayClasses[$index % 6];
                        @endphp


                        <div class="website-card animate-fade-up {{ $delayClass }} group relative overflow-hidden rounded-3xl border border-[#dddcd5] bg-white shadow-sm">

                            {{-- Decorative top line --}}

                            <div class="h-1.5 bg-gradient-to-r from-[#126b70] via-[#3f968d] to-[#9b82aa]"></div>


                            {{-- ================================================= --}}
                            {{-- CARD HEADER --}}
                            {{-- ================================================= --}}

                            <div class="p-6">

                                <div class="flex items-start justify-between gap-4">


                                    <div class="flex min-w-0 items-center gap-4">

                                        {{-- Website icon --}}

                                        <div class="icon-float flex h-[52px] w-[52px] shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-[#d9eff0] to-[#c4e4e4] text-[#27767c] shadow-sm">

                                            <svg
                                                class="h-6 w-6"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.7"
                                            >

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="9"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    d="M3 12h18"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z"
                                                />

                                            </svg>

                                        </div>


                                        <div class="min-w-0">

                                            <h3 class="truncate text-base font-black text-[#293d3a]">
                                                {{ $site->name }}
                                            </h3>

                                            <a
                                                href="{{ $site->url }}"
                                                target="_blank"
                                                rel="noopener noreferrer"
                                                class="mt-1 block truncate text-xs font-medium text-[#3c8c91] transition hover:text-[#166b70]"
                                            >
                                                {{ $site->url }}
                                            </a>

                                        </div>

                                    </div>


                                    {{-- Active status --}}

                                    @if($site->is_active)

                                        <span class="inline-flex shrink-0 items-center gap-2 rounded-full bg-[#e5f4e7] px-3 py-1.5 text-[10px] font-black uppercase tracking-wide text-[#3d7950]">

                                            <span class="relative flex h-2 w-2">

                                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#65a981] opacity-50"></span>

                                                <span class="status-dot relative h-2 w-2 rounded-full bg-[#4f9a63]"></span>

                                            </span>

                                            Active

                                        </span>

                                    @else

                                        <span class="inline-flex shrink-0 items-center gap-2 rounded-full bg-[#f1f1ec] px-3 py-1.5 text-[10px] font-black uppercase tracking-wide text-[#777d79]">

                                            <span class="h-2 w-2 rounded-full bg-[#999f9b]"></span>

                                            Inactive

                                        </span>

                                    @endif

                                </div>


                                {{-- ================================================= --}}
                                {{-- MONITORING INFO --}}
                                {{-- ================================================= --}}

                                <div class="mt-6 rounded-2xl border border-[#e7ebe7] bg-[#fafbf9] p-4 transition duration-300 group-hover:border-[#d5e6e4]">

                                    <div class="flex items-center justify-between gap-4">

                                        <div>

                                            <p class="text-[10px] font-bold uppercase tracking-[0.14em] text-[#9aa39f]">
                                                Monitoring interval
                                            </p>

                                            <p class="mt-1 text-lg font-black text-[#3d514c]">

                                                {{ $site->monitoring_interval }}

                                                <span class="text-xs font-bold text-[#84908c]">
                                                    minutes
                                                </span>

                                            </p>

                                        </div>


                                        <div class="icon-float flex h-10 w-10 items-center justify-center rounded-xl bg-[#e8f3f2] text-[#4b8584]">

                                            <svg
                                                class="h-5 w-5"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.7"
                                            >

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="9"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    d="M12 7v5l3 2"
                                                />

                                            </svg>

                                        </div>

                                    </div>

                                </div>


                                {{-- ================================================= --}}
                                {{-- URL BOX --}}
                                {{-- ================================================= --}}

                                <div class="mt-4 rounded-2xl border border-[#e4e9e7] bg-white px-4 py-3 transition duration-300 group-hover:border-[#cfe2df]">

                                    <div class="flex items-center gap-3">

                                        <div class="icon-float flex h-8 w-8 shrink-0 items-center justify-center rounded-lg bg-[#eef7f6] text-[#398187]">

                                            <svg
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="9"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    d="M3 12h18"
                                                />

                                            </svg>

                                        </div>

                                        <a
                                            href="{{ $site->url }}"
                                            target="_blank"
                                            rel="noopener noreferrer"
                                            class="min-w-0 truncate text-xs font-semibold text-[#607572] transition hover:text-[#176b70]"
                                        >
                                            {{ $site->url }}
                                        </a>

                                    </div>

                                </div>

                            </div>


                            {{-- ================================================= --}}
                            {{-- ACTIONS --}}
                            {{-- ================================================= --}}

                            <div class="border-t border-[#ecece7] bg-gradient-to-r from-[#fafcfb] to-[#faf8fb] px-5 py-4">

                                <div class="grid grid-cols-3 gap-2">


                                    {{-- Check --}}

                                    <form
                                        action="{{ route('sites.check', $site) }}"
                                        method="POST"
                                    >

                                        @csrf

                                        <button
                                            type="submit"
                                            class="animated-button flex w-full items-center justify-center gap-1.5 rounded-xl bg-gradient-to-r from-[#126b70] to-[#247f8b] px-3 py-2.5 text-xs font-bold text-white shadow-sm hover:shadow-md"
                                        >

                                            <svg
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M4 12a8 8 0 0116 0"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M12 8v4l2.5 1.5"
                                                />

                                            </svg>

                                            Check

                                        </button>

                                    </form>


                                    {{-- Edit --}}

                                    <a
                                        href="{{ route('sites.edit', $site) }}"
                                        class="animated-button flex items-center justify-center gap-1.5 rounded-xl border border-[#d7e3e1] bg-white px-3 py-2.5 text-xs font-bold text-[#4f7773] shadow-sm hover:bg-[#edf7f6]"
                                    >

                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12 20h9"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16.5 3.5a2.1 2.1 0 013 3L8 18l-4 1 1-4L16.5 3.5z"
                                            />

                                        </svg>

                                        Edit

                                    </a>


                                    {{-- Delete --}}

                                    <form
                                        action="{{ route('sites.destroy', $site) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this website?');"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="animated-button flex w-full items-center justify-center gap-1.5 rounded-xl border border-[#efd8d6] bg-white px-3 py-2.5 text-xs font-bold text-[#b65a56] shadow-sm hover:bg-[#fff3f1]"
                                        >

                                            <svg
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="1.8"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M4 7h16"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M10 11v6M14 11v6"
                                                />

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M6 7l1 13h10l1-13M9 7V4h6v3"
                                                />

                                            </svg>

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>


            @else

                {{-- ================================================= --}}
                {{-- EMPTY STATE --}}
                {{-- ================================================= --}}

                <div class="animate-fade-up delay-400 overflow-hidden rounded-3xl border border-[#dddcd5] bg-white shadow-sm">

                    <div class="relative px-6 py-20 text-center sm:px-10">

                        <div class="pointer-events-none absolute -right-20 -top-20 h-56 w-56 rounded-full bg-[#9bdedc]/20 blur-3xl"></div>

                        <div class="pointer-events-none absolute -bottom-20 -left-20 h-56 w-56 rounded-full bg-[#c9b4d5]/15 blur-3xl"></div>


                        <div class="relative z-10">

                            <div class="animate-float-soft mx-auto flex h-20 w-20 items-center justify-center rounded-3xl bg-gradient-to-br from-[#d9eff0] to-[#e5dced] text-[#347e83] shadow-sm">

                                <svg
                                    class="h-9 w-9"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.6"
                                >

                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="9"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        d="M3 12h18"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z"
                                    />

                                </svg>

                            </div>


                            <p class="mt-6 text-xs font-bold uppercase tracking-[0.16em] text-[#6d928c]">
                                Monitoring workspace
                            </p>

                            <h2 class="mt-2 text-2xl font-black tracking-tight text-[#344540]">
                                No websites connected yet
                            </h2>

                            <p class="mx-auto mt-3 max-w-lg text-sm leading-6 text-[#7f8b87]">
                                Add your first website and start monitoring availability, response time and uptime from your SiteMonitor dashboard.
                            </p>


                            <div class="mt-7">

                                <a
                                    href="{{ route('sites.create') }}"
                                    class="animated-button inline-flex items-center gap-2 rounded-2xl bg-gradient-to-r from-[#126b70] to-[#247f8b] px-6 py-3 text-sm font-bold text-white shadow-lg shadow-[#126b70]/20 hover:shadow-xl"
                                >

                                    <span class="text-lg">
                                        +
                                    </span>

                                    Add your first website

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            @endif


            {{-- ================================================= --}}
            {{-- FOOTER --}}
            {{-- ================================================= --}}

            <div class="animate-fade-in delay-600 mt-10 flex flex-col gap-2 border-t border-[#dddcd4] pt-6 text-xs text-[#949b97] sm:flex-row sm:items-center sm:justify-between">

                <p>
                    © {{ date('Y') }} SiteMonitor
                </p>

                <p class="flex items-center gap-2">

                    <span class="h-1.5 w-1.5 rounded-full bg-[#4d9564]"></span>

                    Website monitoring made simple and reliable.

                </p>

            </div>

        </div>

    </div>

</x-app-layout>