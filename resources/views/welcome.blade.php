<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SiteMonitor — Website Monitoring</title>
    <meta name="description" content="Monitor your websites, track uptime, detect downtime and receive instant alerts with SiteMonitor.">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html { scroll-behavior: smooth; }
        body { font-family: 'Figtree', sans-serif; }
        .grid-bg {
            background-image:
                linear-gradient(to right, rgba(47,143,157,.08) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(47,143,157,.08) 1px, transparent 1px);
            background-size: 42px 42px;
        }
        .float { animation: float 5s ease-in-out infinite; }
        @keyframes float {
            0%,100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        .pulse-soft { animation: pulseSoft 2.5s infinite; }
        @keyframes pulseSoft {
            0%,100% { opacity: 1; }
            50% { opacity: .5; }
        }
    </style>
</head>

<body class="bg-[#fffdf8] text-[#19352d] antialiased">

<!-- NAVBAR -->
<header class="fixed inset-x-0 top-0 z-50 border-b border-[#e8e0d4]/80 bg-[#fffdf8]/90 backdrop-blur-xl">
    <div class="mx-auto flex h-20 max-w-7xl items-center justify-between px-6 lg:px-8">

        <a href="{{ url('/') }}" class="flex items-center gap-3">
            <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#2f8f9d] text-white shadow-lg shadow-[#2f8f9d]/25">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none">
                    <path d="M13 2L4 13.5H11L10 22L20 9.5H13L13 2Z"
                          fill="currentColor" stroke="currentColor" stroke-width="1.2"
                          stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="leading-none">
                <div class="text-xl font-black tracking-tight text-[#17352c]">SiteMonitor</div>
                <div class="mt-1 text-[10px] font-bold uppercase tracking-[.18em] text-[#8b9d96]">
                    Website Monitoring
                </div>
            </div>
        </a>

        <nav class="hidden items-center gap-8 md:flex">
            <a href="#features" class="text-sm font-bold text-[#5f756d] transition hover:text-[#2f7f88]">Features</a>
            <a href="#how-it-works" class="text-sm font-bold text-[#5f756d] transition hover:text-[#2f7f88]">How it works</a>
            <a href="#dashboard" class="text-sm font-bold text-[#5f756d] transition hover:text-[#2f7f88]">Dashboard</a>
        </nav>

        <div class="flex items-center gap-2">
            <a href="{{ route('login') }}"
               class="hidden rounded-xl px-4 py-2.5 text-sm font-bold text-[#5f756d] transition hover:bg-[#f3ede2] sm:inline-flex">
                Sign in
            </a>
            <a href="{{ route('register') }}"
               class="inline-flex items-center rounded-xl bg-[#2f8f9d] px-5 py-3 text-sm font-black text-white shadow-lg shadow-[#2f8f9d]/20 transition hover:-translate-y-0.5 hover:bg-[#267986]">
                Get started <span class="ml-2">→</span>
            </a>
        </div>
    </div>
</header>

<main>

<!-- HERO -->
<section class="relative overflow-hidden bg-[#f7f1e6] pt-36 lg:pt-44">
    <div class="pointer-events-none absolute inset-0 grid-bg"></div>
    <div class="pointer-events-none absolute -left-40 top-20 h-96 w-96 rounded-full bg-[#2f8f9d]/10 blur-3xl"></div>
    <div class="pointer-events-none absolute -right-40 top-10 h-[500px] w-[500px] rounded-full bg-[#8e789f]/10 blur-3xl"></div>

    <div class="relative mx-auto max-w-7xl px-6 pb-24 lg:px-8 lg:pb-32">
        <div class="grid items-center gap-16 lg:grid-cols-2">

            <div class="max-w-2xl">
                <div class="mb-7 inline-flex items-center gap-2 rounded-full border border-[#c9e4df] bg-[#e8f4f2] px-4 py-2 text-sm font-bold text-[#276c75]">
                    <span class="relative flex h-2.5 w-2.5">
                        <span class="absolute h-full w-full animate-ping rounded-full bg-[#2f8f9d] opacity-60"></span>
                        <span class="relative h-2.5 w-2.5 rounded-full bg-[#2f8f9d]"></span>
                    </span>
                    24/7 Website Monitoring
                </div>

                <h1 class="text-5xl font-black leading-[1.02] tracking-tight text-[#17352c] sm:text-6xl lg:text-7xl">
                    Keep your websites
                    <span class="block bg-gradient-to-r from-[#2f8f9d] via-[#8e789f] to-[#5f8f67] bg-clip-text text-transparent">
                        online and reliable.
                    </span>
                </h1>

                <p class="mt-7 max-w-xl text-lg leading-8 text-[#5f756d] sm:text-xl">
                    Monitor uptime, performance and availability from one powerful dashboard.
                    Detect downtime quickly and stay informed before your users notice.
                </p>

                <div class="mt-9 flex flex-col gap-4 sm:flex-row">
                    <a href="{{ route('register') }}"
                       class="group inline-flex items-center justify-center rounded-xl bg-[#2f8f9d] px-7 py-4 text-sm font-black text-white shadow-xl shadow-[#2f8f9d]/20 transition hover:-translate-y-1 hover:bg-[#267986]">
                        Start monitoring
                        <span class="ml-2 text-lg transition-transform group-hover:translate-x-1">→</span>
                    </a>
                    <a href="#how-it-works"
                       class="inline-flex items-center justify-center rounded-xl border border-[#e8e0d4] bg-[#fffdf8] px-7 py-4 text-sm font-black text-[#36534a] shadow-sm transition hover:-translate-y-1 hover:bg-white">
                        See how it works
                    </a>
                </div>

                <div class="mt-9 flex flex-wrap gap-x-7 gap-y-3 text-sm font-semibold text-[#7b8f88]">
                    <span><b class="text-[#5f8f67]">✓</b> Real-time checks</span>
                    <span><b class="text-[#5f8f67]">✓</b> Instant alerts</span>
                    <span><b class="text-[#5f8f67]">✓</b> Response tracking</span>
                </div>
            </div>

            <!-- DASHBOARD PREVIEW -->
            <div class="relative float">
                <div class="absolute -inset-8 rounded-[3rem] bg-[#2f8f9d]/10 blur-3xl"></div>

                <div class="relative overflow-hidden rounded-3xl border border-[#e8e0d4] bg-[#fffdf8] shadow-2xl shadow-[#17352c]/10">
                    <div class="flex items-center justify-between border-b border-[#e8e0d4] bg-[#f3ede2] px-5 py-4">
                        <div class="flex gap-2">
                            <span class="h-3 w-3 rounded-full bg-[#d85b62]"></span>
                            <span class="h-3 w-3 rounded-full bg-[#d5a45f]"></span>
                            <span class="h-3 w-3 rounded-full bg-[#5f8f67]"></span>
                        </div>
                        <div class="flex items-center gap-2 rounded-full bg-[#edf5ed] px-3 py-1.5 text-xs font-bold text-[#4f7d58]">
                            <span class="h-2 w-2 rounded-full bg-[#5f8f67] pulse-soft"></span>
                            All systems operational
                        </div>
                    </div>

                    <div class="p-5 sm:p-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold uppercase tracking-widest text-[#9aaba5]">Overview</p>
                                <h3 class="mt-1 text-xl font-black text-[#17352c]">Monitoring Dashboard</h3>
                            </div>
                            <span class="rounded-lg bg-[#e8f4f2] px-3 py-2 text-xs font-bold text-[#2f7f88]">Live</span>
                        </div>

                        <div class="mt-6 grid grid-cols-2 gap-3 sm:grid-cols-4">
                            <div class="rounded-2xl border border-[#e8e0d4] bg-[#f7f1e6] p-4">
                                <p class="text-xs font-medium text-[#7b8f88]">Websites</p>
                                <p class="mt-2 text-2xl font-black text-[#17352c]">12</p>
                                <p class="mt-1 text-[11px] text-[#9aaba5]">Monitored</p>
                            </div>
                            <div class="rounded-2xl border border-[#d5e8d8] bg-[#edf5ed] p-4">
                                <p class="text-xs font-bold text-[#4f7d58]">Online</p>
                                <p class="mt-2 text-2xl font-black text-[#4f7d58]">10</p>
                                <p class="mt-1 text-[11px] text-[#7b8f88]">Operational</p>
                            </div>
                            <div class="rounded-2xl border border-[#f0c9c9] bg-[#fae9e8] p-4">
                                <p class="text-xs font-bold text-[#a83e47]">Down</p>
                                <p class="mt-2 text-2xl font-black text-[#a83e47]">2</p>
                                <p class="mt-1 text-[11px] text-[#7b8f88]">Attention</p>
                            </div>
                            <div class="rounded-2xl border border-[#ddd0e5] bg-[#f0eaf3] p-4">
                                <p class="text-xs font-bold text-[#786487]">Uptime</p>
                                <p class="mt-2 text-2xl font-black text-[#17352c]">99.98%</p>
                                <p class="mt-1 text-[11px] text-[#7b8f88]">Excellent</p>
                            </div>
                        </div>

                        <div class="mt-4 rounded-2xl border border-[#e8e0d4] bg-[#fffdf8] p-5">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-sm font-black text-[#17352c]">Uptime overview</p>
                                    <p class="mt-1 text-xs text-[#9aaba5]">Last 24 hours</p>
                                </div>
                                <span class="text-sm font-black text-[#4f7d58]">99.98%</span>
                            </div>
                            <div class="mt-5 flex h-20 items-end gap-1.5">
                                <div class="h-[58%] flex-1 rounded-t bg-[#b8d8d5]"></div>
                                <div class="h-[70%] flex-1 rounded-t bg-[#8fc4c0]"></div>
                                <div class="h-[63%] flex-1 rounded-t bg-[#8fc4c0]"></div>
                                <div class="h-[80%] flex-1 rounded-t bg-[#5fa8a8]"></div>
                                <div class="h-[74%] flex-1 rounded-t bg-[#5fa8a8]"></div>
                                <div class="h-[90%] flex-1 rounded-t bg-[#2f8f9d]"></div>
                                <div class="h-[84%] flex-1 rounded-t bg-[#2f8f9d]"></div>
                                <div class="h-[96%] flex-1 rounded-t bg-[#276f78]"></div>
                                <div class="h-[88%] flex-1 rounded-t bg-[#276f78]"></div>
                                <div class="h-[98%] flex-1 rounded-t bg-[#8e789f]"></div>
                                <div class="h-[94%] flex-1 rounded-t bg-[#8e789f]"></div>
                                <div class="h-full flex-1 rounded-t bg-[#5f8f67]"></div>
                            </div>
                        </div>

                        <div class="mt-4 space-y-2">
                            <div class="flex items-center justify-between rounded-xl border border-[#e8e0d4] bg-[#f7f1e6] p-4">
                                <div class="flex items-center gap-3">
                                    <span class="h-2.5 w-2.5 rounded-full bg-[#5f8f67]"></span>
                                    <span class="text-sm font-bold text-[#36534a]">example.com</span>
                                </div>
                                <span class="text-xs font-semibold text-[#7b8f88]">184 ms</span>
                            </div>
                            <div class="flex items-center justify-between rounded-xl border border-[#e8e0d4] bg-[#f7f1e6] p-4">
                                <div class="flex items-center gap-3">
                                    <span class="h-2.5 w-2.5 rounded-full bg-[#5f8f67]"></span>
                                    <span class="text-sm font-bold text-[#36534a]">mywebsite.com</span>
                                </div>
                                <span class="text-xs font-semibold text-[#7b8f88]">126 ms</span>
                            </div>
                            <div class="flex items-center justify-between rounded-xl border border-[#f0c9c9] bg-[#fae9e8] p-4">
                                <div class="flex items-center gap-3">
                                    <span class="h-2.5 w-2.5 rounded-full bg-[#d85b62]"></span>
                                    <span class="text-sm font-bold text-[#91343d]">api.example.com</span>
                                </div>
                                <span class="text-xs font-black text-[#a83e47]">DOWN</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TRUST BAR -->
<section class="border-y border-[#e8e0d4] bg-[#fffdf8]">
    <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-5 px-6 py-8 md:flex-row lg:px-8">
        <p class="text-sm font-semibold text-[#7b8f88]">Everything you need to keep your websites online.</p>
        <div class="flex flex-wrap justify-center gap-8 text-xs font-black uppercase tracking-widest text-[#9aaba5]">
            <span>Uptime</span><span>Performance</span><span>Alerts</span><span>Monitoring</span>
        </div>
    </div>
</section>

<!-- FEATURES -->
<section id="features" class="bg-[#fffdf8] py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-sm font-black uppercase tracking-[.2em] text-[#2f7f88]">Powerful monitoring</span>
            <h2 class="mt-4 text-4xl font-black tracking-tight text-[#17352c] sm:text-5xl">Everything under control.</h2>
            <p class="mt-5 text-lg leading-8 text-[#5f756d]">
                A simple and reliable platform to monitor your websites, understand performance and react quickly.
            </p>
        </div>

        <div class="mt-16 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            @php
                $features = [
                    ['icon'=>'⚡','title'=>'Real-time monitoring','text'=>'Continuously check your websites and know their current status.','bg'=>'#e8f4f2','color'=>'#2f7f88'],
                    ['icon'=>'◒','title'=>'Uptime tracking','text'=>'Track availability and understand how your websites perform over time.','bg'=>'#edf5ed','color'=>'#4f7d58'],
                    ['icon'=>'◉','title'=>'Instant alerts','text'=>'Detect problems and receive alerts so you can react immediately.','bg'=>'#fae9e8','color'=>'#a83e47'],
                    ['icon'=>'↯','title'=>'Performance','text'=>'Measure response time and identify slow websites before users do.','bg'=>'#f0eaf3','color'=>'#786487'],
                ];
            @endphp

            @foreach($features as $feature)
                <div class="group rounded-3xl border border-[#e8e0d4] bg-[#fffdf8] p-7 shadow-sm transition duration-300 hover:-translate-y-2 hover:shadow-xl">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl text-2xl font-black transition group-hover:scale-105"
                         style="background: {{ $feature['bg'] }}; color: {{ $feature['color'] }}">
                        {{ $feature['icon'] }}
                    </div>
                    <h3 class="mt-7 text-lg font-black text-[#17352c]">{{ $feature['title'] }}</h3>
                    <p class="mt-3 text-sm leading-6 text-[#5f756d]">{{ $feature['text'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section id="how-it-works" class="bg-[#f7f1e6] py-28">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <span class="text-sm font-black uppercase tracking-[.2em] text-[#2f7f88]">Simple workflow</span>
            <h2 class="mt-4 text-4xl font-black tracking-tight text-[#17352c] sm:text-5xl">Start monitoring in minutes.</h2>
            <p class="mt-5 text-lg text-[#5f756d]">No complicated configuration. Add your website and let SiteMonitor do the work.</p>
        </div>

        <div class="mt-20 grid gap-8 md:grid-cols-3">
            @foreach([
                ['01','Add your website','Add the website you want to monitor directly from your dashboard.','#2f8f9d'],
                ['02','We monitor it','SiteMonitor checks availability and response time automatically.','#8e789f'],
                ['03','Get alerted','Get notified when your website becomes unavailable or needs attention.','#5f8f67']
            ] as $step)
                <div class="rounded-3xl border border-[#e8e0d4] bg-[#fffdf8] p-8 text-center shadow-sm">
                    <div class="mx-auto flex h-20 w-20 items-center justify-center rounded-3xl text-2xl font-black text-white shadow-xl"
                         style="background: {{ $step[3] }}">{{ $step[0] }}</div>
                    <h3 class="mt-7 text-xl font-black text-[#17352c]">{{ $step[1] }}</h3>
                    <p class="mx-auto mt-3 max-w-sm text-sm leading-6 text-[#5f756d]">{{ $step[2] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- DASHBOARD -->
<section id="dashboard" class="bg-[#fffdf8] py-28">
    <div class="mx-auto grid max-w-7xl items-center gap-16 px-6 lg:grid-cols-2 lg:px-8">
        <div>
            <span class="text-sm font-black uppercase tracking-[.2em] text-[#2f7f88]">One powerful dashboard</span>
            <h2 class="mt-4 text-4xl font-black tracking-tight text-[#17352c] sm:text-5xl">Everything you need.</h2>
            <p class="mt-6 max-w-xl text-lg leading-8 text-[#5f756d]">
                Manage websites, monitor uptime, check performance and react to incidents from one clean interface.
            </p>

            <div class="mt-9 space-y-5">
                @foreach([
                    ['Monitor multiple websites','Keep all your websites organized in one place.'],
                    ['Track response time','Detect performance issues before they become serious.'],
                    ['Know when something goes wrong','Get the information you need to react quickly.']
                ] as $item)
                    <div class="flex gap-4">
                        <div class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-[#edf5ed] text-sm font-black text-[#4f7d58]">✓</div>
                        <div>
                            <p class="font-black text-[#17352c]">{{ $item[0] }}</p>
                            <p class="mt-1 text-sm text-[#5f756d]">{{ $item[1] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('register') }}"
               class="mt-10 inline-flex items-center rounded-xl bg-[#17352c] px-7 py-4 text-sm font-black text-white transition hover:-translate-y-1 hover:bg-[#234c3e]">
                Create your account <span class="ml-2">→</span>
            </a>
        </div>

        <div class="relative">
            <div class="absolute -inset-6 rounded-[3rem] bg-[#8e789f]/10 blur-3xl"></div>
            <div class="relative overflow-hidden rounded-3xl bg-[#17352c] p-5 shadow-2xl shadow-[#17352c]/20">
                <div class="rounded-2xl border border-white/10 bg-[#1e4035] p-5">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-xs text-[#9aaba5]">Dashboard</p>
                            <p class="mt-1 font-black text-white">Website overview</p>
                        </div>
                        <span class="rounded-lg bg-[#78a87d]/10 px-3 py-2 text-xs font-bold text-[#78a87d]">All systems operational</span>
                    </div>

                    <div class="mt-6 grid grid-cols-3 gap-3">
                        <div class="rounded-xl bg-[#fffdf8]/5 p-4">
                            <p class="text-xs text-[#9aaba5]">Websites</p><p class="mt-2 text-xl font-black text-white">12</p>
                        </div>
                        <div class="rounded-xl bg-[#78a87d]/5 p-4">
                            <p class="text-xs text-[#78a87d]">Online</p><p class="mt-2 text-xl font-black text-[#78a87d]">10</p>
                        </div>
                        <div class="rounded-xl bg-[#d85b62]/5 p-4">
                            <p class="text-xs text-[#e27b80]">Down</p><p class="mt-2 text-xl font-black text-[#e27b80]">2</p>
                        </div>
                    </div>

                    <div class="mt-4 rounded-xl border border-white/10 bg-[#fffdf8]/5 p-5">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-bold text-[#d7e1dc]">Uptime</span>
                            <span class="font-black text-[#78a87d]">99.98%</span>
                        </div>
                        <div class="mt-4 h-2 overflow-hidden rounded-full bg-white/10">
                            <div class="h-full w-[99%] rounded-full bg-gradient-to-r from-[#2f8f9d] to-[#78a87d]"></div>
                        </div>
                    </div>

                    <div class="mt-4 space-y-2">
                        @foreach([
                            ['example.com','184 ms','online'],
                            ['mywebsite.com','126 ms','online'],
                            ['api.example.com','DOWN','down']
                        ] as $site)
                            <div class="flex items-center justify-between rounded-xl bg-[#fffdf8]/[.035] p-4">
                                <div class="flex items-center gap-3">
                                    <span class="h-2.5 w-2.5 rounded-full {{ $site[2] === 'online' ? 'bg-[#78a87d]' : 'bg-[#d85b62]' }}"></span>
                                    <span class="text-sm font-bold {{ $site[2] === 'online' ? 'text-[#d7e1dc]' : 'text-[#f0a2a5]' }}">{{ $site[0] }}</span>
                                </div>
                                <span class="text-xs font-black {{ $site[2] === 'online' ? 'text-[#9aaba5]' : 'text-[#e27b80]' }}">{{ $site[1] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="bg-[#f7f1e6] px-6 py-28">
    <div class="relative mx-auto max-w-6xl overflow-hidden rounded-[2rem] bg-gradient-to-br from-[#2f8f9d] via-[#347f7e] to-[#8e789f] px-8 py-20 text-center shadow-2xl shadow-[#17352c]/20 sm:px-16">
        <div class="pointer-events-none absolute -left-24 -top-24 h-80 w-80 rounded-full bg-white/10 blur-3xl"></div>
        <div class="pointer-events-none absolute -bottom-32 -right-20 h-80 w-80 rounded-full bg-white/10 blur-3xl"></div>

        <div class="relative mx-auto max-w-2xl">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-white/15 text-white backdrop-blur">
                <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none">
                    <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2 class="mt-8 text-4xl font-black tracking-tight text-white sm:text-5xl">Don't wait for your users to tell you.</h2>
            <p class="mt-5 text-lg leading-8 text-white/80">
                Monitor your websites, detect downtime and stay ahead of problems with SiteMonitor.
            </p>
            <a href="{{ route('register') }}"
               class="mt-9 inline-flex items-center rounded-xl bg-[#fffdf8] px-8 py-4 text-sm font-black text-[#276c75] shadow-xl transition hover:-translate-y-1 hover:bg-white">
                Start monitoring for free <span class="ml-2 text-lg">→</span>
            </a>
        </div>
    </div>
</section>

</main>

<!-- FOOTER -->
<footer class="border-t border-[#29483d] bg-[#17352c]">
    <div class="mx-auto max-w-7xl px-6 py-14 lg:px-8">
        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">
            <div class="lg:col-span-2">
                <a href="{{ url('/') }}" class="inline-flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#2f8f9d] text-white">
                        <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none">
                            <path d="M13 2L4 13.5H11L10 22L20 9.5H13L13 2Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-xl font-black text-white">SiteMonitor</div>
                        <div class="text-[10px] font-bold uppercase tracking-[.18em] text-[#9aaba5]">Website Monitoring</div>
                    </div>
                </a>
                <p class="mt-5 max-w-md text-sm leading-7 text-[#9aaba5]">
                    Monitor your websites, track uptime, detect downtime and stay informed with reliable monitoring and alerts.
                </p>
                <div class="mt-6 inline-flex items-center gap-2 rounded-full border border-[#78a87d]/10 bg-[#78a87d]/5 px-4 py-2 text-xs font-bold text-[#78a87d]">
                    <span class="h-2 w-2 rounded-full bg-[#78a87d]"></span>
                    Monitoring services available
                </div>
            </div>

            <div>
                <h3 class="text-sm font-black uppercase tracking-wider text-white">Quick links</h3>
                <div class="mt-5 space-y-3">
                    <a href="#features" class="block text-sm text-[#9aaba5] hover:text-white">Features</a>
                    <a href="#how-it-works" class="block text-sm text-[#9aaba5] hover:text-white">How it works</a>
                    <a href="#dashboard" class="block text-sm text-[#9aaba5] hover:text-white">Dashboard</a>
                    <a href="{{ route('login') }}" class="block text-sm text-[#9aaba5] hover:text-white">Sign in</a>
                    <a href="{{ route('register') }}" class="block text-sm text-[#9aaba5] hover:text-white">Create account</a>
                </div>
            </div>

            <div>
                <h3 class="text-sm font-black uppercase tracking-wider text-white">Contact</h3>
                <div class="mt-5 space-y-4">
                    <a href="mailto:sitemonitor.contact@gmail.com" class="block text-sm text-[#9aaba5] hover:text-white">
                        sitemonitor.contact@gmail.com
                    </a>
                    <a href="https://wa.me/212720362059" target="_blank" rel="noopener noreferrer"
                       class="block text-sm text-[#9aaba5] hover:text-white">
                        WhatsApp · +212 720 362 059
                    </a>
                </div>
            </div>
        </div>

        <div class="mt-12 border-t border-white/10"></div>
        <div class="mt-6 flex flex-col gap-4 text-sm md:flex-row md:items-center md:justify-between">
            <p class="text-[#7b8f88]">© {{ date('Y') }} SiteMonitor. All rights reserved.</p>
            <div class="flex items-center gap-4 text-[#7b8f88]">
                <span>Website Monitoring Platform</span>
                <span class="h-1 w-1 rounded-full bg-[#557268]"></span>
               
            </div>
        </div>
    </div>
</footer>

</body>
</html>
