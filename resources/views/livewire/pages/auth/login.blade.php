<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        if (auth()->user()->role === 'admin') {
            $this->redirectRoute('admin.dashboard', navigate: true);
        } else {
            $this->redirectRoute('dashboard', navigate: true);
        }
    }
};
?>

<div
    x-data="{ showPassword: false }"
    class="min-h-screen overflow-hidden bg-[#F7F1E6]"
>
    <div class="min-h-screen lg:grid lg:grid-cols-2">

        {{-- ========================================================= --}}
        {{-- LEFT SIDE --}}
        {{-- ========================================================= --}}

        <section
            class="relative hidden overflow-hidden lg:flex lg:flex-col"
            style="background: linear-gradient(145deg, #EAF5F0 0%, #F7F1E6 48%, #F1EDF4 100%);"
        >
            {{-- Soft blue glow --}}
            <div
                class="pointer-events-none absolute -left-32 -top-32 h-[420px] w-[420px] rounded-full bg-[#8E789F]/30 blur-[90px]"
            ></div>

            {{-- Soft cream glow --}}
            <div
                class="pointer-events-none absolute -right-32 top-20 h-[360px] w-[360px] rounded-full bg-[#F7F1E6]/45 blur-[100px]"
            ></div>

            {{-- Soft green glow --}}
            <div
                class="pointer-events-none absolute -bottom-40 left-1/3 h-[420px] w-[420px] rounded-full bg-[#5F8F67]/25 blur-[110px]"
            ></div>

            {{-- Very subtle decorative lines --}}
            <div
                class="pointer-events-none absolute inset-0 opacity-[0.035]"
                style="
                    background-image:
                        linear-gradient(#17352C 1px, transparent 1px),
                        linear-gradient(90deg, #17352C 1px, transparent 1px);
                    background-size: 44px 44px;
                "
            ></div>

            <div class="relative z-10 flex min-h-screen flex-col px-10 py-10 xl:px-16">

                {{-- LOGO --}}
                <a
                    href="{{ url('/') }}"
                    class="group inline-flex w-fit items-center gap-3"
                >
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#2F8F9D] text-white shadow-lg shadow-[#2F8F9D]/20 transition duration-300 group-hover:-translate-y-0.5 group-hover:shadow-xl"
                    >
                        <svg
                            class="h-5 w-5"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M13 2L3 14h9l-1 8 10-12h-9l1-8Z"
                            />
                        </svg>
                    </div>

                    <div>
                        <span
                            class="block text-xl font-extrabold tracking-tight text-[#17352C]"
                        >
                            SiteMonitor
                        </span>

                        <span
                            class="block text-[9px] font-semibold uppercase tracking-[0.2em] text-[#6F8179]"
                        >
                            Website monitoring
                        </span>
                    </div>
                </a>

                {{-- MAIN CONTENT --}}
                <div class="my-auto max-w-xl py-16">

                    {{-- Status --}}
                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-[#C9DED2] bg-[#EDF6F0] px-4 py-2 text-sm font-semibold text-[#4D7F63]"
                    >
                        <span class="relative flex h-2.5 w-2.5">
                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-[#7EAE91] opacity-50"
                            ></span>

                            <span
                                class="relative inline-flex h-2.5 w-2.5 rounded-full bg-[#5F8F67]"
                            ></span>
                        </span>

                        Monitoring services available
                    </div>

                    {{-- Heading --}}
                    <h1
                        class="mt-8 text-5xl font-black leading-[1.05] tracking-tight text-[#17352C] xl:text-6xl"
                    >
                        Keep your websites

                        <span
                            class="mt-2 block bg-gradient-to-r from-[#2F8F9D] via-[#6D9EA6] to-[#5F8F67] bg-clip-text text-transparent"
                        >
                            running smoothly.
                        </span>
                    </h1>

                    <p
                        class="mt-7 max-w-xl text-lg leading-8 text-[#65756F]"
                    >
                        Monitor uptime, performance and availability from one
                        clean dashboard. Detect problems early and stay in
                        control of your websites.
                    </p>

                    {{-- FEATURES --}}
                    <div class="mt-10 space-y-5">

                        {{-- Feature 1 --}}
                        <div class="group flex items-center gap-4">
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-[#D6E7E4] bg-[#EEF6F4] text-[#2F8F9D] transition duration-200 group-hover:bg-[#E4F1EE]"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13 10V3L4 14h7v7l9-11h-7Z"
                                    />
                                </svg>
                            </div>

                            <div>
                                <p class="font-semibold text-[#304C43]">
                                    Real-time monitoring
                                </p>

                                <p class="mt-0.5 text-sm text-[#788781]">
                                    Know instantly when something goes wrong.
                                </p>
                            </div>
                        </div>

                        {{-- Feature 2 --}}
                        <div class="group flex items-center gap-4">
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-[#D7E6D8] bg-[#EEF5EA] text-[#5F8F67] transition duration-200 group-hover:bg-[#E4F0E2]"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M3 3v18h18"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m7 15 4-4 3 3 5-7"
                                    />
                                </svg>
                            </div>

                            <div>
                                <p class="font-semibold text-[#304C43]">
                                    Uptime & performance
                                </p>

                                <p class="mt-0.5 text-sm text-[#788781]">
                                    Track availability and response time.
                                </p>
                            </div>
                        </div>

                        {{-- Feature 3 --}}
                        <div class="group flex items-center gap-4">
                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-[#E7DCE8] bg-[#F7F1E6] text-[#9A7890] transition duration-200 group-hover:bg-[#F2E8E0]"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0 1 18 14.158V11a6 6 0 0 0-12 0v3.159c0 .538-.214 1.055-.595 1.436L4 17h5"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 21h6"
                                    />
                                </svg>
                            </div>

                            <div>
                                <p class="font-semibold text-[#304C43]">
                                    Smart alerts
                                </p>

                                <p class="mt-0.5 text-sm text-[#788781]">
                                    Stay informed about important incidents.
                                </p>
                            </div>
                        </div>

                    </div>

                    {{-- MINI DASHBOARD --}}
                    <div
                        class="mt-10 rounded-2xl border border-white/80 bg-white/65 p-5 shadow-[0_20px_60px_rgba(63,107,125,0.10)] backdrop-blur-md"
                    >
                        <div class="flex items-center justify-between">
                            <div>
                                <p
                                    class="text-[10px] font-bold uppercase tracking-[0.18em] text-[#8aa0aa]"
                                >
                                    Monitoring overview
                                </p>

                                <p class="mt-1 font-semibold text-[#304C43]">
                                    Website status
                                </p>
                            </div>

                            <div
                                class="flex items-center gap-2 rounded-full border border-[#cde8dc] bg-[#f1faf6] px-3 py-1.5 text-xs font-semibold text-[#438b72]"
                            >
                                <span class="h-1.5 w-1.5 rounded-full bg-[#59ad8e]"></span>
                                Live
                            </div>
                        </div>

                        <div class="mt-5 grid grid-cols-3 gap-3">

                            <div
                                class="rounded-xl border border-[#E4EAE6] bg-white/70 p-3"
                            >
                                <p class="text-[11px] text-[#89978F]">
                                    Websites
                                </p>

                                <p class="mt-1 text-xl font-black text-[#304C43]">
                                    12
                                </p>
                            </div>

                            <div
                                class="rounded-xl border border-[#DCEBDD] bg-[#EFF6ED] p-3"
                            >
                                <p class="text-[11px] text-[#5F8F67]">
                                    Online
                                </p>

                                <p class="mt-1 text-xl font-black text-[#5F8F67]">
                                    10
                                </p>
                            </div>

                            <div
                                class="rounded-xl border border-[#E6E0EA] bg-[#F4F0F5] p-3"
                            >
                                <p class="text-[11px] text-[#8E789F]">
                                    Uptime
                                </p>

                                <p class="mt-1 text-xl font-black text-[#66566F]">
                                    99.9%
                                </p>
                            </div>

                        </div>
                    </div>

                </div>

                {{-- Footer --}}
                <div
                    class="flex items-center justify-between border-t border-[#D8E2DC] pt-6 text-xs text-[#89978F]"
                >
                    <span>
                        © {{ date('Y') }} SiteMonitor
                    </span>

                    <span>
                        Monitoring made simple.
                    </span>
                </div>

            </div>
        </section>


        {{-- ========================================================= --}}
        {{-- RIGHT SIDE - LOGIN --}}
        {{-- ========================================================= --}}

        <section
            class="relative flex min-h-screen flex-col overflow-hidden bg-[#FCFAF6]"
        >

            {{-- Very soft decorative background --}}
            <div
                class="pointer-events-none absolute -right-40 -top-40 h-[420px] w-[420px] rounded-full bg-[#D8ECE9]/35 blur-[100px]"
            ></div>

            <div
                class="pointer-events-none absolute -bottom-40 -left-40 h-[400px] w-[400px] rounded-full bg-[#DDEBDD]/30 blur-[100px]"
            ></div>


            {{-- Top navigation --}}
            <div
                class="relative z-10 flex items-center justify-end px-6 py-6 sm:px-10"
            >
                <a
                    href="{{ url('/') }}"
                    class="rounded-lg px-3 py-2 text-sm font-semibold text-[#6F7C75] transition hover:bg-[#EDF2EE] hover:text-[#2F8F9D]"
                >
                    ← Back to home
                </a>
            </div>


            {{-- Login container --}}
            <div
                class="relative z-10 flex flex-1 items-center justify-center px-6 pb-14 sm:px-10"
            >
                <div
                    class="w-full max-w-md rounded-[2rem] border border-[#E4DDD4] bg-white/75 p-7 shadow-[0_24px_80px_rgba(23,53,44,0.10)] backdrop-blur-xl sm:p-9"
                >

                    {{-- MOBILE LOGO --}}
                    <div class="mb-10 lg:hidden">
                        <a
                            href="{{ url('/') }}"
                            class="inline-flex items-center gap-3"
                        >
                            <div
                                class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#2F8F9D] text-white shadow-lg shadow-[#2F8F9D]/20"
                            >
                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13 2L3 14h9l-1 8 10-12h-9l1-8Z"
                                    />
                                </svg>
                            </div>

                            <div>
                                <span
                                    class="block text-xl font-extrabold text-[#304C43]"
                                >
                                    SiteMonitor
                                </span>

                                <span
                                    class="block text-[9px] font-semibold uppercase tracking-[0.2em] text-[#89978F]"
                                >
                                    Website monitoring
                                </span>
                            </div>
                        </a>
                    </div>


                    {{-- LOGIN HEADER --}}
                    <div class="mb-8">
                        <div
                            class="mb-4 inline-flex items-center gap-2 rounded-full border border-[#DED5E5] bg-[#F3EEF5] px-3 py-1.5 text-xs font-bold text-[#806C89]"
                        >
                            <span
                                class="h-1.5 w-1.5 rounded-full bg-[#8E789F]"
                            ></span>

                            Secure access
                        </div>

                        <h2
                            class="text-3xl font-black tracking-tight text-[#17352C] sm:text-4xl"
                        >
                            Access your dashboard
                        </h2>

                        <p
                            class="mt-3 text-base leading-7 text-[#687870]"
                        >
                            Sign in to manage your websites, review monitoring
                            activity and stay informed.
                        </p>
                    </div>


                    {{-- Session status --}}
                    <x-auth-session-status
                        class="mb-5"
                        :status="session('status')"
                    />


                    {{-- FORM --}}
                    <form
                        wire:submit="login"
                        class="space-y-5"
                    >

                        {{-- Email --}}
                        <div>
                            <label
                                for="email"
                                class="mb-2 block text-sm font-semibold text-[#40574F]"
                            >
                                Email address
                            </label>

                            <div class="relative">
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4"
                                >
                                    <svg
                                        class="h-5 w-5 text-[#9AA59E]"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                        />
                                    </svg>
                                </div>

                                <input
                                    wire:model="form.email"
                                    id="email"
                                    type="email"
                                    name="email"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="you@example.com"
                                    class="block w-full rounded-2xl border border-[#D8E2DC] bg-white py-3.5 pl-12 pr-4 text-[#304C43] shadow-[0_5px_20px_rgba(60,100,120,0.04)] outline-none transition duration-200 placeholder:text-[#A7B0AA] focus:border-[#2F8F9D] focus:ring-4 focus:ring-[#2F8F9D]/10"
                                />
                            </div>

                            <x-input-error
                                :messages="$errors->get('form.email')"
                                class="mt-2"
                            />
                        </div>


                        {{-- Password --}}
                        <div>
                            <div class="mb-2 flex items-center justify-between">
                                <label
                                    for="password"
                                    class="text-sm font-semibold text-[#40574F]"
                                >
                                    Password
                                </label>
                            </div>

                            <div class="relative">
                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4"
                                >
                                    <svg
                                        class="h-5 w-5 text-[#9AA59E]"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                        />
                                    </svg>
                                </div>

                                <input
                                    wire:model="form.password"
                                    id="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    :type="showPassword ? 'text' : 'password'"
                                    placeholder="Enter your password"
                                    class="block w-full rounded-2xl border border-[#D8E2DC] bg-white py-3.5 pl-12 pr-12 text-[#304C43] shadow-[0_5px_20px_rgba(60,100,120,0.04)] outline-none transition duration-200 placeholder:text-[#A7B0AA] focus:border-[#2F8F9D] focus:ring-4 focus:ring-[#2F8F9D]/10"
                                />

                                {{-- Password toggle --}}
                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-[#9AA59E] transition hover:text-[#7C6388]"
                                    :aria-label="showPassword ? 'Hide password' : 'Show password'"
                                >
                                    <svg
                                        x-show="!showPassword"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                        />
                                    </svg>

                                    <svg
                                        x-show="showPassword"
                                        x-cloak
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029M6.42 6.42A9.97 9.97 0 0112 5c4.477 0 8.268 2.943 9.542 7a10.02 10.02 0 01-4.132 5.411M6.42 6.42L3 3m3.42 3.42l8.16 8.16M17.41 17.41L21 21"
                                        />
                                    </svg>
                                </button>
                            </div>

                            <x-input-error
                                :messages="$errors->get('form.password')"
                                class="mt-2"
                            />
                        </div>


                        {{-- Remember --}}
                        <div>
                            <label
                                for="remember"
                                class="flex cursor-pointer items-center gap-3"
                            >
                                <input
                                    wire:model="form.remember"
                                    id="remember"
                                    type="checkbox"
                                    name="remember"
                                    class="h-4 w-4 cursor-pointer rounded border-[#C8D5CE] text-[#2F8F9D] focus:ring-[#2F8F9D]"
                                />

                                <span class="text-sm text-[#687870]">
                                    Remember me
                                </span>
                            </label>
                        </div>


                        {{-- LOGIN BUTTON --}}
                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="group flex w-full items-center justify-center gap-3 rounded-2xl bg-gradient-to-r from-[#2F8F9D] to-[#5F8F67] px-6 py-4 text-sm font-bold text-white shadow-lg shadow-[#2F8F9D]/15 transition duration-200 hover:-translate-y-0.5 hover:from-[#267985] hover:to-[#4F7F59] hover:shadow-xl active:translate-y-0 disabled:cursor-not-allowed disabled:opacity-70"
                        >
                            <span
                                wire:loading.remove
                                wire:target="login"
                                class="flex items-center gap-2"
                            >
                                Sign in to SiteMonitor

                                <span
                                    class="text-lg transition-transform duration-200 group-hover:translate-x-1"
                                >
                                    →
                                </span>
                            </span>

                            <span
                                wire:loading.flex
                                wire:target="login"
                                class="items-center gap-3"
                            >
                                <svg
                                    class="h-5 w-5 animate-spin"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <circle
                                        class="opacity-25"
                                        cx="12"
                                        cy="12"
                                        r="10"
                                        stroke="currentColor"
                                        stroke-width="4"
                                    ></circle>

                                    <path
                                        class="opacity-75"
                                        fill="currentColor"
                                        d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"
                                    ></path>
                                </svg>

                                Signing in...
                            </span>
                        </button>


                        {{-- Security --}}
                        <div class="flex items-center justify-center gap-2 pt-1">
                            <svg
                                class="h-4 w-4 text-[#5F8F67]"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                                />
                            </svg>

                            <span class="text-xs font-medium text-[#89978F]">
                                Secure connection
                            </span>
                        </div>

                    </form>


                    {{-- DIVIDER --}}
                    <div class="my-8 flex items-center gap-4">
                        <div class="h-px flex-1 bg-[#DDE4DE]"></div>

                        <span class="text-xs font-medium text-[#9AA59E]">
                            OR
                        </span>

                        <div class="h-px flex-1 bg-[#DDE4DE]"></div>
                    </div>


                    {{-- REGISTER --}}
                    <div
                        class="rounded-2xl border border-[#DDDAD5] bg-white/80 p-5 text-center shadow-[0_8px_30px_rgba(70,110,125,0.05)]"
                    >
                        <p class="text-sm text-[#687870]">
                            Don't have an account?
                        </p>

                        <a
                            href="{{ route('register') }}"
                            wire:navigate
                            class="mt-2 inline-flex items-center gap-1 text-sm font-bold text-[#7C6388] transition hover:text-[#6D5479] hover:underline"
                        >
                            Create your account

                            <span>
                                →
                            </span>
                        </a>
                    </div>


                    {{-- Bottom text --}}
                    <div class="mt-8 text-center">
                        <p class="text-xs leading-5 text-[#8D9891]">
                            Your monitoring data is kept private and your
                            account is protected.
                        </p>
                    </div>

                </div>
            </div>

        </section>

    </div>

    {{-- Alpine helper --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</div>