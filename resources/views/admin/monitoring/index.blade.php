@extends('layouts.admin')

@section('content')

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

    @keyframes pulseSoft {
        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: .5;
        }
    }

    .animate-fade-up {
        animation: fadeUp .55s ease-out both;
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

    .monitor-row {
        transition: background-color .2s ease, transform .2s ease;
    }

    .monitor-row:hover {
        background-color: #f8fcfc;
    }

    .stat-card {
        transition: transform .25s ease, box-shadow .25s ease;
    }

    .stat-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 16px 32px rgba(30, 64, 80, .08);
    }

    .status-pulse {
        animation: pulseSoft 2s ease-in-out infinite;
    }

    ::-webkit-scrollbar {
        width: 7px;
        height: 7px;
    }

    ::-webkit-scrollbar-track {
        background: #f3f8f7;
    }

    ::-webkit-scrollbar-thumb {
        background: #c8dddd;
        border-radius: 999px;
    }
</style>


{{-- ========================================================= --}}
{{-- MAIN MONITORING CONTENT --}}
{{-- ========================================================= --}}

<main class="relative min-h-screen overflow-hidden">

    {{-- Background decoration --}}
    <div
        class="pointer-events-none absolute -right-32 top-0 h-80 w-80 rounded-full bg-[#dff4f6] opacity-40 blur-3xl">
    </div>

    <div
        class="pointer-events-none absolute -left-32 top-[500px] h-72 w-72 rounded-full bg-[#eaf3f6] opacity-50 blur-3xl">
    </div>


    <div class="relative mx-auto max-w-[1600px]">


        {{-- ================================================= --}}
        {{-- HEADER --}}
        {{-- ================================================= --}}

        <section class="animate-fade-up mb-8">

            <div
                class="relative overflow-hidden rounded-[28px] border border-[#d8e8e6]
                bg-gradient-to-r from-[#f5fbfa] via-[#eef8f7] to-[#f4f9fc]
                px-6 py-7 shadow-sm sm:px-8">

                <div
                    class="pointer-events-none absolute -right-16 -top-20 h-52 w-52 rounded-full
                    bg-[#dff4f6] opacity-70">
                </div>

                <div
                    class="pointer-events-none absolute -bottom-24 right-36 h-48 w-48 rounded-full
                    bg-[#e7f2f5] opacity-70">
                </div>


                <div
                    class="relative flex flex-col gap-6 lg:flex-row lg:items-center lg:justify-between">

                    <div>

                        {{-- Badge --}}
                        <div
                            class="mb-3 inline-flex items-center gap-2 rounded-full
                            border border-[#cce7e3] bg-white/70 px-3 py-1.5
                            text-xs font-semibold text-[#378b87] shadow-sm">

                            <span
                                class="status-pulse h-2 w-2 rounded-full bg-[#55aaa5]">
                            </span>

                            Admin Monitoring

                        </div>


                        <h1
                            class="text-3xl font-bold tracking-tight text-[#183b45] sm:text-4xl">
                            Monitoring
                        </h1>


                        <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                            Monitor all websites, users, and verification activity
                            across the entire platform.
                        </p>

                    </div>


                    {{-- Dashboard Button --}}
                    <a
                        href="{{ route('admin.dashboard') }}"
                        wire:navigate
                        class="group inline-flex items-center justify-center gap-2 rounded-xl
                        bg-[#5aa8a3] px-5 py-3 text-sm font-semibold text-white
                        shadow-lg shadow-[#5aa8a3]/20 transition duration-300
                        hover:-translate-y-1 hover:bg-[#4d9994] hover:shadow-xl">

                        <svg
                            class="h-4 w-4"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />

                        </svg>

                        Admin Dashboard

                    </a>

                </div>

            </div>

        </section>



        {{-- ================================================= --}}
        {{-- OVERVIEW STATISTICS --}}
        {{-- ================================================= --}}

        <section
            class="relative grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


            {{-- TOTAL WEBSITES --}}
            <div
                class="stat-card animate-fade-up rounded-2xl border
                border-[#d4eaed] bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Websites
                        </p>

                        <p class="mt-2 text-3xl font-bold tracking-tight text-[#247f87]">
                            {{ $totalSites ?? 0 }}
                        </p>

                    </div>


                    <div
                        class="flex h-11 w-11 items-center justify-center
                        rounded-xl bg-[#dff4f6] text-[#247f87]">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 7h18M5 7v12h14V7M8 7V4h8v3" />

                        </svg>

                    </div>

                </div>

                <div class="mt-5 border-t border-slate-100 pt-3">

                    <p class="text-xs text-slate-400">
                        Websites registered on the platform
                    </p>

                </div>

            </div>



            {{-- ACTIVE WEBSITES --}}
            <div
                class="stat-card animate-fade-up delay-100 rounded-2xl border
                border-[#d8ebdc] bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Active Websites
                        </p>

                        <p class="mt-2 text-3xl font-bold tracking-tight text-[#43845a]">
                            {{ $activeSites ?? 0 }}
                        </p>

                    </div>


                    <div
                        class="flex h-11 w-11 items-center justify-center
                        rounded-xl bg-[#e3f3e5]">

                        <span
                            class="status-pulse h-3 w-3 rounded-full bg-[#5ca66f]">
                        </span>

                    </div>

                </div>


                <div class="mt-5 border-t border-slate-100 pt-3">

                    <p class="text-xs text-slate-400">
                        Currently enabled monitoring
                    </p>

                </div>

            </div>



            {{-- INACTIVE WEBSITES --}}
            <div
                class="stat-card animate-fade-up delay-200 rounded-2xl border
                border-[#f1d9d7] bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Inactive Websites
                        </p>

                        <p class="mt-2 text-3xl font-bold tracking-tight text-[#c74848]">
                            {{ $inactiveSites ?? 0 }}
                        </p>

                    </div>


                    <div
                        class="flex h-11 w-11 items-center justify-center
                        rounded-xl bg-[#fde7e5] text-[#c74848]">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M18 6L6 18M6 6l12 12" />

                        </svg>

                    </div>

                </div>


                <div class="mt-5 border-t border-slate-100 pt-3">

                    <p class="text-xs text-slate-400">
                        Monitoring currently disabled
                    </p>

                </div>

            </div>



            {{-- TOTAL CHECKS --}}
            <div
                class="stat-card animate-fade-up delay-300 rounded-2xl border
                border-[#d9e5ed] bg-white p-5 shadow-sm">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Checks
                        </p>

                        <p class="mt-2 text-3xl font-bold tracking-tight text-[#4f7896]">
                            {{ $totalVerifications ?? 0 }}
                        </p>

                    </div>


                    <div
                        class="flex h-11 w-11 items-center justify-center
                        rounded-xl bg-[#e3eef6] text-[#4f7896]">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a3 3 0 016 0" />

                        </svg>

                    </div>

                </div>


                <div class="mt-5 border-t border-slate-100 pt-3">

                    <p class="text-xs text-slate-400">
                        All verification checks performed
                    </p>

                </div>

            </div>

        </section>



        {{-- ================================================= --}}
        {{-- VERIFICATION SUMMARY --}}
        {{-- ================================================= --}}

        <section class="animate-fade-up delay-200 mt-6">

            <div
                class="rounded-2xl border border-[#dceceb] bg-white
                p-5 shadow-sm">

                <div
                    class="flex flex-col gap-5 sm:flex-row sm:items-center
                    sm:justify-between">

                    <div>

                        <h2 class="text-lg font-bold text-[#183b45]">
                            Verification Summary
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Overall monitoring results across the platform.
                        </p>

                    </div>


                    <div class="flex flex-wrap gap-3">

                        {{-- UP --}}
                        <div
                            class="inline-flex items-center gap-2 rounded-xl
                            bg-[#e3f3e5] px-4 py-2.5">

                            <span
                                class="h-2.5 w-2.5 rounded-full bg-[#5ca66f]">
                            </span>

                            <span class="text-sm font-semibold text-[#43845a]">
                                UP
                            </span>

                            <span class="text-sm font-bold text-[#43845a]">
                                {{ $successfulVerifications ?? 0 }}
                            </span>

                        </div>


                        {{-- DOWN --}}
                        <div
                            class="inline-flex items-center gap-2 rounded-xl
                            bg-[#fde7e5] px-4 py-2.5">

                            <span
                                class="h-2.5 w-2.5 rounded-full bg-[#d75b5b]">
                            </span>

                            <span class="text-sm font-semibold text-[#c74848]">
                                DOWN
                            </span>

                            <span class="text-sm font-bold text-[#c74848]">
                                {{ $failedVerifications ?? 0 }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </section>



        {{-- ================================================= --}}
        {{-- RECENT MONITORING CHECKS --}}
        {{-- ================================================= --}}

        <section
            class="animate-fade-up delay-300 mt-8 overflow-hidden
            rounded-2xl border border-[#dceceb] bg-white shadow-sm">


            {{-- Section Header --}}
            <div
                class="border-b border-[#e6f0ef]
                bg-gradient-to-r from-[#f7fcfb] to-[#f4f9fb]
                px-6 py-5">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center
                        rounded-xl bg-[#dff4f6] text-[#247f87]">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 8v4l3 2m6-2a9 9 0 11-18 0 9 9 0 0118 0z" />

                        </svg>

                    </div>


                    <div>

                        <h2 class="text-lg font-bold text-[#183b45]">
                            Recent Monitoring Checks
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Latest verification activity across all websites.
                        </p>

                    </div>

                </div>

            </div>



            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-[#f8fbfb]">

                        <tr>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Website
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Owner
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Response
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Checked At
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-[#edf3f2]">

                        @forelse($recentVerifications ?? [] as $verification)

                            @php
                                $site = $verification->site;
                                $owner = $site?->user;
                                $status = strtoupper($verification->status ?? '');
                            @endphp


                            <tr class="monitor-row">


                                {{-- WEBSITE --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-10 w-10 shrink-0 items-center
                                            justify-center rounded-xl bg-[#dff4f6]
                                            font-bold text-[#247f87]">

                                            {{ strtoupper(substr($site?->name ?? 'S', 0, 1)) }}

                                        </div>


                                        <div>

                                            <p
                                                class="text-sm font-bold text-[#183b45]">
                                                {{ $site?->name ?? 'Unknown Site' }}
                                            </p>

                                            <p
                                                class="mt-1 max-w-[260px] truncate
                                                text-xs text-slate-400">
                                                {{ $site?->url ?? '-' }}
                                            </p>

                                        </div>

                                    </div>

                                </td>



                                {{-- OWNER --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    <p
                                        class="text-sm font-semibold text-slate-700">
                                        {{ $owner?->name ?? 'Unknown User' }}
                                    </p>

                                    <p class="mt-1 text-xs text-slate-400">
                                        {{ $owner?->email ?? '-' }}
                                    </p>

                                </td>



                                {{-- STATUS --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    @if($status === 'UP')

                                        <span
                                            class="inline-flex items-center gap-2
                                            rounded-lg bg-[#e3f3e5]
                                            px-3 py-1.5 text-xs font-bold
                                            text-[#43845a]">

                                            <span
                                                class="h-2 w-2 rounded-full
                                                bg-[#5ca66f]">
                                            </span>

                                            UP

                                        </span>

                                    @elseif($status === 'DOWN')

                                        <span
                                            class="inline-flex items-center gap-2
                                            rounded-lg bg-[#fde7e5]
                                            px-3 py-1.5 text-xs font-bold
                                            text-[#c74848]">

                                            <span
                                                class="h-2 w-2 rounded-full
                                                bg-[#d75b5b]">
                                            </span>

                                            DOWN

                                        </span>

                                    @else

                                        <span
                                            class="inline-flex items-center gap-2
                                            rounded-lg bg-slate-100
                                            px-3 py-1.5 text-xs font-bold
                                            text-slate-600">

                                            <span
                                                class="h-2 w-2 rounded-full
                                                bg-slate-400">
                                            </span>

                                            UNKNOWN

                                        </span>

                                    @endif

                                </td>



                                {{-- RESPONSE TIME --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    @if($verification->response_time !== null)

                                        <span
                                            class="text-sm font-bold text-[#4f7896]">

                                            {{ number_format($verification->response_time, 0) }}
                                            ms

                                        </span>

                                    @else

                                        <span class="text-sm text-slate-400">
                                            —
                                        </span>

                                    @endif

                                </td>



                                {{-- CHECKED AT --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    @if($verification->checked_at)

                                        <p
                                            class="text-sm font-semibold text-slate-600">

                                            {{ $verification->checked_at->format('d/m/Y') }}

                                        </p>

                                        <p
                                            class="mt-1 text-xs text-slate-400">

                                            {{ $verification->checked_at->format('H:i:s') }}

                                        </p>

                                    @else

                                        <span class="text-sm text-slate-400">
                                            —
                                        </span>

                                    @endif

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="px-6 py-14 text-center">

                                    <div
                                        class="flex flex-col items-center">

                                        <div
                                            class="mb-4 flex h-14 w-14
                                            items-center justify-center
                                            rounded-2xl bg-[#dff4f6]
                                            text-[#247f87]">

                                            <svg
                                                class="h-6 w-6"
                                                fill="none"
                                                stroke="currentColor"
                                                viewBox="0 0 24 24">

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5l5 5v11a2 2 0 01-2 2z" />

                                            </svg>

                                        </div>


                                        <p
                                            class="text-sm font-semibold
                                            text-[#183b45]">

                                            No monitoring checks yet

                                        </p>

                                        <p
                                            class="mt-1 text-xs text-slate-400">

                                            Verification activity will appear here.

                                        </p>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>



        {{-- ================================================= --}}
        {{-- ALL MONITORED WEBSITES --}}
        {{-- ================================================= --}}

        <section
            class="animate-fade-up delay-400 mt-6 overflow-hidden
            rounded-2xl border border-[#dceceb] bg-white shadow-sm">


            {{-- Header --}}
            <div
                class="border-b border-[#e6f0ef]
                bg-gradient-to-r from-[#f7fcfb] to-[#f4f9fb]
                px-6 py-5">

                <div class="flex items-center gap-3">

                    <div
                        class="flex h-10 w-10 items-center justify-center
                        rounded-xl bg-[#dff4f6] text-[#247f87]">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M3 10h18M3 14h18M8 6v12M16 6v12" />

                        </svg>

                    </div>


                    <div>

                        <h2 class="text-lg font-bold text-[#183b45]">
                            All Monitored Websites
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            Overview of all websites registered by users.
                        </p>

                    </div>

                </div>

            </div>



            {{-- Table --}}
            <div class="overflow-x-auto">

                <table class="min-w-full">

                    <thead class="bg-[#f8fbfb]">

                        <tr>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Website
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Owner
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Status
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Checks
                            </th>

                            <th
                                class="px-6 py-4 text-left text-xs font-bold
                                uppercase tracking-wider text-slate-500">
                                Last Check
                            </th>

                        </tr>

                    </thead>


                    <tbody class="divide-y divide-[#edf3f2]">

                        @forelse($sites ?? [] as $site)

                            @php
                                $lastCheck = $site->verifications
                                    ->sortByDesc('checked_at')
                                    ->first();

                                $siteStatus = $lastCheck
                                    ? strtoupper($lastCheck->status ?? '')
                                    : null;
                            @endphp


                            <tr class="monitor-row">


                                {{-- WEBSITE --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="flex h-10 w-10 shrink-0
                                            items-center justify-center rounded-xl
                                            bg-[#dff4f6] font-bold
                                            text-[#247f87]">

                                            {{ strtoupper(substr($site->name ?? 'S', 0, 1)) }}

                                        </div>


                                        <div>

                                            <p
                                                class="text-sm font-bold
                                                text-[#183b45]">

                                                {{ $site->name ?? 'Unnamed Website' }}

                                            </p>

                                            <p
                                                class="mt-1 max-w-[260px]
                                                truncate text-xs text-slate-400">

                                                {{ $site->url ?? '-' }}

                                            </p>

                                        </div>

                                    </div>

                                </td>



                                {{-- OWNER --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    <p
                                        class="text-sm font-semibold
                                        text-slate-700">

                                        {{ $site->user?->name ?? 'Unknown User' }}

                                    </p>

                                    <p
                                        class="mt-1 text-xs text-slate-400">

                                        {{ $site->user?->email ?? '-' }}

                                    </p>

                                </td>



                                {{-- ACTIVE STATUS --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    @if($site->is_active)

                                        <span
                                            class="inline-flex items-center gap-2
                                            rounded-lg bg-[#e3f3e5]
                                            px-3 py-1.5 text-xs font-bold
                                            text-[#43845a]">

                                            <span
                                                class="h-2 w-2 rounded-full
                                                bg-[#5ca66f]">
                                            </span>

                                            Active

                                        </span>

                                    @else

                                        <span
                                            class="inline-flex items-center gap-2
                                            rounded-lg bg-[#fde7e5]
                                            px-3 py-1.5 text-xs font-bold
                                            text-[#c74848]">

                                            <span
                                                class="h-2 w-2 rounded-full
                                                bg-[#d75b5b]">
                                            </span>

                                            Inactive

                                        </span>

                                    @endif

                                </td>



                                {{-- CHECK COUNT --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    <span
                                        class="inline-flex items-center
                                        rounded-lg bg-[#f1f5f6]
                                        px-3 py-1.5 text-sm font-semibold
                                        text-slate-600">

                                        {{ $site->verifications_count ?? $site->verifications->count() }}

                                    </span>

                                </td>



                                {{-- LAST CHECK --}}
                                <td class="whitespace-nowrap px-6 py-5">

                                    @if($lastCheck)

                                        <p
                                            class="text-sm font-semibold
                                            text-slate-600">

                                            {{ $lastCheck->checked_at
                                                ? $lastCheck->checked_at->format('d/m/Y H:i')
                                                : '—' }}

                                        </p>


                                        @if($siteStatus === 'UP')

                                            <span
                                                class="mt-1 inline-flex
                                                items-center gap-1.5
                                                text-xs font-semibold
                                                text-[#43845a]">

                                                <span
                                                    class="h-1.5 w-1.5
                                                    rounded-full bg-[#5ca66f]">
                                                </span>

                                                Last status: UP

                                            </span>

                                        @elseif($siteStatus === 'DOWN')

                                            <span
                                                class="mt-1 inline-flex
                                                items-center gap-1.5
                                                text-xs font-semibold
                                                text-[#c74848]">

                                                <span
                                                    class="h-1.5 w-1.5
                                                    rounded-full bg-[#d75b5b]">
                                                </span>

                                                Last status: DOWN

                                            </span>

                                        @else

                                            <span
                                                class="mt-1 text-xs
                                                font-semibold text-slate-400">

                                                Status unavailable

                                            </span>

                                        @endif

                                    @else

                                        <span
                                            class="text-sm text-slate-400">

                                            No checks yet

                                        </span>

                                    @endif

                                </td>

                            </tr>


                        @empty

                            <tr>

                                <td
                                    colspan="5"
                                    class="px-6 py-14 text-center">

                                    <p
                                        class="text-sm font-semibold
                                        text-[#183b45]">

                                        No websites available

                                    </p>

                                    <p
                                        class="mt-1 text-xs text-slate-400">

                                        Websites created by users will appear here.

                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </section>



        {{-- ================================================= --}}
        {{-- FOOTER INFO --}}
        {{-- ================================================= --}}

        <div
            class="animate-fade-up delay-500 mt-6 pb-4">

            <div
                class="flex flex-col gap-2 rounded-xl border
                border-[#dceceb] bg-white px-5 py-4
                sm:flex-row sm:items-center sm:justify-between">

                <p class="text-xs text-slate-400">
                    SiteMonitor Admin Monitoring
                </p>

                <div
                    class="inline-flex items-center gap-2 text-xs
                    font-medium text-slate-400">

                    <span
                        class="h-2 w-2 rounded-full bg-[#5ca66f]">
                    </span>

                    Monitoring system operational

                </div>

            </div>

        </div>


    </div>

</main>

@endsection