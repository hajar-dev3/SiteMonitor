```blade
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Statistics - SiteMonitor</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.5.0/dist/chart.umd.min.js"></script>

    <style>
        /* =========================================================
           PAGE ANIMATIONS
        ========================================================= */

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

        @keyframes progressGrow {
            from {
                transform: scaleX(0);
            }

            to {
                transform: scaleX(1);
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

        .progress-animated {
            transform-origin: left;
            animation: progressGrow 1.2s cubic-bezier(.22, 1, .36, 1) both;
        }

        /* =========================================================
           STAT CARDS
        ========================================================= */

        .stat-card {
            position: relative;
            overflow: hidden;
            transition:
                transform .3s ease,
                box-shadow .3s ease,
                border-color .3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 35px rgba(30, 64, 80, .08);
        }

        .stat-card::after {
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
            transition: transform .75s ease;
        }

        .stat-card:hover::after {
            transform: translateX(120%);
        }

        /* =========================================================
           CONTENT CARDS
        ========================================================= */

        .content-card {
            transition:
                transform .3s ease,
                box-shadow .3s ease;
        }

        .content-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 35px rgba(30, 64, 80, .07);
        }

        /* =========================================================
           TABLE ROW
        ========================================================= */

        .website-row {
            transition:
                background-color .25s ease,
                transform .25s ease;
        }

        .website-row:hover {
            background-color: #f8fcfc;
        }

        /* =========================================================
           CHART WRAPPER
        ========================================================= */

        .chart-wrapper {
            position: relative;
            width: 100%;
            height: 288px;
        }

        .chart-wrapper-large {
            position: relative;
            width: 100%;
            height: 320px;
        }

        .chart-wrapper canvas,
        .chart-wrapper-large canvas {
            display: block !important;
            width: 100% !important;
            height: 100% !important;
        }

        /* =========================================================
           SCROLLBAR
        ========================================================= */

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

        ::-webkit-scrollbar-thumb:hover {
            background: #9fc5c2;
        }
    </style>
</head>


<body class="min-h-screen bg-[#f7fbfb] font-sans antialiased text-slate-800">

    {{-- ========================================================= --}}
    {{-- NAVIGATION --}}
    {{-- ========================================================= --}}

    <livewire:layout.navigation />


    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <div class="lg:pl-64">

        <main class="relative overflow-hidden px-4 py-8 sm:px-6 lg:px-8">

            {{-- Decorative background --}}
            <div class="pointer-events-none absolute -right-32 top-0 h-80 w-80 rounded-full bg-[#dff4f6] opacity-40 blur-3xl"></div>

            <div class="pointer-events-none absolute -left-32 top-[500px] h-72 w-72 rounded-full bg-[#eaf3f6] opacity-50 blur-3xl"></div>


            {{-- ================================================= --}}
            {{-- HEADER --}}
            {{-- ================================================= --}}

            <div class="animate-fade-up relative mb-8">

                <div class="relative overflow-hidden rounded-[28px] border border-[#d8e8e6] bg-gradient-to-r from-[#f5fbfa] via-[#eef8f7] to-[#f4f9fc] px-6 py-7 shadow-sm sm:px-8">

                    <div class="pointer-events-none absolute -right-16 -top-20 h-52 w-52 rounded-full bg-[#dff4f6] opacity-70"></div>

                    <div class="pointer-events-none absolute -bottom-24 right-36 h-48 w-48 rounded-full bg-[#e7f2f5] opacity-70"></div>

                    <div class="relative flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                        <div>

                            <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-[#cce7e3] bg-white/70 px-3 py-1.5 text-xs font-semibold text-[#378b87] shadow-sm">

                                <span class="h-2 w-2 rounded-full bg-[#55aaa5]"></span>

                                Monitoring Analytics

                            </div>

                            <h1 class="text-3xl font-bold tracking-tight text-[#183b45] sm:text-4xl">
                                Statistics
                            </h1>

                            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                                Monitor the performance, availability and response time of your websites.
                            </p>

                        </div>


                        <a
                            href="{{ route('sites.index') }}"
                            wire:navigate
                            class="group inline-flex items-center justify-center gap-2 rounded-xl bg-[#5aa8a3] px-5 py-3 text-sm font-semibold text-white shadow-lg shadow-[#5aa8a3]/20 transition duration-300 hover:-translate-y-1 hover:bg-[#4d9994] hover:shadow-xl">

                            Manage Websites

                            <svg
                                class="h-4 w-4 transition-transform duration-300 group-hover:translate-x-1"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 7l5 5m0 0l-5 5m5-5H6" />

                            </svg>

                        </a>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- STATISTICS CARDS --}}
            {{-- ================================================= --}}

            <div class="relative grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-5">

                {{-- TOTAL CHECKS --}}
                <div class="stat-card animate-fade-up rounded-2xl border border-[#d4eaed] bg-white p-5 shadow-sm">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-500">
                                Total Checks
                            </p>

                            <p class="mt-2 text-3xl font-bold tracking-tight text-[#247f87]">
                                {{ $totalChecks }}
                            </p>

                        </div>

                        <div class="animate-float-soft flex h-11 w-11 items-center justify-center rounded-xl bg-[#dff4f6] text-[#247f87]">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />

                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 border-t border-slate-100 pt-3">

                        <p class="text-xs text-slate-400">
                            Total monitoring checks
                        </p>

                    </div>

                </div>


                {{-- SUCCESSFUL --}}
                <div class="stat-card animate-fade-up delay-100 rounded-2xl border border-[#d8ebdc] bg-white p-5 shadow-sm">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-500">
                                Successful
                            </p>

                            <p class="mt-2 text-3xl font-bold tracking-tight text-[#43845a]">
                                {{ $successfulChecks }}
                            </p>

                        </div>

                        <div class="animate-float-soft flex h-11 w-11 items-center justify-center rounded-xl bg-[#e3f3e5] text-[#43845a]">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 13l4 4L19 7" />

                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 border-t border-slate-100 pt-3">

                        <p class="text-xs text-slate-400">
                            Successful checks
                        </p>

                    </div>

                </div>


                {{-- FAILED --}}
                <div class="stat-card animate-fade-up delay-200 rounded-2xl border border-[#f1d9d7] bg-white p-5 shadow-sm">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-500">
                                Failed
                            </p>

                            <p class="mt-2 text-3xl font-bold tracking-tight text-[#c74848]">
                                {{ $failedChecks }}
                            </p>

                        </div>

                        <div class="animate-float-soft flex h-11 w-11 items-center justify-center rounded-xl bg-[#fde7e5] text-[#c74848]">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />

                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 border-t border-slate-100 pt-3">

                        <p class="text-xs text-slate-400">
                            Failed monitoring checks
                        </p>

                    </div>

                </div>


                {{-- AVERAGE UPTIME --}}
                <div class="stat-card animate-fade-up delay-300 rounded-2xl border border-[#e4d9e8] bg-white p-5 shadow-sm">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-500">
                                Average Uptime
                            </p>

                            <p class="mt-2 text-3xl font-bold tracking-tight text-[#76547f]">
                                {{ number_format($averageUptime, 2) }}%
                            </p>

                        </div>

                        <div class="animate-float-soft flex h-11 w-11 items-center justify-center rounded-xl bg-[#eee5f3] text-[#76547f]">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12h4l3-9 4 18 3-9h4" />

                            </svg>

                        </div>

                    </div>

                    <div class="mt-5 border-t border-slate-100 pt-3">

                        <p class="text-xs text-slate-400">
                            Overall availability
                        </p>

                    </div>

                </div>


                {{-- RESPONSE TIME --}}
                <div class="stat-card animate-fade-up delay-400 rounded-2xl border border-[#d9e5ed] bg-white p-5 shadow-sm">

                    <div class="flex items-start justify-between">

                        <div>

                            <p class="text-sm font-medium text-slate-500">
                                Avg Response
                            </p>

                            <p class="mt-2 text-3xl font-bold tracking-tight text-[#4f7896]">

                                {{ number_format($averageResponseTime, 0) }}

                                <span class="text-base font-medium text-slate-400">
                                    ms
                                </span>

                            </p>

                        </div>

                        <div class="animate-float-soft flex h-11 w-11 items-center justify-center rounded-xl bg-[#e3eef6] text-[#4f7896]">

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

                    </div>

                    <div class="mt-5 border-t border-slate-100 pt-3">

                        <p class="text-xs text-slate-400">
                            Average response time
                        </p>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- CHARTS --}}
            {{-- ================================================= --}}

            <div class="relative mt-8 grid grid-cols-1 gap-6 lg:grid-cols-2">

                {{-- Checks --}}
                <div class="content-card animate-fade-up delay-300 rounded-2xl border border-[#dceceb] bg-white p-6 shadow-sm">

                    <div class="mb-6">

                        <div class="flex items-center gap-2">

                            <span class="h-2.5 w-2.5 rounded-full bg-[#247f87]"></span>

                            <h2 class="text-lg font-bold text-[#183b45]">
                                Monitoring Checks
                            </h2>

                        </div>

                        <p class="mt-1 text-sm text-slate-500">
                            Successful and failed checks over the last 7 days.
                        </p>

                    </div>

                    <div class="chart-wrapper">
                        <canvas id="checksChart"></canvas>
                    </div>

                </div>


                {{-- Uptime --}}
                <div class="content-card animate-fade-up delay-400 rounded-2xl border border-[#dceceb] bg-white p-6 shadow-sm">

                    <div class="mb-6">

                        <div class="flex items-center gap-2">

                            <span class="h-2.5 w-2.5 rounded-full bg-[#76547f]"></span>

                            <h2 class="text-lg font-bold text-[#183b45]">
                                Uptime
                            </h2>

                        </div>

                        <p class="mt-1 text-sm text-slate-500">
                            Website availability over the last 7 days.
                        </p>

                    </div>

                    <div class="chart-wrapper">
                        <canvas id="uptimeChart"></canvas>
                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- RESPONSE TIME --}}
            {{-- ================================================= --}}

            <div class="content-card animate-fade-up delay-500 mt-6 rounded-2xl border border-[#dceceb] bg-white p-6 shadow-sm">

                <div class="mb-6 flex items-start justify-between">

                    <div>

                        <div class="flex items-center gap-2">

                            <span class="h-2.5 w-2.5 rounded-full bg-[#4f7896]"></span>

                            <h2 class="text-lg font-bold text-[#183b45]">
                                Response Time
                            </h2>

                        </div>

                        <p class="mt-1 text-sm text-slate-500">
                            Average server response time over the last 7 days.
                        </p>

                    </div>

                    <div class="rounded-lg bg-[#e3eef6] px-3 py-1.5 text-xs font-semibold text-[#4f7896]">
                        Milliseconds
                    </div>

                </div>

                <div class="chart-wrapper-large">
                    <canvas id="responseChart"></canvas>
                </div>

            </div>


            {{-- ================================================= --}}
            {{-- MONITORING OVERVIEW --}}
            {{-- ================================================= --}}

            <div class="content-card animate-fade-up delay-500 mt-6 rounded-2xl border border-[#dceceb] bg-white p-6 shadow-sm">

                <div class="mb-6">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#dff4f6] text-[#247f87]">

                            <svg
                                class="h-5 w-5"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24">

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 19V6l12-3v13M9 19c0 1.657-1.567 3-3.5 3S2 20.657 2 19s1.567-3 3.5-3S9 17.343 9 19zm12-3c0 1.657-1.567 3-3.5 3S14 17.657 14 16s1.567-3 3.5-3S21 14.343 21 16zM9 10l12-3" />

                            </svg>

                        </div>

                        <div>

                            <h2 class="text-lg font-bold text-[#183b45]">
                                Monitoring Overview
                            </h2>

                            <p class="text-sm text-slate-500">
                                Current monitoring performance across your websites.
                            </p>

                        </div>

                    </div>

                </div>


                <div>

                    <div class="mb-2 flex items-center justify-between">

                        <span class="text-sm font-semibold text-slate-600">
                            Overall Uptime
                        </span>

                        <span class="text-sm font-bold text-[#76547f]">
                            {{ number_format($averageUptime, 2) }}%
                        </span>

                    </div>

                    <div class="h-3 overflow-hidden rounded-full bg-[#f1edf3]">

                        <div
                            class="progress-animated h-full rounded-full bg-[#76547f]"
                            style="width: {{ min($averageUptime, 100) }}%">
                        </div>

                    </div>

                </div>


                <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">

                    {{-- Successful --}}
                    <div class="group rounded-xl border border-[#d8ebdc] bg-[#f8fcf8] p-4 transition duration-300 hover:-translate-y-1 hover:shadow-md">

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-3">

                                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#e3f3e5] text-[#43845a]">

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M5 13l4 4L19 7" />

                                    </svg>

                                </div>

                                <span class="text-sm font-semibold text-[#43845a]">
                                    Successful Checks
                                </span>

                            </div>

                            <span class="text-xl font-bold text-[#43845a]">
                                {{ $successfulChecks }}
                            </span>

                        </div>

                    </div>


                    {{-- Failed --}}
                    <div class="group rounded-xl border border-[#f1d9d7] bg-[#fff9f8] p-4 transition duration-300 hover:-translate-y-1 hover:shadow-md">

                        <div class="flex items-center justify-between">

                            <div class="flex items-center gap-3">

                                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#fde7e5] text-[#c74848]">

                                    <svg
                                        class="h-4 w-4"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />

                                    </svg>

                                </div>

                                <span class="text-sm font-semibold text-[#c74848]">
                                    Failed Checks
                                </span>

                            </div>

                            <span class="text-xl font-bold text-[#c74848]">
                                {{ $failedChecks }}
                            </span>

                        </div>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- WEBSITE STATISTICS --}}
            {{-- ================================================= --}}

            <div class="content-card animate-fade-up delay-600 mt-6 overflow-hidden rounded-2xl border border-[#dceceb] bg-white shadow-sm">

                <div class="border-b border-[#e6f0ef] bg-gradient-to-r from-[#f7fcfb] to-[#f4f9fb] px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#dff4f6] text-[#247f87]">

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
                                Website Statistics
                            </h2>

                            <p class="mt-1 text-sm text-slate-500">
                                Performance details for each monitored website.
                            </p>

                        </div>

                    </div>

                </div>


                <div class="overflow-x-auto">

                    <table class="min-w-full">

                        <thead class="bg-[#f8fbfb]">

                            <tr>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Website
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Checks
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Successful
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Failed
                                </th>

                                <th class="px-6 py-4 text-left text-xs font-bold uppercase tracking-wider text-slate-500">
                                    Uptime
                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-[#edf3f2]">

                            @forelse($sites as $site)

                                @php

                                    $siteChecks = $verifications
                                        ->where('site_id', $site->id);

                                    $siteTotal = $siteChecks->count();

                                    $siteSuccessful = $siteChecks
                                        ->where('status', 'UP')
                                        ->count();

                                    $siteFailed = $siteChecks
                                        ->where('status', 'DOWN')
                                        ->count();

                                    $siteUptime = $siteTotal > 0
                                        ? ($siteSuccessful / $siteTotal) * 100
                                        : 0;

                                @endphp


                                <tr class="website-row group">

                                    <td class="whitespace-nowrap px-6 py-5">

                                        <div class="flex items-center gap-3">

                                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#dff4f6] font-bold text-[#247f87] transition duration-300 group-hover:scale-105">

                                                {{ strtoupper(substr($site->name, 0, 1)) }}

                                            </div>

                                            <div>

                                                <p class="text-sm font-bold text-[#183b45]">
                                                    {{ $site->name }}
                                                </p>

                                                <p class="mt-1 max-w-[240px] truncate text-xs text-slate-400">
                                                    {{ $site->url }}
                                                </p>

                                            </div>

                                        </div>

                                    </td>


                                    <td class="whitespace-nowrap px-6 py-5">

                                        <span class="rounded-lg bg-[#f1f5f6] px-3 py-1.5 text-sm font-semibold text-slate-600">
                                            {{ $siteTotal }}
                                        </span>

                                    </td>


                                    <td class="whitespace-nowrap px-6 py-5">

                                        <span class="inline-flex items-center gap-2 text-sm font-bold text-[#43845a]">

                                            <span class="h-2 w-2 rounded-full bg-[#5ca66f]"></span>

                                            {{ $siteSuccessful }}

                                        </span>

                                    </td>


                                    <td class="whitespace-nowrap px-6 py-5">

                                        <span class="inline-flex items-center gap-2 text-sm font-bold text-[#c74848]">

                                            <span class="h-2 w-2 rounded-full bg-[#d75b5b]"></span>

                                            {{ $siteFailed }}

                                        </span>

                                    </td>


                                    <td class="whitespace-nowrap px-6 py-5">

                                        <div class="flex min-w-[190px] items-center gap-3">

                                            <div class="h-2.5 w-24 overflow-hidden rounded-full bg-[#f1edf3]">

                                                <div
                                                    class="progress-animated h-full rounded-full bg-[#76547f]"
                                                    style="width: {{ min($siteUptime, 100) }}%">
                                                </div>

                                            </div>

                                            <span class="text-sm font-bold text-[#76547f]">
                                                {{ number_format($siteUptime, 1) }}%
                                            </span>

                                        </div>

                                    </td>

                                </tr>


                            @empty

                                <tr>

                                    <td
                                        colspan="5"
                                        class="px-6 py-14 text-center">

                                        <div class="flex flex-col items-center">

                                            <div class="mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#dff4f6] text-[#247f87]">

                                                <svg
                                                    class="h-6 w-6"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    viewBox="0 0 24 24">

                                                    <path
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z" />

                                                </svg>

                                            </div>

                                            <p class="text-sm font-semibold text-[#183b45]">
                                                No websites available yet
                                            </p>

                                            <p class="mt-1 text-xs text-slate-400">
                                                Add a website to start monitoring its statistics.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </main>

    </div>


    {{-- ========================================================= --}}
    {{-- CHART.JS --}}
    {{-- ========================================================= --}}

    <script>

        function initStatisticsCharts() {

            if (typeof Chart === 'undefined') {
                console.error('Chart.js is not loaded.');
                return;
            }

            const chartLabels = @json($chartLabels);
            const chartSuccessful = @json($chartSuccessful);
            const chartFailed = @json($chartFailed);
            const chartUptime = @json($chartUptime);
            const chartResponseTime = @json($chartResponseTime);


            /* =====================================================
               DESTROY OLD CHARTS
            ===================================================== */

            const existingChecks = document.getElementById('checksChart');
            const existingUptime = document.getElementById('uptimeChart');
            const existingResponse = document.getElementById('responseChart');

            if (existingChecks) {

                const oldChart = Chart.getChart(existingChecks);

                if (oldChart) {
                    oldChart.destroy();
                }
            }

            if (existingUptime) {

                const oldChart = Chart.getChart(existingUptime);

                if (oldChart) {
                    oldChart.destroy();
                }
            }

            if (existingResponse) {

                const oldChart = Chart.getChart(existingResponse);

                if (oldChart) {
                    oldChart.destroy();
                }
            }


            /* =====================================================
               GLOBAL SETTINGS
            ===================================================== */

            Chart.defaults.font.family =
                'Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif';

            Chart.defaults.color = '#64748b';


            /* =====================================================
               CHECKS CHART
            ===================================================== */

            const checksCanvas = document.getElementById('checksChart');

            if (checksCanvas) {

                new Chart(checksCanvas, {

                    type: 'line',

                    data: {

                        labels: chartLabels,

                        datasets: [

                            {
                                label: 'Successful',

                                data: chartSuccessful,

                                borderColor: '#43845a',

                                backgroundColor: 'rgba(67, 132, 90, 0.08)',

                                borderWidth: 2.5,

                                fill: true,

                                tension: 0.4,

                                pointRadius: 3,

                                pointHoverRadius: 6,

                                pointBackgroundColor: '#ffffff',

                                pointBorderColor: '#43845a',

                                pointBorderWidth: 2
                            },

                            {
                                label: 'Failed',

                                data: chartFailed,

                                borderColor: '#c74848',

                                backgroundColor: 'rgba(199, 72, 72, 0.07)',

                                borderWidth: 2.5,

                                fill: true,

                                tension: 0.4,

                                pointRadius: 3,

                                pointHoverRadius: 6,

                                pointBackgroundColor: '#ffffff',

                                pointBorderColor: '#c74848',

                                pointBorderWidth: 2
                            }

                        ]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio: false,

                        animation: {

                            duration: 1200,

                            easing: 'easeOutQuart'

                        },

                        interaction: {

                            mode: 'index',

                            intersect: false

                        },

                        scales: {

                            x: {

                                grid: {
                                    display: false
                                },

                                border: {
                                    display: false
                                }

                            },

                            y: {

                                beginAtZero: true,

                                ticks: {
                                    precision: 0
                                },

                                grid: {
                                    color: 'rgba(148, 163, 184, 0.10)'
                                },

                                border: {
                                    display: false
                                }

                            }

                        },

                        plugins: {

                            legend: {

                                position: 'bottom',

                                labels: {

                                    usePointStyle: true,

                                    pointStyle: 'circle',

                                    padding: 18,

                                    boxWidth: 8

                                }

                            },

                            tooltip: {

                                backgroundColor: '#183b45',

                                titleColor: '#ffffff',

                                bodyColor: '#e2eeee',

                                padding: 12,

                                cornerRadius: 10

                            }

                        }

                    }

                });

            }


            /* =====================================================
               UPTIME CHART
            ===================================================== */

            const uptimeCanvas = document.getElementById('uptimeChart');

            if (uptimeCanvas) {

                new Chart(uptimeCanvas, {

                    type: 'line',

                    data: {

                        labels: chartLabels,

                        datasets: [

                            {

                                label: 'Uptime %',

                                data: chartUptime,

                                borderColor: '#76547f',

                                backgroundColor: 'rgba(118, 84, 127, 0.08)',

                                borderWidth: 2.5,

                                fill: true,

                                tension: 0.4,

                                pointRadius: 3,

                                pointHoverRadius: 6,

                                pointBackgroundColor: '#ffffff',

                                pointBorderColor: '#76547f',

                                pointBorderWidth: 2

                            }

                        ]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio: false,

                        animation: {

                            duration: 1400,

                            easing: 'easeOutQuart'

                        },

                        interaction: {

                            mode: 'index',

                            intersect: false

                        },

                        scales: {

                            x: {

                                grid: {
                                    display: false
                                },

                                border: {
                                    display: false
                                }

                            },

                            y: {

                                beginAtZero: true,

                                max: 100,

                                ticks: {

                                    callback: function(value) {
                                        return value + '%';
                                    }

                                },

                                grid: {
                                    color: 'rgba(148, 163, 184, 0.10)'
                                },

                                border: {
                                    display: false
                                }

                            }

                        },

                        plugins: {

                            legend: {

                                position: 'bottom',

                                labels: {

                                    usePointStyle: true,

                                    pointStyle: 'circle',

                                    padding: 18,

                                    boxWidth: 8

                                }

                            },

                            tooltip: {

                                backgroundColor: '#183b45',

                                titleColor: '#ffffff',

                                bodyColor: '#e2eeee',

                                padding: 12,

                                cornerRadius: 10

                            }

                        }

                    }

                });

            }


            /* =====================================================
               RESPONSE TIME CHART
            ===================================================== */

            const responseCanvas = document.getElementById('responseChart');

            if (responseCanvas) {

                new Chart(responseCanvas, {

                    type: 'bar',

                    data: {

                        labels: chartLabels,

                        datasets: [

                            {

                                label: 'Average Response Time',

                                data: chartResponseTime,

                                backgroundColor: 'rgba(79, 120, 150, 0.16)',

                                borderColor: '#4f7896',

                                borderWidth: 1.5,

                                borderRadius: 8,

                                borderSkipped: false,

                                hoverBackgroundColor: 'rgba(79, 120, 150, 0.28)'

                            }

                        ]

                    },

                    options: {

                        responsive: true,

                        maintainAspectRatio: false,

                        animation: {

                            duration: 1200,

                            easing: 'easeOutQuart',

                            delay: function(context) {

                                return context.dataIndex * 70;

                            }

                        },

                        scales: {

                            x: {

                                grid: {
                                    display: false
                                },

                                border: {
                                    display: false
                                }

                            },

                            y: {

                                beginAtZero: true,

                                title: {

                                    display: true,

                                    text: 'Milliseconds',

                                    color: '#64748b',

                                    font: {

                                        size: 12,

                                        weight: '600'

                                    }

                                },

                                grid: {

                                    color: 'rgba(148, 163, 184, 0.10)'

                                },

                                border: {

                                    display: false

                                }

                            }

                        },

                        plugins: {

                            legend: {

                                display: false

                            },

                            tooltip: {

                                backgroundColor: '#183b45',

                                titleColor: '#ffffff',

                                bodyColor: '#e2eeee',

                                padding: 12,

                                cornerRadius: 10,

                                callbacks: {

                                    label: function(context) {

                                        return ' ' + context.raw + ' ms';

                                    }

                                }

                            }

                        }

                    }

                });

            }

        }


        /* =========================================================
           FIRST LOAD
        ========================================================= */

        if (document.readyState === 'loading') {

            document.addEventListener(
                'DOMContentLoaded',
                initStatisticsCharts,
                { once: true }
            );

        } else {

            initStatisticsCharts();

        }


        /* =========================================================
           LIVEWIRE NAVIGATION
        ========================================================= */

        document.addEventListener(
            'livewire:navigated',
            function() {

                setTimeout(function() {
                    initStatisticsCharts();
                }, 50);

            }
        );

    </script>

</body>

</html>
```
