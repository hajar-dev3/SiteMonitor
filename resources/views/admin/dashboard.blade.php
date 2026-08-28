@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}

    <section class="relative overflow-hidden rounded-3xl border border-[#dce5df]
                    bg-white shadow-[0_10px_35px_rgba(36,60,57,0.06)]">

        <div class="pointer-events-none absolute -right-20 -top-24 h-64 w-64
                    rounded-full bg-[#2F8F9D]/[0.07] blur-2xl"></div>

        <div class="pointer-events-none absolute -bottom-24 -left-16 h-56 w-56
                    rounded-full bg-[#806D89]/[0.06] blur-2xl"></div>

        <div class="relative flex flex-col gap-6 p-7 sm:p-8 lg:flex-row
                    lg:items-center lg:justify-between">

            <div>

                <div class="mb-3 flex items-center gap-2">

                    <span class="flex h-7 w-7 items-center justify-center
                                 rounded-lg bg-[#126B70]/10">

                        <svg class="h-4 w-4 text-[#126B70]"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M3 12l2-2 3 3 5-6 3 3 3-2"
                            />

                        </svg>

                    </span>

                    <span class="text-[10px] font-bold uppercase
                                 tracking-[0.2em] text-[#7c918d]">

                        Administration

                    </span>

                </div>

                <h1 class="text-3xl font-black tracking-tight text-[#243C39]">
                    Admin Dashboard
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-[#71817d]">
                    Overview of the SiteMonitor platform, its users,
                    monitored sites, and overall monitoring status.
                </p>

            </div>

            {{-- System status --}}

            <div class="flex items-center gap-4 rounded-2xl border
                        border-[#dce8e2] bg-[#f8fbf9] px-5 py-4">

                <div class="relative flex h-11 w-11 items-center
                            justify-center rounded-xl bg-[#5F8F67]/10">

                    <span class="absolute h-3 w-3 animate-ping
                                 rounded-full bg-[#5F8F67]/40"></span>

                    <span class="relative h-2.5 w-2.5 rounded-full
                                 bg-[#5F8F67]"></span>

                </div>

                <div>

                    <p class="text-[10px] font-bold uppercase
                              tracking-[0.15em] text-[#8a9995]">
                        System
                    </p>

                    <p class="mt-1 text-sm font-bold text-[#243C39]">
                        Monitoring Active
                    </p>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- KPI CARDS --}}
    {{-- ========================================================= --}}

    <section>

        <div class="mb-4">

            <p class="text-[10px] font-bold uppercase
                      tracking-[0.18em] text-[#8a9995]">
                Platform Overview
            </p>

            <h2 class="mt-1 text-lg font-extrabold text-[#243C39]">
                Overview
            </h2>

        </div>


        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


            {{-- USERS --}}

            <div class="group relative overflow-hidden rounded-2xl border
                        border-[#dce5df] bg-white p-6
                        shadow-[0_8px_25px_rgba(36,60,57,0.05)]
                        transition-all duration-300
                        hover:-translate-y-1
                        hover:shadow-[0_15px_35px_rgba(36,60,57,0.09)]">

                <div class="absolute -right-8 -top-8 h-24 w-24
                            rounded-full bg-[#2F8F9D]/[0.05]"></div>

                <div class="relative flex items-start justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase
                                  tracking-wide text-[#899a95]">
                            Users
                        </p>

                        <p class="mt-3 text-3xl font-black
                                  tracking-tight text-[#243C39]">
                            {{ $totalUsers }}
                        </p>

                        <p class="mt-1 text-xs text-[#91a09c]">
                            Registered accounts
                        </p>

                    </div>

                    <div class="flex h-12 w-12 items-center justify-center
                                rounded-2xl bg-[#2F8F9D]/10
                                text-[#2F8F9D]
                                transition-transform duration-300
                                group-hover:scale-110">

                        <svg class="h-6 w-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

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

                    </div>

                </div>

                <div class="mt-5 h-1 overflow-hidden rounded-full
                            bg-[#2F8F9D]/10">

                    <div class="h-full w-3/4 rounded-full bg-[#2F8F9D]
                                transition-all duration-700
                                group-hover:w-full">
                    </div>

                </div>

            </div>


            {{-- SITES --}}

            <div class="group relative overflow-hidden rounded-2xl border
                        border-[#dce5df] bg-white p-6
                        shadow-[0_8px_25px_rgba(36,60,57,0.05)]
                        transition-all duration-300
                        hover:-translate-y-1
                        hover:shadow-[0_15px_35px_rgba(36,60,57,0.09)]">

                <div class="absolute -right-8 -top-8 h-24 w-24
                            rounded-full bg-[#126B70]/[0.05]"></div>

                <div class="relative flex items-start justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase
                                  tracking-wide text-[#899a95]">
                            Monitored Sites
                        </p>

                        <p class="mt-3 text-3xl font-black
                                  tracking-tight text-[#243C39]">
                            {{ $totalSites }}
                        </p>

                        <p class="mt-1 text-xs text-[#91a09c]">
                            Registered sites
                        </p>

                    </div>

                    <div class="flex h-12 w-12 items-center justify-center
                                rounded-2xl bg-[#126B70]/10
                                text-[#126B70]
                                transition-transform duration-300
                                group-hover:scale-110">

                        <svg class="h-6 w-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

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

                    </div>

                </div>

                <div class="mt-5 h-1 overflow-hidden rounded-full
                            bg-[#126B70]/10">

                    <div class="h-full w-4/5 rounded-full bg-[#126B70]
                                transition-all duration-700
                                group-hover:w-full">
                    </div>

                </div>

            </div>


            {{-- ONLINE --}}

            <div class="group relative overflow-hidden rounded-2xl border
                        border-[#dce8df] bg-white p-6
                        shadow-[0_8px_25px_rgba(36,60,57,0.05)]
                        transition-all duration-300
                        hover:-translate-y-1
                        hover:shadow-[0_15px_35px_rgba(36,60,57,0.09)]">

                <div class="absolute -right-8 -top-8 h-24 w-24
                            rounded-full bg-[#5F8F67]/[0.06]"></div>

                <div class="relative flex items-start justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase
                                  tracking-wide text-[#899a95]">
                            Online Sites
                        </p>

                        <p class="mt-3 text-3xl font-black
                                  tracking-tight text-[#243C39]">
                            {{ $onlineSites }}
                        </p>

                        <div class="mt-2 flex items-center gap-2">

                            <span class="h-2 w-2 rounded-full
                                         bg-[#5F8F67]"></span>

                            <span class="text-xs font-semibold
                                         text-[#66806d]">
                                Operational
                            </span>

                        </div>

                    </div>

                    <div class="flex h-12 w-12 items-center justify-center
                                rounded-2xl bg-[#5F8F67]/10
                                text-[#5F8F67]
                                transition-transform duration-300
                                group-hover:scale-110">

                        <svg class="h-6 w-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M5 13l4 4L19 7"
                            />

                        </svg>

                    </div>

                </div>

                <div class="mt-5 h-1 overflow-hidden rounded-full
                            bg-[#5F8F67]/10">

                    <div
                        class="h-full rounded-full bg-[#5F8F67]
                               transition-all duration-700"
                        style="width: {{ $totalSites > 0 ? ($onlineSites / $totalSites) * 100 : 0 }}%"
                    ></div>

                </div>

            </div>


            {{-- OFFLINE --}}

            <div class="group relative overflow-hidden rounded-2xl border
                        border-[#eadbd9] bg-white p-6
                        shadow-[0_8px_25px_rgba(36,60,57,0.05)]
                        transition-all duration-300
                        hover:-translate-y-1
                        hover:shadow-[0_15px_35px_rgba(36,60,57,0.09)]">

                <div class="absolute -right-8 -top-8 h-24 w-24
                            rounded-full bg-[#C44743]/[0.06]"></div>

                <div class="relative flex items-start justify-between">

                    <div>

                        <p class="text-xs font-bold uppercase
                                  tracking-wide text-[#899a95]">
                            Offline Sites
                        </p>

                        <p class="mt-3 text-3xl font-black
                                  tracking-tight text-[#243C39]">
                            {{ $downSites }}
                        </p>

                        <div class="mt-2 flex items-center gap-2">

                            <span class="h-2 w-2 rounded-full
                                         bg-[#C44743]"></span>

                            <span class="text-xs font-semibold
                                         text-[#8d716e]">
                                Require attention
                            </span>

                        </div>

                    </div>

                    <div class="flex h-12 w-12 items-center justify-center
                                rounded-2xl bg-[#C44743]/10
                                text-[#C44743]
                                transition-transform duration-300
                                group-hover:scale-110">

                        <svg class="h-6 w-6"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M6 6l12 12M18 6L6 18"
                            />

                        </svg>

                    </div>

                </div>

                <div class="mt-5 h-1 overflow-hidden rounded-full
                            bg-[#C44743]/10">

                    <div
                        class="h-full rounded-full bg-[#C44743]
                               transition-all duration-700"
                        style="width: {{ $totalSites > 0 ? ($downSites / $totalSites) * 100 : 0 }}%"
                    ></div>

                </div>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- MONITORING OVERVIEW + QUICK ACTIONS --}}
    {{-- ========================================================= --}}

    <section class="grid grid-cols-1 gap-6 xl:grid-cols-3">


        {{-- MONITORING OVERVIEW --}}

        <div class="xl:col-span-2 rounded-3xl border border-[#dce5df]
                    bg-white p-7
                    shadow-[0_8px_30px_rgba(36,60,57,0.05)]">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center
                        sm:justify-between">

                <div>

                    <p class="text-[10px] font-bold uppercase
                              tracking-[0.18em] text-[#899a95]">
                        Monitoring
                    </p>

                    <h2 class="mt-1 text-xl font-black text-[#243C39]">
                        Overall Status
                    </h2>

                    <p class="mt-1 text-sm text-[#82918d]">
                        Real-time overview of the monitored infrastructure.
                    </p>

                </div>

                <div class="inline-flex items-center gap-2 rounded-xl
                            border border-[#dce8df]
                            bg-[#f7fbf8] px-3 py-2">

                    <span class="h-2 w-2 rounded-full bg-[#5F8F67]"></span>

                    <span class="text-xs font-bold text-[#5F8F67]">
                        Monitoring Active
                    </span>

                </div>

            </div>


            {{-- STATUS GRID --}}

            <div class="mt-7 grid grid-cols-1 gap-4 sm:grid-cols-3">


                {{-- TOTAL --}}

                <div class="rounded-2xl border border-[#e3ebe7]
                            bg-[#fafcfb] p-5">

                    <div class="flex items-center justify-between">

                        <p class="text-xs font-bold text-[#7f918b]">
                            Total Sites
                        </p>

                        <span class="flex h-8 w-8 items-center
                                     justify-center rounded-lg
                                     bg-[#126B70]/10 text-[#126B70]">

                            <svg class="h-4 w-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="8"
                                    stroke-width="1.7"
                                />

                            </svg>

                        </span>

                    </div>

                    <p class="mt-4 text-3xl font-black text-[#243C39]">
                        {{ $totalSites }}
                    </p>

                    <p class="mt-1 text-xs text-[#9aa7a3]">
                        Registered sites
                    </p>

                </div>


                {{-- ONLINE --}}

                <div class="rounded-2xl border border-[#dfeae1]
                            bg-[#f8fbf8] p-5">

                    <div class="flex items-center justify-between">

                        <p class="text-xs font-bold text-[#6d8674]">
                            Online
                        </p>

                        <span class="flex h-8 w-8 items-center
                                     justify-center rounded-lg
                                     bg-[#5F8F67]/10 text-[#5F8F67]">

                            <svg class="h-4 w-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 12l4 4L19 6"
                                />

                            </svg>

                        </span>

                    </div>

                    <p class="mt-4 text-3xl font-black text-[#5F8F67]">
                        {{ $onlineSites }}
                    </p>

                    <p class="mt-1 text-xs text-[#8ca097]">
                        Operating normally
                    </p>

                </div>


                {{-- OFFLINE --}}

                <div class="rounded-2xl border border-[#efdfdc]
                            bg-[#fdf9f8] p-5">

                    <div class="flex items-center justify-between">

                        <p class="text-xs font-bold text-[#927875]">
                            Offline
                        </p>

                        <span class="flex h-8 w-8 items-center
                                     justify-center rounded-lg
                                     bg-[#C44743]/10 text-[#C44743]">

                            <svg class="h-4 w-4"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 6l12 12M18 6L6 18"
                                />

                            </svg>

                        </span>

                    </div>

                    <p class="mt-4 text-3xl font-black text-[#C44743]">
                        {{ $downSites }}
                    </p>

                    <p class="mt-1 text-xs text-[#a18c88]">
                        Needs attention
                    </p>

                </div>

            </div>


            {{-- MONITORING BAR --}}

            <div class="mt-6 rounded-2xl border border-[#e1e9e5]
                        bg-[#fafcfb] p-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-bold text-[#667a74]">
                            Monitoring Status
                        </p>

                        <p class="mt-1 text-[11px] text-[#9aa7a3]">
                            Real-time site monitoring
                        </p>

                    </div>

                    <span class="rounded-full bg-[#5F8F67]/10
                                 px-3 py-1.5 text-[11px] font-bold
                                 text-[#5F8F67]">
                        Active
                    </span>

                </div>

                <div class="mt-4 h-2 overflow-hidden rounded-full
                            bg-[#e8eeeb]">

                    <div class="h-full w-full rounded-full
                                bg-[#5F8F67]"></div>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- QUICK ACCESS --}}
        {{-- ===================================================== --}}

        <div class="rounded-3xl border border-[#dce5df]
                    bg-white p-7
                    shadow-[0_8px_30px_rgba(36,60,57,0.05)]">

            <p class="text-[10px] font-bold uppercase
                      tracking-[0.18em] text-[#899a95]">
                Administration
            </p>

            <h2 class="mt-1 text-xl font-black text-[#243C39]">
                Quick Access
            </h2>

            <p class="mt-1 text-sm text-[#82918d]">
                Quickly access the main administration sections.
            </p>


            <div class="mt-6 space-y-3">


                {{-- USERS --}}

                <a
                    href="{{ route('admin.users.index') }}"
                    class="group flex items-center justify-between
                           rounded-2xl border border-[#e2ebe7]
                           bg-[#fafcfb] px-4 py-4
                           transition-all duration-300
                           hover:-translate-y-0.5
                           hover:border-[#2F8F9D]/30
                           hover:bg-[#f5faf9]
                           hover:shadow-sm"
                >

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center
                                    justify-center rounded-xl
                                    bg-[#2F8F9D]/10 text-[#2F8F9D]">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

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

                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-bold text-[#304c47]">
                                Users
                            </p>

                            <p class="text-[11px] text-[#98a6a2]">
                                Manage user accounts
                            </p>

                        </div>

                    </div>

                    <span class="text-[#9aa8a4] transition
                                 group-hover:translate-x-1
                                 group-hover:text-[#2F8F9D]">
                        →
                    </span>

                </a>


                {{-- SITES --}}

                <a
                    href="{{ route('admin.sites.index') }}"
                    class="group flex items-center justify-between
                           rounded-2xl border border-[#e2ebe7]
                           bg-[#fafcfb] px-4 py-4
                           transition-all duration-300
                           hover:-translate-y-0.5
                           hover:border-[#126B70]/30
                           hover:bg-[#f5faf9]
                           hover:shadow-sm"
                >

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center
                                    justify-center rounded-xl
                                    bg-[#126B70]/10 text-[#126B70]">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

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

                        </div>

                        <div>

                            <p class="text-sm font-bold text-[#304c47]">
                                Sites
                            </p>

                            <p class="text-[11px] text-[#98a6a2]">
                                Manage monitored sites
                            </p>

                        </div>

                    </div>

                    <span class="text-[#9aa8a4] transition
                                 group-hover:translate-x-1
                                 group-hover:text-[#126B70]">
                        →
                    </span>

                </a>


                {{-- STATISTICS --}}

                <a
                    href="{{ route('admin.statistics.index') }}"
                    class="group flex items-center justify-between
                           rounded-2xl border border-[#e2ebe7]
                           bg-[#fafcfb] px-4 py-4
                           transition-all duration-300
                           hover:-translate-y-0.5
                           hover:border-[#806D89]/30
                           hover:bg-[#faf8fb]
                           hover:shadow-sm"
                >

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center
                                    justify-center rounded-xl
                                    bg-[#806D89]/10 text-[#806D89]">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M5 20V10M12 20V4M19 20v-7"
                                />

                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-bold text-[#304c47]">
                                Statistics
                            </p>

                            <p class="text-[11px] text-[#98a6a2]">
                                View monitoring statistics
                            </p>

                        </div>

                    </div>

                    <span class="text-[#9aa8a4] transition
                                 group-hover:translate-x-1
                                 group-hover:text-[#806D89]">
                        →
                    </span>

                </a>


                {{-- ================================================= --}}
                {{-- ADMIN MONITORING --}}
                {{-- ================================================= --}}

                <a
                    href="{{ route('admin.monitoring.index') }}"
                    class="group flex items-center justify-between
                           rounded-2xl border border-[#e2ebe7]
                           bg-[#fafcfb] px-4 py-4
                           transition-all duration-300
                           hover:-translate-y-0.5
                           hover:border-[#5F8F67]/30
                           hover:bg-[#f7fbf8]
                           hover:shadow-sm"
                >

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center
                                    justify-center rounded-xl
                                    bg-[#5F8F67]/10 text-[#5F8F67]">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="1.7"
                                    d="M13 3L4 14h7v7l9-11h-7z"
                                />

                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-bold text-[#304c47]">
                                Monitoring
                            </p>

                            <p class="text-[11px] text-[#98a6a2]">
                                View admin monitoring status
                            </p>

                        </div>

                    </div>

                    <span class="text-[#9aa8a4] transition
                                 group-hover:translate-x-1
                                 group-hover:text-[#5F8F67]">
                        →
                    </span>

                </a>

            </div>

        </div>

    </section>


    {{-- ========================================================= --}}
    {{-- ADMIN WELCOME --}}
    {{-- ========================================================= --}}

    <section class="relative overflow-hidden rounded-3xl border
                    border-[#d8e4df]
                    bg-gradient-to-br from-[#f2f8f7]
                    via-white to-[#f7f3f8]
                    shadow-[0_8px_30px_rgba(36,60,57,0.05)]">

        <div class="pointer-events-none absolute -right-16 -top-16
                    h-44 w-44 rounded-full
                    bg-[#2F8F9D]/[0.06] blur-2xl"></div>

        <div class="pointer-events-none absolute -bottom-20 -left-16
                    h-44 w-44 rounded-full
                    bg-[#806D89]/[0.06] blur-2xl"></div>

        <div class="relative flex flex-col gap-6 p-7 sm:p-8 lg:flex-row
                    lg:items-center lg:justify-between">

            <div>

                <div class="flex items-center gap-3">

                    <div class="flex h-10 w-10 items-center justify-center
                                rounded-xl bg-[#126B70]/10 text-[#126B70]">

                        <svg class="h-5 w-5"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M13 3L4 14h7v7l9-11h-7z"
                            />

                        </svg>

                    </div>

                    <span class="text-xs font-black uppercase
                                 tracking-[0.15em] text-[#126B70]">
                        SiteMonitor
                    </span>

                </div>

                <h2 class="mt-5 text-xl font-black text-[#243C39]">
                    Welcome to the Admin Dashboard
                </h2>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-[#71817d]">
                    From this dashboard, you can manage users,
                    supervise monitored sites, and track the overall
                    activity of your monitoring platform.
                </p>

            </div>


            {{-- Platform status --}}

            <div class="shrink-0 rounded-2xl border border-[#d9e5df]
                        bg-white/80 px-6 py-5 shadow-sm">

                <p class="text-[10px] font-bold uppercase
                          tracking-[0.16em] text-[#899a95]">
                    Platform Status
                </p>

                <div class="mt-3 flex items-center gap-2">

                    <span class="relative flex h-2.5 w-2.5">

                        <span class="absolute h-full w-full animate-ping
                                     rounded-full bg-[#5F8F67]/40"></span>

                        <span class="relative h-2.5 w-2.5 rounded-full
                                     bg-[#5F8F67]"></span>

                    </span>

                    <span class="text-sm font-bold text-[#5F8F67]">
                        Operational
                    </span>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection