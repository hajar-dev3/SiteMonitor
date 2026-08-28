<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Admin - SiteMonitor' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-[#f7f4ee] text-[#253638]">

<div
    x-data="{ open: false }"
    class="min-h-screen"
>

    {{-- ========================================================= --}}
    {{-- MOBILE TOP BAR --}}
    {{-- ========================================================= --}}

    <div
        class="relative z-50 flex h-[72px] items-center justify-between
               border-b border-[#d9e1df]
               bg-[#f9f6ef]
               px-4 shadow-sm lg:hidden"
    >

        <a
            href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3"
        >

            <div
                class="flex h-10 w-10 items-center justify-center
                       rounded-xl bg-[#2F8F9D] text-white
                       shadow-[0_6px_16px_rgba(47,143,157,0.22)]"
            >

                <svg
                    class="h-5 w-5"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                >
                    <path
                        d="M13.2 2.5L4.2 13.4c-.5.6-.1 1.5.7 1.5h5.4l-1 6.6c-.1.9 1 1.3 1.5.6l9-10.9c.5-.6-.1-1.5-.7-1.5h-5.4l1-6.6c-.1 1 1.3 1 1.5.6Z"
                    />
                </svg>

            </div>

            <div>

                <p class="text-[16px] font-black tracking-tight text-[#2c4245]">
                    SiteMonitor
                </p>

                <p class="text-[9px] font-bold uppercase tracking-[0.14em] text-[#7d9496]">
                    Administration
                </p>

            </div>

        </a>


        <button
            @click="open = !open"
            type="button"
            class="flex h-10 w-10 items-center justify-center
                   rounded-xl border border-[#d9e1df]
                   bg-white text-[#607b7e] shadow-sm"
        >

            <svg
                x-show="!open"
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M4 6h16M4 12h16M4 18h16"
                />
            </svg>

            <svg
                x-show="open"
                x-cloak
                class="h-5 w-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="1.8"
                    d="M6 18L18 6M6 6l12 12"
                />
            </svg>

        </button>

    </div>


    {{-- ========================================================= --}}
    {{-- DESKTOP SIDEBAR --}}
    {{-- ========================================================= --}}

    <aside
        class="fixed inset-y-0 left-0 z-40 hidden w-72
               overflow-hidden border-r border-[#384b4d]
               bg-[#253638]
               shadow-[8px_0_30px_rgba(31,52,54,0.08)]
               lg:flex lg:flex-col"
    >

        {{-- Decorative background --}}

        <div
            class="pointer-events-none absolute -right-24 -top-24
                   h-64 w-64 rounded-full
                   bg-[#7bb9c4]/10 blur-3xl"
        ></div>

        <div
            class="pointer-events-none absolute -bottom-28 -left-20
                   h-72 w-72 rounded-full
                   bg-[#bda3c9]/10 blur-3xl"
        ></div>


        {{-- ===================================================== --}}
        {{-- LOGO --}}
        {{-- ===================================================== --}}

        <div
            class="relative z-10 flex h-24 shrink-0 items-center
                   border-b border-[#3a4c4e] px-6"
        >

            <a
                href="{{ route('admin.dashboard') }}"
                class="group flex items-center gap-3"
            >

                <div
                    class="relative flex h-11 w-11 items-center
                           justify-center overflow-hidden rounded-2xl
                           bg-[#2F8F9D] text-white
                           shadow-[0_8px_20px_rgba(47,143,157,0.25)]
                           transition duration-300
                           group-hover:-translate-y-0.5"
                >

                    <svg
                        class="relative z-10 h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            d="M13.2 2.5L4.2 13.4c-.5.6-.1 1.5.7 1.5h5.4l-1 6.6c-.1.9 1 1.3 1.5.6l9-10.9c.5-.6-.1-1.5-.7-1.5h-5.4l1-6.6c-.1 1 1.3 1 1.5.6Z"
                        />
                    </svg>

                </div>

                <div>

                    <h1 class="text-[17px] font-black tracking-tight text-[#f5f3ed]">
                        SiteMonitor
                    </h1>

                    <p
                        class="mt-0.5 text-[10px] font-semibold uppercase
                               tracking-[0.14em] text-[#8fa6a7]"
                    >
                        Administration
                    </p>

                </div>

            </a>

        </div>


        {{-- ===================================================== --}}
        {{-- NAVIGATION --}}
        {{-- ===================================================== --}}

        <nav
            class="relative z-10 flex flex-1 flex-col
                   overflow-y-auto px-4 py-7"
        >

            <div class="mb-3 px-3">

                <p
                    class="text-[10px] font-bold uppercase
                           tracking-[0.18em] text-[#71898b]"
                >
                    Admin Menu
                </p>

            </div>


            <div class="space-y-1.5">


                {{-- ================================================= --}}
                {{-- DASHBOARD --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.dashboard') }}"
                    class="group relative flex items-center gap-3
                           overflow-hidden rounded-2xl px-3.5 py-3
                           text-sm font-semibold transition-all duration-300
                           {{ request()->routeIs('admin.dashboard')
                                ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                                : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('admin.dashboard'))

                        <span
                            class="absolute left-0 top-1/2 h-7 w-1
                                   -translate-y-1/2 rounded-r-full
                                   bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0 items-center
                               justify-center rounded-xl
                               {{ request()->routeIs('admin.dashboard')
                                    ? 'bg-white/15 text-white'
                                    : 'bg-white/[0.045] text-[#8fb5bc]' }}"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M3 11.5L12 4l9 7.5"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M5 10.5V20h14v-9.5"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M9 20v-5h6v5"
                            />

                        </svg>

                    </span>

                    Dashboard

                </a>


                {{-- ================================================= --}}
                {{-- USERS --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.users.index') }}"
                    class="group relative flex items-center gap-3
                           overflow-hidden rounded-2xl px-3.5 py-3
                           text-sm font-semibold transition-all duration-300
                           {{ request()->routeIs('admin.users.*')
                                ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                                : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('admin.users.*'))

                        <span
                            class="absolute left-0 top-1/2 h-7 w-1
                                   -translate-y-1/2 rounded-r-full
                                   bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0 items-center
                               justify-center rounded-xl
                               {{ request()->routeIs('admin.users.*')
                                    ? 'bg-white/15 text-white'
                                    : 'bg-white/[0.045] text-[#b9a7c5]' }}"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"
                            />

                            <circle
                                cx="9"
                                cy="7"
                                r="4"
                                stroke-width="1.7"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M22 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"
                            />

                        </svg>

                    </span>

                    Users

                </a>


                {{-- ================================================= --}}
                {{-- SITES --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.sites.index') }}"
                    class="group relative flex items-center gap-3
                           overflow-hidden rounded-2xl px-3.5 py-3
                           text-sm font-semibold transition-all duration-300
                           {{ request()->routeIs('admin.sites.*')
                                ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                                : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('admin.sites.*'))

                        <span
                            class="absolute left-0 top-1/2 h-7 w-1
                                   -translate-y-1/2 rounded-r-full
                                   bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0 items-center
                               justify-center rounded-xl
                               {{ request()->routeIs('admin.sites.*')
                                    ? 'bg-white/15 text-white'
                                    : 'bg-white/[0.045] text-[#8fb5bc]' }}"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                                stroke-width="1.7"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-width="1.7"
                                d="M3 12h18"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-width="1.7"
                                d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z"
                            />

                        </svg>

                    </span>

                    Sites

                </a>


                {{-- ================================================= --}}
                {{-- STATISTICS --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.statistics.index') }}"
                    class="group relative flex items-center gap-3
                           overflow-hidden rounded-2xl px-3.5 py-3
                           text-sm font-semibold transition-all duration-300
                           {{ request()->routeIs('admin.statistics.*')
                                ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                                : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('admin.statistics.*'))

                        <span
                            class="absolute left-0 top-1/2 h-7 w-1
                                   -translate-y-1/2 rounded-r-full
                                   bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0 items-center
                               justify-center rounded-xl
                               {{ request()->routeIs('admin.statistics.*')
                                    ? 'bg-white/15 text-white'
                                    : 'bg-white/[0.045] text-[#b9a7c5]' }}"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M5 20V10"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M12 20V4"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M19 20v-7"
                            />

                        </svg>

                    </span>

                    Statistics

                </a>


                {{-- ================================================= --}}
                {{-- ADMIN MONITORING --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.monitoring.index') }}"
                    class="group relative flex items-center gap-3
                           overflow-hidden rounded-2xl px-3.5 py-3
                           text-sm font-semibold transition-all duration-300
                           {{ request()->routeIs('admin.monitoring.*')
                                ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                                : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('admin.monitoring.*'))

                        <span
                            class="absolute left-0 top-1/2 h-7 w-1
                                   -translate-y-1/2 rounded-r-full
                                   bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0 items-center
                               justify-center rounded-xl
                               {{ request()->routeIs('admin.monitoring.*')
                                    ? 'bg-white/15 text-white'
                                    : 'bg-white/[0.045] text-[#8fb5bc]' }}"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M13 3L4 14h7v7l9-11h-7z"
                            />

                        </svg>

                    </span>

                    Monitoring

                </a>

            </div>


            {{-- ===================================================== --}}
            {{-- SYSTEM STATUS --}}
            {{-- ===================================================== --}}

            <div
                class="mt-7 rounded-2xl border border-[#405456]
                       bg-gradient-to-br from-[#2b4143] to-[#293b3d]
                       p-4"
            >

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-9 w-9 items-center
                               justify-center rounded-xl
                               bg-[#dcefe2]/10"
                    >

                        <span
                            class="h-2.5 w-2.5 rounded-full
                                   bg-[#73b88a]"
                        ></span>

                    </div>

                    <div>

                        <p
                            class="text-[9px] font-bold uppercase
                                   tracking-[0.16em] text-[#7f9998]"
                        >
                            System Status
                        </p>

                        <p class="mt-0.5 text-xs font-bold text-[#b9d8c3]">
                            Operational
                        </p>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- BOTTOM --}}
            {{-- ===================================================== --}}

            <div class="mt-auto pt-7">

                <div
                    class="mb-3 h-px bg-gradient-to-r
                           from-transparent via-[#405355]
                           to-transparent"
                ></div>


                {{-- Profile --}}

                <a
                    href="{{ route('admin.profile') }}"
                    class="group flex items-center gap-3
                           rounded-2xl px-3.5 py-3
                           text-sm font-semibold
                           text-[#b7c5c4]
                           transition hover:bg-white/[0.055]
                           hover:text-[#f4f3ee]"
                >

                    <span
                        class="flex h-9 w-9 items-center
                               justify-center rounded-xl
                               bg-white/[0.045]
                               text-[#b9a7c5]"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0z"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M5 21a7 7 0 0114 0"
                            />

                        </svg>

                    </span>

                    Profile

                </a>


                {{-- ================================================= --}}
                {{-- LOGOUT - FIXED --}}
                {{-- ================================================= --}}

                <form
                    method="POST"
                    action="{{ route('logout') }}"
                    class="w-full"
                >

                    @csrf

                    <button
                        type="submit"
                        class="group flex w-full items-center gap-3
                               rounded-2xl px-3.5 py-3
                               text-left text-sm font-semibold
                               text-[#b7c5c4]
                               transition-all duration-300
                               hover:bg-[#c85b57]/10
                               hover:text-[#e7aaa6]"
                    >

                        <span
                            class="flex h-9 w-9 items-center
                                   justify-center rounded-xl
                                   bg-white/[0.045]
                                   text-[#b98d91]
                                   transition-all duration-300
                                   group-hover:bg-[#c85b57]/10
                                   group-hover:text-[#e7aaa6]"
                        >

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M13 20H6a2 2 0 01-2-2V6a2 2 0 012-2h7"
                                />

                            </svg>

                        </span>

                        Log Out

                    </button>

                </form>

            </div>

        </nav>

    </aside>


    {{-- ========================================================= --}}
    {{-- MOBILE MENU --}}
    {{-- ========================================================= --}}

    <div
        x-show="open"
        x-transition
        class="relative z-30 border-b border-[#dce2df]
               bg-[#253638] px-4 py-5 shadow-xl lg:hidden"
    >

        <div class="space-y-1.5">


            {{-- Dashboard --}}

            <a
                href="{{ route('admin.dashboard') }}"
                @click="open = false"
                class="flex items-center gap-3 rounded-2xl
                       px-3.5 py-3 text-sm font-semibold
                       {{ request()->routeIs('admin.dashboard')
                            ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                            : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
            >

                <span>⌂</span>

                Dashboard

            </a>


            {{-- Users --}}

            <a
                href="{{ route('admin.users.index') }}"
                @click="open = false"
                class="flex items-center gap-3 rounded-2xl
                       px-3.5 py-3 text-sm font-semibold
                       {{ request()->routeIs('admin.users.*')
                            ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                            : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
            >

                <span>◎</span>

                Users

            </a>


            {{-- Sites --}}

            <a
                href="{{ route('admin.sites.index') }}"
                @click="open = false"
                class="flex items-center gap-3 rounded-2xl
                       px-3.5 py-3 text-sm font-semibold
                       {{ request()->routeIs('admin.sites.*')
                            ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                            : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
            >

                <span>◉</span>

                Sites

            </a>


            {{-- Statistics --}}

            <a
                href="{{ route('admin.statistics.index') }}"
                @click="open = false"
                class="flex items-center gap-3 rounded-2xl
                       px-3.5 py-3 text-sm font-semibold
                       {{ request()->routeIs('admin.statistics.*')
                            ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                            : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
            >

                <span>▥</span>

                Statistics

            </a>


            {{-- Monitoring --}}

            <a
                href="{{ route('admin.monitoring.index') }}"
                @click="open = false"
                class="flex items-center gap-3 rounded-2xl
                       px-3.5 py-3 text-sm font-semibold
                       {{ request()->routeIs('admin.monitoring.*')
                            ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                            : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
            >

                <span>⚡</span>

                Monitoring

            </a>

        </div>


        <div class="mt-5 border-t border-[#405355] pt-4">


            {{-- Profile --}}

            <a
                href="{{ route('admin.profile') }}"
                @click="open = false"
                class="flex items-center gap-3 rounded-2xl
                       px-3.5 py-3 text-sm font-semibold
                       text-[#b7c5c4]
                       hover:bg-white/[0.055]"
            >

                <span>◯</span>

                Profile

            </a>


            {{-- ================================================= --}}
            {{-- MOBILE LOGOUT - FIXED --}}
            {{-- ================================================= --}}

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3
                           rounded-2xl px-3.5 py-3
                           text-left text-sm font-semibold
                           text-[#b7c5c4]
                           hover:bg-[#c85b57]/10
                           hover:text-[#e7aaa6]"
                >

                    <span>↪</span>

                    Log Out

                </button>

            </form>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <main class="min-h-screen lg:ml-72">


        {{-- ===================================================== --}}
        {{-- TOP BAR --}}
        {{-- ===================================================== --}}

        <header
            class="sticky top-0 z-20 h-20
                   border-b border-[#e0e4df]
                   bg-[#f9f6ef]/90
                   backdrop-blur-xl"
        >

            <div
                class="flex h-full items-center
                       justify-between px-6 sm:px-8"
            >

                <div>

                    <p
                        class="text-[10px] font-bold uppercase
                               tracking-[0.18em] text-[#899b97]"
                    >
                        Administration
                    </p>

                    <h1
                        class="mt-1 text-xl font-black
                               tracking-tight text-[#253638]"
                    >
                        SiteMonitor
                    </h1>

                </div>


                {{-- Admin profile --}}

                <div class="flex items-center gap-3">

                    <div class="hidden text-right sm:block">

                        <p class="text-sm font-bold text-[#304c43]">
                            {{ auth()->user()->name }}
                        </p>

                        <p
                            class="mt-0.5 text-[11px]
                                   font-medium text-[#89978f]"
                        >
                            Administrator
                        </p>

                    </div>


                    <div
                        class="flex h-10 w-10 items-center
                               justify-center rounded-xl
                               bg-gradient-to-br
                               from-[#4f8f99]
                               to-[#5d8297]
                               text-sm font-black text-white
                               shadow-[0_6px_16px_rgba(47,143,157,0.20)]"
                    >

                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                    </div>

                </div>

            </div>

        </header>


        {{-- ===================================================== --}}
        {{-- PAGE CONTENT --}}
        {{-- ===================================================== --}}

        <div class="p-5 sm:p-8">

            @yield('content')

        </div>

    </main>

</div>


@livewireScripts

</body>
</html>