<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register(): void
    {
        $validated = $this->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:' . User::class,
            ],

            'password' => [
                'required',
                'string',
                'confirmed',
                Rules\Password::defaults(),
            ],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(
            new Registered(
                $user = User::create($validated)
            )
        );

        Auth::login($user);

        session()->regenerate();

        $this->redirect(
            route('dashboard', absolute: false),
            navigate: true
        );
    }
};
?>

<div
    x-data="{
        showPassword: false,
        showConfirmation: false
    }"
    class="min-h-screen bg-[#F7F1E6]"
>

    <div class="min-h-screen lg:grid lg:grid-cols-2">

        {{-- ========================================================= --}}
        {{-- LEFT SIDE --}}
        {{-- ========================================================= --}}

        <section
            class="relative hidden overflow-hidden bg-gradient-to-br from-[#F7F3EA] via-[#F4F7F2] to-[#FBF7EF] lg:flex lg:flex-col"
        >

            {{-- Soft blue glow --}}
            <div
                class="pointer-events-none absolute -left-32 -top-32 h-96 w-96 rounded-full bg-[#8E789F]/20 blur-3xl"
            ></div>

            {{-- Soft green glow --}}
            <div
                class="pointer-events-none absolute -bottom-40 -right-32 h-[500px] w-[500px] rounded-full bg-[#5F8F67]/20 blur-3xl"
            ></div>

            {{-- Cream glow --}}
            <div
                class="pointer-events-none absolute left-1/2 top-1/2 h-[500px] w-[500px] -translate-x-1/2 -translate-y-1/2 rounded-full bg-[#F7F1E6]/70 blur-3xl"
            ></div>

            {{-- Very subtle decorative circles --}}
            <div
                class="pointer-events-none absolute right-10 top-20 h-32 w-32 rounded-full border border-[#8E789F]/30"
            ></div>

            <div
                class="pointer-events-none absolute right-20 top-32 h-20 w-20 rounded-full border border-[#5F8F67]/30"
            ></div>

            {{-- Content --}}
            <div
                class="relative z-10 flex min-h-screen flex-col px-10 py-10 xl:px-16"
            >

                {{-- ================================================= --}}
                {{-- LOGO --}}
                {{-- ================================================= --}}

                <a
                    href="{{ url('/') }}"
                    class="group inline-flex w-fit items-center gap-3"
                >

                    {{-- Logo icon --}}
                    <div
                        class="flex h-11 w-11 items-center justify-center rounded-2xl bg-[#2F8F9D] text-white shadow-lg shadow-[#2F8F9D]/20 transition duration-300 group-hover:-translate-y-0.5 group-hover:bg-[#287D89]"
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
                            class="block text-[9px] font-semibold uppercase tracking-[0.2em] text-[#89968F]"
                        >
                            Website monitoring
                        </span>

                    </div>

                </a>


                {{-- ================================================= --}}
                {{-- MAIN CONTENT --}}
                {{-- ================================================= --}}

                <div class="my-auto max-w-xl py-16">

                    {{-- Status --}}
                    <div
                        class="inline-flex items-center gap-2 rounded-full border border-[#5F8F67]/20 bg-white/80 px-4 py-2 text-sm font-semibold text-[#5F8F67] shadow-sm backdrop-blur-sm"
                    >

                        <span class="relative flex h-2.5 w-2.5">

                            <span
                                class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-50"
                            ></span>

                            <span
                                class="relative inline-flex h-2.5 w-2.5 rounded-full bg-[#5F8F67]"
                            ></span>

                        </span>

                        Monitoring made simple

                    </div>


                    {{-- Heading --}}
                    <h1
                        class="mt-8 text-5xl font-black leading-[1.05] tracking-tight text-[#17352C] xl:text-6xl"
                    >

                        Start monitoring
                        your websites.

                        <span
                            class="mt-2 block bg-gradient-to-r from-blue-600 via-[#8E789F] to-[#5F8F67] bg-clip-text text-transparent"
                        >
                            Stay informed.
                        </span>

                    </h1>


                    <p
                        class="mt-7 max-w-xl text-lg leading-8 text-[#667A72]"
                    >
                        Create your SiteMonitor account and get a clear view
                        of your website availability, uptime and performance
                        from one simple dashboard.
                    </p>


                    {{-- ================================================= --}}
                    {{-- FEATURES --}}
                    {{-- ================================================= --}}

                    <div class="mt-10 space-y-5">

                        {{-- Feature 1 --}}
                        <div
                            class="group flex items-center gap-4"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-[#2F8F9D]/20 bg-white text-[#2F8F9D] shadow-sm transition duration-200 group-hover:-translate-y-0.5 group-hover:border-[#2F8F9D]/30 group-hover:shadow-md"
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

                                <p class="font-semibold text-[#25483D]">
                                    Real-time monitoring
                                </p>

                                <p class="mt-0.5 text-sm text-[#667A72]">
                                    Know instantly when something goes wrong.
                                </p>

                            </div>

                        </div>


                        {{-- Feature 2 --}}
                        <div
                            class="group flex items-center gap-4"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-[#5F8F67]/20 bg-white text-[#5F8F67] shadow-sm transition duration-200 group-hover:-translate-y-0.5 group-hover:border-[#5F8F67]/30 group-hover:shadow-md"
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

                                <p class="font-semibold text-[#25483D]">
                                    Uptime & performance
                                </p>

                                <p class="mt-0.5 text-sm text-[#667A72]">
                                    Track availability and response time.
                                </p>

                            </div>

                        </div>


                        {{-- Feature 3 --}}
                        <div
                            class="group flex items-center gap-4"
                        >

                            <div
                                class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl border border-[#D85B62]/20 bg-white text-[#D85B62] shadow-sm transition duration-200 group-hover:-translate-y-0.5 group-hover:border-[#D85B62]/30 group-hover:shadow-md"
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

                                <p class="font-semibold text-[#25483D]">
                                    Instant alerts
                                </p>

                                <p class="mt-0.5 text-sm text-[#667A72]">
                                    Stay informed about important incidents.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- MINI DASHBOARD --}}
                    {{-- ================================================= --}}

                    <div
                        class="mt-10 rounded-2xl border border-[#17352C]/10 bg-white/80 p-5 shadow-lg shadow-slate-200/30 backdrop-blur-md"
                    >

                        <div class="flex items-center justify-between">

                            <div>

                                <p
                                    class="text-[10px] font-bold uppercase tracking-[0.15em] text-[#89968F]"
                                >
                                    Monitoring overview
                                </p>

                                <p
                                    class="mt-1 font-semibold text-[#25483D]"
                                >
                                    Website status
                                </p>

                            </div>

                            <div
                                class="flex items-center gap-2 rounded-full bg-[#5F8F67]/10 px-3 py-1.5 text-xs font-semibold text-[#5F8F67]"
                            >

                                <span
                                    class="h-1.5 w-1.5 rounded-full bg-[#5F8F67]"
                                ></span>

                                Live

                            </div>

                        </div>


                        <div class="mt-5 grid grid-cols-3 gap-3">

                            <div
                                class="rounded-xl border border-[#17352C]/10 bg-[#F7F1E6] p-3"
                            >

                                <p class="text-[11px] text-[#89968F]">
                                    Websites
                                </p>

                                <p
                                    class="mt-1 text-xl font-black text-[#25483D]"
                                >
                                    12
                                </p>

                            </div>


                            <div
                                class="rounded-xl border border-[#5F8F67]/20 bg-[#5F8F67]/10/70 p-3"
                            >

                                <p class="text-[11px] text-[#5F8F67]">
                                    Online
                                </p>

                                <p
                                    class="mt-1 text-xl font-black text-[#5F8F67]"
                                >
                                    10
                                </p>

                            </div>


                            <div
                                class="rounded-xl border border-[#2F8F9D]/20 bg-[#2F8F9D]/10/70 p-3"
                            >

                                <p class="text-[11px] text-[#2F8F9D]">
                                    Uptime
                                </p>

                                <p
                                    class="mt-1 text-xl font-black text-[#25483D]"
                                >
                                    99.9%
                                </p>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- Footer --}}
                <div
                    class="flex items-center justify-between border-t border-[#17352C]/10/70 pt-6 text-xs text-[#89968F]"
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
        {{-- RIGHT SIDE --}}
        {{-- ========================================================= --}}

        <section
            class="relative flex min-h-screen flex-col overflow-hidden bg-[#F7F1E6]"
        >

            {{-- Very subtle blue background --}}
            <div
                class="pointer-events-none absolute -right-32 -top-32 h-72 w-72 rounded-full bg-[#2F8F9D]/10 blur-3xl"
            ></div>

            {{-- Very subtle green background --}}
            <div
                class="pointer-events-none absolute -bottom-32 -left-32 h-72 w-72 rounded-full bg-[#5F8F67]/15/25 blur-3xl"
            ></div>


            {{-- Top navigation --}}
            <div
                class="relative z-10 flex items-center justify-end px-6 py-6 sm:px-10"
            >

                <a
                    href="{{ url('/') }}"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-[#667A72] transition hover:text-[#2F8F9D]"
                >

                    <span>
                        ←
                    </span>

                    Back to home

                </a>

            </div>


            {{-- Register container --}}
            <div
                class="relative z-10 flex flex-1 items-center justify-center px-6 pb-14 sm:px-10"
            >

                <div class="w-full max-w-md">


                    {{-- ================================================= --}}
                    {{-- MOBILE LOGO --}}
                    {{-- ================================================= --}}

                    <div class="mb-8 lg:hidden">

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
                                    class="block text-xl font-extrabold text-[#17352C]"
                                >
                                    SiteMonitor
                                </span>

                                <span
                                    class="block text-[9px] font-semibold uppercase tracking-[0.2em] text-[#89968F]"
                                >
                                    Website monitoring
                                </span>

                            </div>

                        </a>

                    </div>


                    {{-- ================================================= --}}
                    {{-- HEADER --}}
                    {{-- ================================================= --}}

                    <div class="mb-7">

                        {{-- Professional badge --}}
                        <div
                            class="mb-4 inline-flex items-center gap-2 rounded-full border border-[#2F8F9D]/20 bg-[#2F8F9D]/10 px-3 py-1.5 text-xs font-bold text-[#2F8F9D]"
                        >

                            <svg
                                class="h-3.5 w-3.5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"
                                />

                                <circle
                                    cx="9"
                                    cy="7"
                                    r="4"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19 8v6M22 11h-6"
                                />
                            </svg>

                            Create your account

                        </div>


                        {{-- Professional title --}}
                        <div class="flex items-start gap-3">

                            <div
                                class="mt-1 flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-gradient-to-br from-[#2F8F9D] to-[#8E789F] text-white shadow-md shadow-[#2F8F9D]/20"
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
                                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2Z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M8 11V7a4 4 0 018 0v4"
                                    />

                                </svg>

                            </div>


                            <div>

                                <h2
                                    class="text-3xl font-black tracking-tight text-[#17352C] sm:text-4xl"
                                >
                                    Create your account
                                </h2>

                                <p
                                    class="mt-2 text-base leading-7 text-[#667A72]"
                                >
                                    Set up your workspace and start monitoring
                                    your websites with confidence.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- FORM --}}
                    {{-- ================================================= --}}

                    <form
                        wire:submit="register"
                        class="space-y-4"
                    >

                        {{-- Name --}}
                        <div>

                            <label
                                for="name"
                                class="mb-2 block text-sm font-semibold text-[#36564C]"
                            >
                                Full name
                            </label>

                            <div class="relative">

                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4"
                                >

                                    <svg
                                        class="h-5 w-5 text-[#89968F]"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0Z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M5 21a7 7 0 0114 0"
                                        />
                                    </svg>

                                </div>

                                <input
                                    wire:model="name"
                                    id="name"
                                    type="text"
                                    name="name"
                                    required
                                    autofocus
                                    autocomplete="name"
                                    placeholder="Your full name"
                                    class="block w-full rounded-2xl border border-[#17352C]/10 bg-white py-3.5 pl-12 pr-4 text-[#17352C] shadow-sm outline-none transition duration-200 placeholder:text-[#89968F] hover:border-slate-300 focus:border-[#2F8F9D] focus:ring-4 focus:ring-[#2F8F9D]/15"
                                />

                            </div>

                            <x-input-error
                                :messages="$errors->get('name')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Email --}}
                        <div>

                            <label
                                for="email"
                                class="mb-2 block text-sm font-semibold text-[#36564C]"
                            >
                                Email address
                            </label>

                            <div class="relative">

                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4"
                                >

                                    <svg
                                        class="h-5 w-5 text-[#89968F]"
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
                                            d="M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2Z"
                                        />

                                    </svg>

                                </div>

                                <input
                                    wire:model="email"
                                    id="email"
                                    type="email"
                                    name="email"
                                    required
                                    autocomplete="username"
                                    placeholder="you@example.com"
                                    class="block w-full rounded-2xl border border-[#17352C]/10 bg-white py-3.5 pl-12 pr-4 text-[#17352C] shadow-sm outline-none transition duration-200 placeholder:text-[#89968F] hover:border-slate-300 focus:border-[#2F8F9D] focus:ring-4 focus:ring-[#2F8F9D]/15"
                                />

                            </div>

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Password --}}
                        <div>

                            <label
                                for="password"
                                class="mb-2 block text-sm font-semibold text-[#36564C]"
                            >
                                Password
                            </label>

                            <div class="relative">

                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4"
                                >

                                    <svg
                                        class="h-5 w-5 text-[#89968F]"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 15v2"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6 21h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2Z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8 11V7a4 4 0 018 0v4"
                                        />

                                    </svg>

                                </div>

                                <input
                                    wire:model="password"
                                    id="password"
                                    name="password"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Create a password"
                                    :type="showPassword ? 'text' : 'password'"
                                    class="block w-full rounded-2xl border border-[#17352C]/10 bg-white py-3.5 pl-12 pr-12 text-[#17352C] shadow-sm outline-none transition duration-200 placeholder:text-[#89968F] hover:border-slate-300 focus:border-[#2F8F9D] focus:ring-4 focus:ring-[#2F8F9D]/15"
                                />

                                <button
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-[#89968F] transition hover:text-[#2F8F9D]"
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
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7Z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0Z"
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
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>


                        {{-- Confirm password --}}
                        <div>

                            <label
                                for="password_confirmation"
                                class="mb-2 block text-sm font-semibold text-[#36564C]"
                            >
                                Confirm password
                            </label>

                            <div class="relative">

                                <div
                                    class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4"
                                >

                                    <svg
                                        class="h-5 w-5 text-[#89968F]"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 15v2"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M6 21h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2Z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M8 11V7a4 4 0 018 0v4"
                                        />

                                    </svg>

                                </div>

                                <input
                                    wire:model="password_confirmation"
                                    id="password_confirmation"
                                    name="password_confirmation"
                                    required
                                    autocomplete="new-password"
                                    placeholder="Confirm your password"
                                    :type="showConfirmation ? 'text' : 'password'"
                                    class="block w-full rounded-2xl border border-[#17352C]/10 bg-white py-3.5 pl-12 pr-12 text-[#17352C] shadow-sm outline-none transition duration-200 placeholder:text-[#89968F] hover:border-slate-300 focus:border-[#2F8F9D] focus:ring-4 focus:ring-[#2F8F9D]/15"
                                />

                                <button
                                    type="button"
                                    @click="showConfirmation = !showConfirmation"
                                    class="absolute inset-y-0 right-0 flex items-center pr-4 text-[#89968F] transition hover:text-[#2F8F9D]"
                                    :aria-label="showConfirmation ? 'Hide confirmation password' : 'Show confirmation password'"
                                >

                                    <svg
                                        x-show="!showConfirmation"
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7Z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0Z"
                                        />

                                    </svg>

                                    <svg
                                        x-show="showConfirmation"
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
                                :messages="$errors->get('password_confirmation')"
                                class="mt-2"
                            />

                        </div>


                        {{-- ================================================= --}}
                        {{-- REGISTER BUTTON --}}
                        {{-- ================================================= --}}

                        <button
                            type="submit"
                            wire:loading.attr="disabled"
                            class="group relative flex w-full items-center justify-center gap-3 overflow-hidden rounded-2xl bg-[#2F8F9D] px-6 py-4 text-sm font-bold text-white shadow-lg shadow-[#2F8F9D]/20 transition duration-200 hover:-translate-y-0.5 hover:bg-[#287D89] hover:shadow-xl hover:shadow-[#2F8F9D]/20 active:translate-y-0 disabled:cursor-not-allowed disabled:opacity-70"
                        >

                            {{-- Soft shine --}}
                            <span
                                class="pointer-events-none absolute inset-y-0 -left-10 w-10 skew-x-[-20deg] bg-white/20 opacity-0 transition-all duration-700 group-hover:left-[110%] group-hover:opacity-100"
                            ></span>


                            {{-- Normal --}}
                            <span
                                wire:loading.remove
                                wire:target="register"
                                class="relative flex items-center gap-2"
                            >

                                Create account

                                {{-- Professional arrow --}}
                                <svg
                                    class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M5 12h14"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m13 6 6 6-6 6"
                                    />
                                </svg>

                            </span>


                            {{-- Loading --}}
                            <span
                                wire:loading.flex
                                wire:target="register"
                                class="relative items-center gap-3"
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

                                Creating account...

                            </span>

                        </button>


                        {{-- Security --}}
                        <div
                            class="flex items-center justify-center gap-2 pt-1"
                        >

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

                            <span
                                class="text-xs font-medium text-[#89968F]"
                            >
                                Your connection is secure
                            </span>

                        </div>

                    </form>


                    {{-- ================================================= --}}
                    {{-- LOGIN CARD --}}
                    {{-- ================================================= --}}

                    <div
                        class="mt-7 rounded-2xl border border-[#17352C]/10 bg-white p-5 text-center shadow-sm transition duration-200 hover:shadow-md"
                    >

                        <p class="text-sm text-[#667A72]">
                            Already have an account?
                        </p>

                        <a
                            href="{{ route('login') }}"
                            wire:navigate
                            class="mt-2 inline-flex items-center gap-2 text-sm font-bold text-[#2F8F9D] transition hover:text-[#287D89]"
                        >

                            Sign in

                            <svg
                                class="h-4 w-4 transition-transform duration-200 group-hover:translate-x-1"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M5 12h14"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="m13 6 6 6-6 6"
                                />

                            </svg>

                        </a>

                    </div>


                    {{-- Bottom --}}
                    <div class="mt-7 text-center">

                        <p
                            class="text-xs leading-5 text-[#89968F]"
                        >
                            By creating an account, you agree to use
                            SiteMonitor responsibly and keep your account secure.
                        </p>

                    </div>

                </div>

            </div>

        </section>

    </div>


    {{-- Alpine --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</div>