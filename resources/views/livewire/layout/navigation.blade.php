<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<div
    x-data="{ open: false }"
    class="relative"
>

    {{-- ========================================================= --}}
    {{-- CUSTOM SIDEBAR ANIMATIONS --}}
    {{-- ========================================================= --}}

    <style>

        @keyframes sidebarFade {
            from {
                opacity: 0;
                transform: translateX(-12px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes sidebarLogo {
            from {
                opacity: 0;
                transform: scale(.92);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes softPulse {
            0%,
            100% {
                opacity: .55;
                transform: scale(1);
            }

            50% {
                opacity: 1;
                transform: scale(1.08);
            }
        }

        .sidebar-animate {
            animation: sidebarFade .55s cubic-bezier(.22, 1, .36, 1) both;
        }

        .sidebar-logo {
            animation: sidebarLogo .55s cubic-bezier(.22, 1, .36, 1) both;
        }

        .sidebar-status-dot {
            animation: softPulse 2.5s ease-in-out infinite;
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
    {{-- DESKTOP SIDEBAR --}}
    {{-- ========================================================= --}}

    <aside
        class="fixed inset-y-0 left-0 z-50 hidden w-72
               overflow-hidden
               border-r border-[#384b4d]
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
            class="sidebar-logo relative z-10
                   flex h-24 shrink-0 items-center
                   border-b border-[#3a4c4e]
                   px-6"
        >

            <a
                href="{{ route('dashboard') }}"
                wire:navigate
                class="group flex items-center gap-3"
            >

                {{-- Logo icon : SAME AS HOME --}}

                <div
                    class="relative flex h-11 w-11
                           items-center justify-center
                           overflow-hidden rounded-2xl
                           bg-[#2F8F9D]
                           text-white
                           shadow-[0_8px_20px_rgba(47,143,157,0.25)]
                           transition-all duration-300
                           group-hover:-translate-y-0.5
                           group-hover:shadow-[0_10px_25px_rgba(47,143,157,0.35)]"
                >

                    <svg
                        class="relative z-10 h-6 w-6"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path
                            d="M13.2 2.5L4.2 13.4c-.5.6-.1 1.5.7 1.5h5.4l-1 6.6c-.1.9 1 1.3 1.5.6l9-10.9c.5-.6.1-1.5-.7-1.5h-5.4l1-6.6c.1-.9-1-1.3-1.5-.6Z"
                        />
                    </svg>

                </div>


                {{-- Logo text --}}

                <div>

                    <h1
                        class="text-[17px] font-black
                               tracking-tight text-[#f5f3ed]"
                    >
                        SiteMonitor
                    </h1>

                    <p
                        class="mt-0.5 text-[10px]
                               font-semibold uppercase
                               tracking-[0.14em]
                               text-[#8fa6a7]"
                    >
                        Website monitoring
                    </p>

                </div>

            </a>

        </div>


        {{-- ===================================================== --}}
        {{-- NAVIGATION --}}
        {{-- ===================================================== --}}

        <nav
            class="relative z-10 flex flex-1
                   flex-col overflow-y-auto
                   px-4 py-7"
        >

            {{-- Main label --}}

            <div class="mb-3 px-3">

                <p
                    class="text-[10px] font-bold uppercase
                           tracking-[0.18em] text-[#71898b]"
                >
                    Main menu
                </p>

            </div>


            <div class="space-y-1.5">


                {{-- ================================================= --}}
                {{-- DASHBOARD --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('dashboard') }}"
                    wire:navigate
                    class="group relative flex items-center
                           gap-3 overflow-hidden rounded-2xl
                           px-3.5 py-3
                           text-sm font-semibold
                           transition-all duration-300

                    {{ request()->routeIs('dashboard')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('dashboard'))

                        <span
                            class="absolute left-0 top-1/2
                                   h-7 w-1 -translate-y-1/2
                                   rounded-r-full bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0
                               items-center justify-center
                               rounded-xl
                               transition-all duration-300

                        {{ request()->routeIs('dashboard')
                            ? 'bg-white/15 text-white'
                            : 'bg-white/[0.045] text-[#8fb5bc] group-hover:bg-[#dcecef]/10 group-hover:text-[#acd2d7]' }}"
                    >

                        <svg
                            class="h-5 w-5 transition-transform
                                   duration-300
                                   group-hover:scale-110"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M3 11.5L12 4l9 7.5"
                            ></path>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M5 10.5V20h14v-9.5"
                            ></path>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M9 20v-5h6v5"
                            ></path>

                        </svg>

                    </span>


                    <span class="relative z-10">
                        Dashboard
                    </span>

                </a>


                {{-- ================================================= --}}
                {{-- WEBSITES --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('sites.index') }}"
                    wire:navigate
                    class="group relative flex items-center
                           gap-3 overflow-hidden rounded-2xl
                           px-3.5 py-3
                           text-sm font-semibold
                           transition-all duration-300

                    {{ request()->routeIs('sites.*')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('sites.*'))

                        <span
                            class="absolute left-0 top-1/2
                                   h-7 w-1 -translate-y-1/2
                                   rounded-r-full bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0
                               items-center justify-center
                               rounded-xl
                               transition-all duration-300

                        {{ request()->routeIs('sites.*')
                            ? 'bg-white/15 text-white'
                            : 'bg-white/[0.045] text-[#8fb5bc] group-hover:bg-[#dcecef]/10 group-hover:text-[#acd2d7]' }}"
                    >

                        <svg
                            class="h-5 w-5 transition-transform
                                   duration-300
                                   group-hover:scale-110
                                   group-hover:rotate-3"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <circle
                                cx="12"
                                cy="12"
                                r="9"
                                stroke-width="1.7"
                            ></circle>

                            <path
                                stroke-linecap="round"
                                stroke-width="1.7"
                                d="M3 12h18"
                            ></path>

                            <path
                                stroke-linecap="round"
                                stroke-width="1.7"
                                d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z"
                            ></path>

                        </svg>

                    </span>


                    <span>
                        Websites
                    </span>

                </a>


                {{-- ================================================= --}}
                {{-- STATISTICS --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('statistics.index') }}"
                    wire:navigate
                    class="group relative flex items-center
                           gap-3 overflow-hidden rounded-2xl
                           px-3.5 py-3
                           text-sm font-semibold
                           transition-all duration-300

                    {{ request()->routeIs('statistics.*')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('statistics.*'))

                        <span
                            class="absolute left-0 top-1/2
                                   h-7 w-1 -translate-y-1/2
                                   rounded-r-full bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0
                               items-center justify-center
                               rounded-xl

                        {{ request()->routeIs('statistics.*')
                            ? 'bg-white/15 text-white'
                            : 'bg-white/[0.045] text-[#b9a7c5] group-hover:bg-[#eee3f1]/10 group-hover:text-[#d0bed8]' }}"
                    >

                        <svg
                            class="h-5 w-5 transition-transform
                                   duration-300
                                   group-hover:scale-110"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M5 20V10"
                            ></path>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M12 20V4"
                            ></path>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M19 20v-7"
                            ></path>

                        </svg>

                    </span>


                    <span>
                        Statistics
                    </span>

                </a>


                {{-- ================================================= --}}
                {{-- MONITORING --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('monitoring.index') }}"
                    wire:navigate
                    class="group relative flex items-center
                           gap-3 overflow-hidden rounded-2xl
                           px-3.5 py-3
                           text-sm font-semibold
                           transition-all duration-300

                    {{ request()->routeIs('monitoring.*')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('monitoring.*'))

                        <span
                            class="absolute left-0 top-1/2
                                   h-7 w-1 -translate-y-1/2
                                   rounded-r-full bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0
                               items-center justify-center
                               rounded-xl

                        {{ request()->routeIs('monitoring.*')
                            ? 'bg-white/15 text-white'
                            : 'bg-white/[0.045] text-[#8fb5bc] group-hover:bg-[#dcecef]/10 group-hover:text-[#acd2d7]' }}"
                    >

                        <svg
                            class="h-5 w-5 transition-transform
                                   duration-300
                                   group-hover:scale-110"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M13 3L4 14h7v7l9-11h-7z"
                            ></path>

                        </svg>

                    </span>


                    <span>
                        Monitoring
                    </span>

                </a>


                {{-- ================================================= --}}
                {{-- RECENT CHECKS --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('checks.index') }}"
                    wire:navigate
                    class="group relative flex items-center
                           gap-3 overflow-hidden rounded-2xl
                           px-3.5 py-3
                           text-sm font-semibold
                           transition-all duration-300

                    {{ request()->routeIs('checks.*')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white shadow-[0_8px_20px_rgba(72,133,145,0.20)]'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055] hover:text-[#f4f3ee]' }}"
                >

                    @if(request()->routeIs('checks.*'))

                        <span
                            class="absolute left-0 top-1/2
                                   h-7 w-1 -translate-y-1/2
                                   rounded-r-full bg-[#cde8e5]"
                        ></span>

                    @endif


                    <span
                        class="flex h-9 w-9 shrink-0
                               items-center justify-center
                               rounded-xl

                        {{ request()->routeIs('checks.*')
                            ? 'bg-white/15 text-white'
                            : 'bg-white/[0.045] text-[#b9a7c5] group-hover:bg-[#eee3f1]/10 group-hover:text-[#d0bed8]' }}"
                    >

                        <svg
                            class="h-5 w-5 transition-transform
                                   duration-300
                                   group-hover:scale-110"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M9 5h6a2 2 0 012 2v1h1a2 2 0 012 2v9a2 2 0 01-2 2H6a2 2 0 01-2-2v-9a2 2 0 012-2h1V7a2 2 0 012-2z"
                            ></path>

                            <path
                                stroke-linecap="round"
                                stroke-width="1.7"
                                d="M8 13h8M8 17h5"
                            ></path>

                        </svg>

                    </span>


                    <span>
                        Recent Checks
                    </span>

                </a>

            </div>


            {{-- ===================================================== --}}
            {{-- SYSTEM STATUS --}}
            {{-- ===================================================== --}}

            <div
                class="sidebar-animate mt-7 rounded-2xl
                       border border-[#405456]
                       bg-gradient-to-br
                       from-[#2b4143]
                       to-[#293b3d]
                       p-4"
                style="animation-delay:.25s"
            >

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-9 w-9 items-center
                               justify-center rounded-xl
                               bg-[#dcefe2]/10"
                    >

                        <span
                            class="sidebar-status-dot
                                   h-2.5 w-2.5 rounded-full
                                   bg-[#73b88a]"
                        ></span>

                    </div>


                    <div>

                        <p
                            class="text-[9px] font-bold uppercase
                                   tracking-[0.16em]
                                   text-[#7f9998]"
                        >
                            System status
                        </p>

                        <p
                            class="mt-0.5 text-xs font-bold
                                   text-[#b9d8c3]"
                        >
                            Operational
                        </p>

                    </div>

                </div>

            </div>


            {{-- ===================================================== --}}
            {{-- BOTTOM --}}
            {{-- ===================================================== --}}

            <div
                class="mt-auto pt-7"
            >

                <div
                    class="mb-3 h-px bg-gradient-to-r
                           from-transparent
                           via-[#405355]
                           to-transparent"
                ></div>


                {{-- Profile --}}

                <a
                    href="{{ route('profile') }}"
                    wire:navigate
                    class="group flex items-center gap-3
                           rounded-2xl px-3.5 py-3
                           text-sm font-semibold
                           text-[#b7c5c4]
                           transition-all duration-300
                           hover:bg-white/[0.055]
                           hover:text-[#f4f3ee]"
                >

                    <span
                        class="flex h-9 w-9 items-center
                               justify-center rounded-xl
                               bg-[#ffffff]/[0.045]
                               text-[#b9a7c5]
                               transition-all duration-300
                               group-hover:bg-[#eee3f1]/10
                               group-hover:text-[#d0bed8]
                               group-hover:scale-105"
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
                            ></path>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M5 21a7 7 0 0114 0"
                            ></path>

                        </svg>

                    </span>


                    <span>
                        Profile
                    </span>

                </a>


                {{-- Logout --}}

                <button
                    wire:click="logout"
                    class="group flex w-full items-center
                           gap-3 rounded-2xl px-3.5 py-3
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
                               group-hover:text-[#e7aaa6]
                               group-hover:scale-105"
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
                            ></path>

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M13 20H6a2 2 0 01-2-2V6a2 2 0 012-2h7"
                            ></path>

                        </svg>

                    </span>


                    <span>
                        Log Out
                    </span>

                </button>

            </div>

        </nav>

    </aside>


    {{-- ========================================================= --}}
    {{-- MOBILE NAVIGATION --}}
    {{-- ========================================================= --}}

    <div class="lg:hidden">

        {{-- Mobile Top Bar --}}

        <div
            class="relative z-50 flex h-[72px]
                   items-center justify-between
                   border-b border-[#d9e1df]
                   bg-[#f9f6ef]
                   px-4 shadow-sm"
        >

            <a
                href="{{ route('dashboard') }}"
                wire:navigate
                class="flex items-center gap-3"
            >

                {{-- SAME LOGO AS HOME --}}

                <div
                    class="flex h-10 w-10 items-center
                           justify-center rounded-xl
                           bg-[#2F8F9D]
                           text-white
                           shadow-[0_6px_16px_rgba(47,143,157,0.22)]"
                >

                    <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >

                        <path
                            d="M13.2 2.5L4.2 13.4c-.5.6-.1 1.5.7 1.5h5.4l-1 6.6c-.1.9 1 1.3 1.5.6l9-10.9c.5-.6.1-1.5-.7-1.5h-5.4l1-6.6c.1-.9-1-1.3-1.5-.6Z"
                        />

                    </svg>

                </div>


                <div>

                    <p
                        class="text-[16px] font-black
                               tracking-tight text-[#2c4245]"
                    >
                        SiteMonitor
                    </p>

                    <p
                        class="text-[9px] font-bold uppercase
                               tracking-[0.14em]
                               text-[#7d9496]"
                    >
                        Monitoring
                    </p>

                </div>

            </a>


            <button
                @click="open = !open"
                class="flex h-10 w-10 items-center
                       justify-center rounded-xl
                       border border-[#d9e1df]
                       bg-white text-[#607b7e]
                       shadow-sm transition-all duration-300
                       hover:bg-[#eef6f7]"
            >

                <svg
                    x-show="!open"
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
                        d="M4 6h16M4 12h16M4 18h16"
                    ></path>

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
                    ></path>

                </svg>

            </button>

        </div>


        {{-- Mobile Menu --}}

        <div
            x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-3"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-3"
            class="relative z-40
                   border-b border-[#dce2df]
                   bg-[#253638]
                   px-4 py-5 shadow-xl"
        >

            <div class="space-y-1.5">

                {{-- Dashboard --}}

                <a
                    href="{{ route('dashboard') }}"
                    wire:navigate
                    @click="open = false"
                    class="flex items-center gap-3 rounded-2xl
                           px-3.5 py-3 text-sm font-semibold
                           transition

                    {{ request()->routeIs('dashboard')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
                >

                    <span class="text-lg">⌂</span>
                    Dashboard

                </a>


                {{-- Websites --}}

                <a
                    href="{{ route('sites.index') }}"
                    wire:navigate
                    @click="open = false"
                    class="flex items-center gap-3 rounded-2xl
                           px-3.5 py-3 text-sm font-semibold
                           transition

                    {{ request()->routeIs('sites.*')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
                >

                    <span class="text-lg">◎</span>
                    Websites

                </a>


                {{-- Statistics --}}

                <a
                    href="{{ route('statistics.index') }}"
                    wire:navigate
                    @click="open = false"
                    class="flex items-center gap-3 rounded-2xl
                           px-3.5 py-3 text-sm font-semibold
                           transition

                    {{ request()->routeIs('statistics.*')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
                >

                    <span class="text-lg">▥</span>
                    Statistics

                </a>


                {{-- Monitoring --}}

                <a
                    href="{{ route('monitoring.index') }}"
                    wire:navigate
                    @click="open = false"
                    class="flex items-center gap-3 rounded-2xl
                           px-3.5 py-3 text-sm font-semibold
                           transition

                    {{ request()->routeIs('monitoring.*')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
                >

                    <span class="text-lg">◉</span>
                    Monitoring

                </a>


                {{-- Recent Checks --}}

                <a
                    href="{{ route('checks.index') }}"
                    wire:navigate
                    @click="open = false"
                    class="flex items-center gap-3 rounded-2xl
                           px-3.5 py-3 text-sm font-semibold
                           transition

                    {{ request()->routeIs('checks.*')
                        ? 'bg-gradient-to-r from-[#4f8f99] to-[#5d8297] text-white'
                        : 'text-[#b7c5c4] hover:bg-white/[0.055]' }}"
                >

                    <span class="text-lg">▤</span>
                    Recent Checks

                </a>

            </div>


            {{-- Mobile bottom --}}

            <div
                class="mt-5 border-t border-[#405355]
                       pt-4"
            >

                {{-- Profile --}}

                <a
                    href="{{ route('profile') }}"
                    wire:navigate
                    @click="open = false"
                    class="flex items-center gap-3 rounded-2xl
                           px-3.5 py-3 text-sm font-semibold
                           text-[#b7c5c4]
                           transition hover:bg-white/[0.055]"
                >

                    <span class="text-lg">◯</span>
                    Profile

                </a>


                {{-- Logout --}}

                <button
                    wire:click="logout"
                    class="flex w-full items-center gap-3
                           rounded-2xl px-3.5 py-3
                           text-left text-sm font-semibold
                           text-[#b7c5c4]
                           transition
                           hover:bg-[#c85b57]/10
                           hover:text-[#e7aaa6]"
                >

                    <span class="text-lg">↪</span>
                    Log Out

                </button>

            </div>

        </div>

    </div>

</div>
