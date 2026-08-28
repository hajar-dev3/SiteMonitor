@extends('layouts.admin')

@section('content')

<div class="space-y-8">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">

        <div>

            <div class="mb-3 flex items-center gap-2">

                <span class="h-2 w-2 rounded-full bg-[#2F8F9D]"></span>

                <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#89978F]">
                    Administration
                </span>

            </div>

            <h1 class="text-3xl font-black tracking-tight text-[#253638]">
                Statistics
            </h1>

            <p class="mt-2 max-w-2xl text-sm leading-6 text-[#687870]">
                Overview of platform performance, monitoring activity,
                and SiteMonitor system analytics.
            </p>

        </div>


        {{-- Period badge --}}

        <div class="flex items-center gap-2 rounded-xl border border-[#DCEBE8]
                    bg-white px-4 py-2.5 shadow-sm">

            <span class="h-2 w-2 rounded-full bg-[#73B88A]"></span>

            <span class="text-xs font-bold text-[#304C43]">
                Data from the last 7 days
            </span>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SYSTEM HEALTH --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-3xl border border-[#DCEBE8]
                bg-white shadow-sm">

        <div class="flex flex-col gap-5 p-6 sm:flex-row sm:items-center
                    sm:justify-between">

            <div class="flex items-center gap-4">

                <div class="flex h-12 w-12 items-center justify-center
                            rounded-2xl bg-[#E8F4F3]">

                    <span class="h-3 w-3 rounded-full
                        @if($systemHealthClass === 'excellent')
                            bg-[#58A878]
                        @elseif($systemHealthClass === 'good')
                            bg-[#73B88A]
                        @elseif($systemHealthClass === 'warning')
                            bg-[#D5A94F]
                        @else
                            bg-[#C65353]
                        @endif
                    "></span>

                </div>

                <div>

                    <p class="text-xs font-bold uppercase tracking-[0.14em]
                              text-[#89978F]">
                        System Health
                    </p>

                    <h2 class="mt-1 text-xl font-black text-[#253638]">
                        {{ $systemHealth }}
                    </h2>

                </div>

            </div>


            <div class="flex flex-wrap gap-3">

                <div class="rounded-xl bg-[#F7FAF9] px-4 py-2">

                    <p class="text-[10px] font-bold uppercase
                              tracking-wider text-[#89978F]">
                        Success Rate
                    </p>

                    <p class="mt-1 text-lg font-black text-[#2F7480]">
                        {{ $successRate }}%
                    </p>

                </div>


                <div class="rounded-xl bg-[#F7FAF9] px-4 py-2">

                    <p class="text-[10px] font-bold uppercase
                              tracking-wider text-[#89978F]">
                        Average Response
                    </p>

                    <p class="mt-1 text-lg font-black text-[#304C43]">
                        {{ $averageResponseTime }} ms
                    </p>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- KPI CARDS --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


        {{-- USERS --}}

        <div class="rounded-3xl border border-[#E4DDD4] bg-white
                    p-5 shadow-sm transition hover:-translate-y-0.5
                    hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="flex h-11 w-11 items-center justify-center
                            rounded-xl bg-[#F1EAF5] text-[#8A6A9B]">

                    <svg class="h-5 w-5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.7"
                              d="M16 21v-2a4 4 0 00-4-4H6a4 4 0 00-4 4v2"/>

                        <circle cx="9" cy="7" r="4"
                                stroke-width="1.7"/>

                    </svg>

                </div>

                <span class="rounded-lg bg-[#F7F2F9] px-2 py-1
                             text-[10px] font-bold text-[#8A6A9B]">
                    USERS
                </span>

            </div>

            <p class="mt-5 text-3xl font-black text-[#253638]">
                {{ number_format($totalUsers) }}
            </p>

            <p class="mt-1 text-xs font-medium text-[#89978F]">
                Registered users
            </p>

        </div>


        {{-- SITES --}}

        <div class="rounded-3xl border border-[#E4DDD4] bg-white
                    p-5 shadow-sm transition hover:-translate-y-0.5
                    hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="flex h-11 w-11 items-center justify-center
                            rounded-xl bg-[#E8F4F3] text-[#2F8F9D]">

                    <svg class="h-5 w-5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">

                        <circle cx="12" cy="12" r="9"
                                stroke-width="1.7"/>

                        <path stroke-linecap="round"
                              stroke-width="1.7"
                              d="M3 12h18"/>

                        <path stroke-linecap="round"
                              stroke-width="1.7"
                              d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z"/>

                    </svg>

                </div>

                <span class="rounded-lg bg-[#E8F4F3] px-2 py-1
                             text-[10px] font-bold text-[#2F7480]">
                    SITES
                </span>

            </div>

            <p class="mt-5 text-3xl font-black text-[#253638]">
                {{ number_format($totalSites) }}
            </p>

            <p class="mt-1 text-xs font-medium text-[#89978F]">
                Registered sites
            </p>

        </div>


        {{-- VERIFICATIONS --}}

        <div class="rounded-3xl border border-[#E4DDD4] bg-white
                    p-5 shadow-sm transition hover:-translate-y-0.5
                    hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="flex h-11 w-11 items-center justify-center
                            rounded-xl bg-[#EDF4EE] text-[#5A9670]">

                    <svg class="h-5 w-5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="1.7"
                              d="M13 3L4 14h7v7l9-11h-7z"/>

                    </svg>

                </div>

                <span class="rounded-lg bg-[#EDF4EE] px-2 py-1
                             text-[10px] font-bold text-[#5A9670]">
                    CHECKS
                </span>

            </div>

            <p class="mt-5 text-3xl font-black text-[#253638]">
                {{ number_format($totalVerifications) }}
            </p>

            <p class="mt-1 text-xs font-medium text-[#89978F]">
                Checks performed
            </p>

        </div>


        {{-- RESPONSE TIME --}}

        <div class="rounded-3xl border border-[#E4DDD4] bg-white
                    p-5 shadow-sm transition hover:-translate-y-0.5
                    hover:shadow-md">

            <div class="flex items-start justify-between">

                <div class="flex h-11 w-11 items-center justify-center
                            rounded-xl bg-[#F8F1E8] text-[#B5864A]">

                    <svg class="h-5 w-5" fill="none"
                         stroke="currentColor" viewBox="0 0 24 24">

                        <circle cx="12" cy="12" r="9"
                                stroke-width="1.7"/>

                        <path stroke-linecap="round"
                              stroke-width="1.7"
                              d="M12 7v5l3 2"/>

                    </svg>

                </div>

                <span class="rounded-lg bg-[#F8F1E8] px-2 py-1
                             text-[10px] font-bold text-[#B5864A]">
                    PERFORMANCE
                </span>

            </div>

            <p class="mt-5 text-3xl font-black text-[#253638]">
                {{ $averageResponseTime }}
                <span class="text-sm">ms</span>
            </p>

            <p class="mt-1 text-xs font-medium text-[#89978F]">
                Average response time
            </p>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SECONDARY KPIs --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 gap-5 md:grid-cols-3">


        {{-- ACTIVE SITES --}}

        <div class="rounded-2xl border border-[#DCEBE8] bg-[#F8FCFB] p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider
                              text-[#89978F]">
                        Active Sites
                    </p>

                    <p class="mt-2 text-2xl font-black text-[#304C43]">
                        {{ $activeSites }}
                    </p>

                </div>

                <div class="rounded-xl bg-[#E8F4F3] px-3 py-2
                            text-xs font-bold text-[#2F7480]">

                    {{ $totalSites > 0
                        ? round(($activeSites / $totalSites) * 100)
                        : 0
                    }}%

                </div>

            </div>

        </div>


        {{-- FAILED CHECKS --}}

        <div class="rounded-2xl border border-[#EAD9D7] bg-[#FFF9F8] p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider
                              text-[#9F7773]">
                        Failed Checks
                    </p>

                    <p class="mt-2 text-2xl font-black text-[#9F4D49]">
                        {{ $failedVerifications }}
                    </p>

                </div>

                <div class="rounded-xl bg-[#FBEFED] px-3 py-2
                            text-xs font-bold text-[#C65353]">

                    {{ $failureRate }}%

                </div>

            </div>

        </div>


        {{-- LAST 24 HOURS --}}

        <div class="rounded-2xl border border-[#DCEBE8] bg-[#F8FCFB] p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-wider
                              text-[#89978F]">
                        Last 24 Hours
                    </p>

                    <p class="mt-2 text-2xl font-black text-[#304C43]">
                        {{ $verificationsLast24Hours }}
                    </p>

                </div>

                <span class="rounded-xl bg-[#E8F4F3] px-3 py-2
                             text-xs font-bold text-[#2F7480]">
                    Checks
                </span>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MAIN CHART --}}
    {{-- ========================================================= --}}

    <div class="rounded-3xl border border-[#E4DDD4] bg-white
                p-6 shadow-sm">

        <div class="mb-6 flex flex-col gap-3 sm:flex-row
                    sm:items-center sm:justify-between">

            <div>

                <h2 class="text-lg font-black text-[#253638]">
                    Verification Activity
                </h2>

                <p class="mt-1 text-xs text-[#89978F]">
                    Successful and failed verification activity
                    over the last 7 days.
                </p>

            </div>

            <div class="flex items-center gap-4 text-xs font-semibold">

                <span class="flex items-center gap-2">

                    <span class="h-2.5 w-2.5 rounded-full bg-[#2F8F9D]"></span>

                    Successful

                </span>

                <span class="flex items-center gap-2">

                    <span class="h-2.5 w-2.5 rounded-full bg-[#C65353]"></span>

                    Failed

                </span>

            </div>

        </div>

        <div class="h-[330px]">

            <canvas id="verificationActivityChart"></canvas>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- CHARTS GRID --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 gap-6 xl:grid-cols-2">


        {{-- SITE STATUS --}}

        <div class="rounded-3xl border border-[#E4DDD4] bg-white
                    p-6 shadow-sm">

            <div class="mb-6">

                <h2 class="text-lg font-black text-[#253638]">
                    Site Status
                </h2>

                <p class="mt-1 text-xs text-[#89978F]">
                    Distribution of active and inactive sites.
                </p>

            </div>

            <div class="mx-auto h-[280px] max-w-[360px]">

                <canvas id="siteStatusChart"></canvas>

            </div>

        </div>


        {{-- VERIFICATION STATUS --}}

        <div class="rounded-3xl border border-[#E4DDD4] bg-white
                    p-6 shadow-sm">

            <div class="mb-6">

                <h2 class="text-lg font-black text-[#253638]">
                    Verification Success
                </h2>

                <p class="mt-1 text-xs text-[#89978F]">
                    Overall verification success and failure rate.
                </p>

            </div>

            <div class="mx-auto h-[280px] max-w-[360px]">

                <canvas id="verificationStatusChart"></canvas>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- RESPONSE TIME CHART --}}
    {{-- ========================================================= --}}

    <div class="rounded-3xl border border-[#E4DDD4] bg-white
                p-6 shadow-sm">

        <div class="mb-6">

            <h2 class="text-lg font-black text-[#253638]">
                Average Response Time
            </h2>

            <p class="mt-1 text-xs text-[#89978F]">
                Average response time of monitored sites over time.
            </p>

        </div>

        <div class="h-[300px]">

            <canvas id="responseTimeChart"></canvas>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- RECENT VERIFICATIONS --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-3xl border border-[#E4DDD4]
                bg-white shadow-sm">

        <div class="border-b border-[#EAE5DF] px-6 py-5">

            <div class="flex items-center justify-between">

                <div>

                    <h2 class="text-lg font-black text-[#253638]">
                        Recent Verifications
                    </h2>

                    <p class="mt-1 text-xs text-[#89978F]">
                        The 10 most recent verification checks.
                    </p>

                </div>

                <div class="rounded-xl bg-[#F7FAF9] px-3 py-2">

                    <span class="text-xs font-bold text-[#2F7480]">
                        {{ $totalVerifications }} total
                    </span>

                </div>

            </div>

        </div>


        <div class="overflow-x-auto">

            <table class="min-w-full text-left">

                <thead class="bg-[#FAFCFB]">

                    <tr>

                        <th class="px-6 py-4 text-[10px] font-bold
                                   uppercase tracking-wider text-[#89978F]">
                            Site
                        </th>

                        <th class="px-6 py-4 text-[10px] font-bold
                                   uppercase tracking-wider text-[#89978F]">
                            Status
                        </th>

                        <th class="px-6 py-4 text-[10px] font-bold
                                   uppercase tracking-wider text-[#89978F]">
                            HTTP
                        </th>

                        <th class="px-6 py-4 text-[10px] font-bold
                                   uppercase tracking-wider text-[#89978F]">
                            Response
                        </th>

                        <th class="px-6 py-4 text-[10px] font-bold
                                   uppercase tracking-wider text-[#89978F]">
                            Checked At
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-[#F0ECE7]">

                    @forelse($recentVerifications as $verification)

                        <tr class="transition hover:bg-[#FAFCFB]">

                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-9 w-9 items-center
                                                justify-center rounded-xl
                                                bg-[#E8F4F3] text-[#2F7480]">

                                        🌐

                                    </div>

                                    <div>

                                        <p class="text-sm font-bold text-[#304C43]">
                                            {{ $verification->site->name ?? 'Unknown Site' }}
                                        </p>

                                        <p class="mt-0.5 max-w-[260px]
                                                  truncate text-[11px] text-[#9AA7A1]">
                                            {{ $verification->site->url ?? '-' }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            <td class="px-6 py-4">

                                @if($verification->status === 'success')

                                    <span class="inline-flex items-center gap-2
                                                 rounded-lg bg-[#EDF7EF]
                                                 px-2.5 py-1.5 text-[11px]
                                                 font-bold text-[#4E9168]">

                                        <span class="h-1.5 w-1.5 rounded-full
                                                     bg-[#5AA878]"></span>

                                        Success

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2
                                                 rounded-lg bg-[#FFF0EE]
                                                 px-2.5 py-1.5 text-[11px]
                                                 font-bold text-[#C65353]">

                                        <span class="h-1.5 w-1.5 rounded-full
                                                     bg-[#C65353]"></span>

                                        Failed

                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-4">

                                <span class="text-sm font-bold text-[#304C43]">
                                    {{ $verification->http_code ?? '-' }}
                                </span>

                            </td>


                            <td class="px-6 py-4">

                                <span class="text-sm font-bold text-[#304C43]">

                                    {{ $verification->response_time ?? '-' }}

                                    @if($verification->response_time)
                                        <span class="text-[10px] font-medium
                                                     text-[#89978F]">
                                            ms
                                        </span>
                                    @endif

                                </span>

                            </td>


                            <td class="px-6 py-4">

                                <span class="text-xs font-semibold text-[#687870]">

                                    {{ $verification->checked_at
                                        ? $verification->checked_at->format('d/m/Y H:i')
                                        : '-'
                                    }}

                                </span>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="px-6 py-12 text-center">

                                <div class="text-3xl">
                                    📊
                                </div>

                                <p class="mt-3 text-sm font-bold text-[#304C43]">
                                    No verifications yet
                                </p>

                                <p class="mt-1 text-xs text-[#89978F]">
                                    Verification data will appear here
                                    after the first checks are performed.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col gap-2 px-1 pb-3 text-xs
                text-[#9AA7A1] sm:flex-row sm:items-center
                sm:justify-between">

        <p>
            SiteMonitor · Administration
        </p>

        <p>
            Monitoring & Performance Analytics
        </p>

    </div>

</div>


{{-- ========================================================= --}}
{{-- CHART.JS --}}
{{-- ========================================================= --}}

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    /*
    |--------------------------------------------------------------------------
    | GLOBAL CHART DEFAULTS
    |--------------------------------------------------------------------------
    */

    Chart.defaults.font.family =
        "'Inter', 'Segoe UI', sans-serif";

    Chart.defaults.color = '#89978F';

    Chart.defaults.borderColor = '#EAE5DF';


    /*
    |--------------------------------------------------------------------------
    | VERIFICATION ACTIVITY
    |--------------------------------------------------------------------------
    */

    const verificationActivity =
        document.getElementById('verificationActivityChart');

    if (verificationActivity) {

        new Chart(verificationActivity, {

            type: 'line',

            data: {

                labels: @json($verificationLabels),

                datasets: [

                    {
                        label: 'Successful',

                        data: @json($verificationSuccessData),

                        borderColor: '#2F8F9D',

                        backgroundColor: 'rgba(47, 143, 157, 0.08)',

                        fill: true,

                        tension: 0.4,

                        borderWidth: 2.5,

                        pointRadius: 3,

                        pointHoverRadius: 6
                    },

                    {
                        label: 'Failed',

                        data: @json($verificationFailedData),

                        borderColor: '#C65353',

                        backgroundColor: 'rgba(198, 83, 83, 0.05)',

                        fill: true,

                        tension: 0.4,

                        borderWidth: 2.5,

                        pointRadius: 3,

                        pointHoverRadius: 6
                    }

                ]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                interaction: {

                    intersect: false,

                    mode: 'index'

                },

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {

                        backgroundColor: '#253638',

                        titleColor: '#FFFFFF',

                        bodyColor: '#DCEBE8',

                        padding: 12,

                        cornerRadius: 10,

                        displayColors: true

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

                        border: {
                            display: false
                        },

                        ticks: {
                            precision: 0
                        },

                        grid: {
                            color: '#EEF2F0'
                        }

                    }

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | SITE STATUS
    |--------------------------------------------------------------------------
    */

    const siteStatus =
        document.getElementById('siteStatusChart');

    if (siteStatus) {

        new Chart(siteStatus, {

            type: 'doughnut',

            data: {

                labels: [
                    'Active',
                    'Inactive'
                ],

                datasets: [{

                    data: @json($siteStatusData),

                    backgroundColor: [
                        '#2F8F9D',
                        '#D9E1DF'
                    ],

                    borderWidth: 0,

                    hoverOffset: 7

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '72%',

                plugins: {

                    legend: {

                        position: 'bottom',

                        labels: {

                            usePointStyle: true,

                            padding: 20,

                            font: {
                                weight: '600'
                            }

                        }

                    }

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | VERIFICATION STATUS
    |--------------------------------------------------------------------------
    */

    const verificationStatus =
        document.getElementById('verificationStatusChart');

    if (verificationStatus) {

        new Chart(verificationStatus, {

            type: 'doughnut',

            data: {

                labels: [
                    'Successful',
                    'Failed'
                ],

                datasets: [{

                    data: @json($verificationStatusData),

                    backgroundColor: [
                        '#5A9670',
                        '#C65353'
                    ],

                    borderWidth: 0,

                    hoverOffset: 7

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                cutout: '72%',

                plugins: {

                    legend: {

                        position: 'bottom',

                        labels: {

                            usePointStyle: true,

                            padding: 20,

                            font: {
                                weight: '600'
                            }

                        }

                    }

                }

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | RESPONSE TIME
    |--------------------------------------------------------------------------
    */

    const responseTime =
        document.getElementById('responseTimeChart');

    if (responseTime) {

        new Chart(responseTime, {

            type: 'line',

            data: {

                labels: @json($responseTimeLabels),

                datasets: [{

                    label: 'Average Response Time',

                    data: @json($responseTimeData),

                    borderColor: '#B5864A',

                    backgroundColor: 'rgba(181, 134, 74, 0.08)',

                    fill: true,

                    tension: 0.4,

                    borderWidth: 2.5,

                    pointRadius: 3,

                    pointHoverRadius: 6

                }]

            },

            options: {

                responsive: true,

                maintainAspectRatio: false,

                interaction: {

                    intersect: false,

                    mode: 'index'

                },

                plugins: {

                    legend: {
                        display: false
                    },

                    tooltip: {

                        backgroundColor: '#253638',

                        titleColor: '#FFFFFF',

                        bodyColor: '#DCEBE8',

                        padding: 12,

                        cornerRadius: 10,

                        callbacks: {

                            label: function(context) {

                                return ' ' +
                                    context.parsed.y +
                                    ' ms';

                            }

                        }

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

                        border: {
                            display: false
                        },

                        grid: {
                            color: '#EEF2F0'
                        },

                        ticks: {

                            callback: function(value) {

                                return value + ' ms';

                            }

                        }

                    }

                }

            }

        });

    }

});

</script>

@endsection