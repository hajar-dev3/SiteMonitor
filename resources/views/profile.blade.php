```blade
<x-app-layout>

    <x-slot name="header">
        <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-bold uppercase tracking-[0.18em] text-teal-600">
                    Account
                </p>

                <h2 class="mt-1 text-2xl font-black tracking-tight text-slate-900">
                    Profile settings
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    Manage your personal information, password and account security.
                </p>
            </div>

            <div class="hidden sm:flex items-center gap-2 rounded-full border border-emerald-100 bg-emerald-50 px-4 py-2">
                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                <span class="text-xs font-bold text-emerald-700">
                    Account active
                </span>
            </div>
        </div>
    </x-slot>


    {{-- ========================================================= --}}
    {{-- PAGE --}}
    {{-- ========================================================= --}}

    <div class="min-h-screen bg-[#f6f3ec]">

        {{-- ===================================================== --}}
        {{-- TOP PROFILE HERO --}}
        {{-- ===================================================== --}}

        <div class="border-b border-slate-200/70 bg-white">

            <div class="mx-auto max-w-7xl px-6 py-8 sm:px-8 lg:px-10">

                <div class="relative overflow-hidden rounded-3xl bg-gradient-to-br from-[#0b3b35] via-[#145c50] to-[#1b7467] px-6 py-8 shadow-xl shadow-emerald-950/10 sm:px-10">

                    {{-- Decorative circles --}}
                    <div class="pointer-events-none absolute -right-20 -top-24 h-72 w-72 rounded-full bg-emerald-300/10 blur-3xl"></div>

                    <div class="pointer-events-none absolute -bottom-32 left-1/3 h-80 w-80 rounded-full bg-teal-300/10 blur-3xl"></div>


                    <div class="relative z-10 flex flex-col gap-6 md:flex-row md:items-center md:justify-between">

                        <div class="flex items-center gap-5">

                            {{-- Avatar --}}
                            <div class="flex h-20 w-20 shrink-0 items-center justify-center rounded-3xl border border-white/20 bg-white/10 text-2xl font-black text-white shadow-lg backdrop-blur-sm">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>


                            <div>
                                <p class="text-sm font-medium text-emerald-100/80">
                                    Your account
                                </p>

                                <h1 class="mt-1 text-3xl font-black tracking-tight text-white">
                                    {{ auth()->user()->name }}
                                </h1>

                                <p class="mt-1 text-sm text-emerald-100/70">
                                    {{ auth()->user()->email }}
                                </p>
                            </div>

                        </div>


                        {{-- Status --}}
                        <div class="inline-flex w-fit items-center gap-3 rounded-2xl border border-white/10 bg-white/10 px-5 py-3 backdrop-blur-sm">

                            <span class="relative flex h-3 w-3">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-300 opacity-60"></span>

                                <span class="relative inline-flex h-3 w-3 rounded-full bg-emerald-300"></span>
                            </span>

                            <div>
                                <p class="text-xs font-bold uppercase tracking-wider text-emerald-100/60">
                                    Status
                                </p>

                                <p class="text-sm font-bold text-white">
                                    Active
                                </p>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- CONTENT --}}
        {{-- ========================================================= --}}

        <div class="mx-auto max-w-7xl px-6 py-10 sm:px-8 lg:px-10">

            <div class="grid gap-8 lg:grid-cols-[minmax(0,1fr)_320px]">


                {{-- ================================================= --}}
                {{-- MAIN SETTINGS --}}
                {{-- ================================================= --}}

                <main class="space-y-7">


                    {{-- ================================================= --}}
                    {{-- PERSONAL INFORMATION --}}
                    {{-- ================================================= --}}

                    <section class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-6 sm:px-8">

                            <div class="flex items-start gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#e6f3ef] text-[#145c50]">

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
                                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M4.5 20.25a8.25 8.25 0 0115 0"
                                        />
                                    </svg>

                                </div>


                                <div>
                                    <h3 class="text-lg font-black text-slate-900">
                                        Personal information
                                    </h3>

                                    <p class="mt-1 text-sm leading-6 text-slate-500">
                                        Update your name and email address associated with your account.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="px-6 py-7 sm:px-8">

                            <livewire:profile.update-profile-information-form />

                        </div>

                    </section>


                    {{-- ================================================= --}}
                    {{-- PASSWORD --}}
                    {{-- ================================================= --}}

                    <section class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm">

                        <div class="border-b border-slate-100 px-6 py-6 sm:px-8">

                            <div class="flex items-start gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#f1e8f2] text-[#704c75]">

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
                                            d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M5.25 10.5h13.5A1.5 1.5 0 0120.25 12v7.5a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V12a1.5 1.5 0 011.5-1.5z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 14.25v2.25"
                                        />
                                    </svg>

                                </div>


                                <div>
                                    <h3 class="text-lg font-black text-slate-900">
                                        Password & security
                                    </h3>

                                    <p class="mt-1 text-sm leading-6 text-slate-500">
                                        Keep your account secure by using a strong and unique password.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="px-6 py-7 sm:px-8">

                            <livewire:profile.update-password-form />

                        </div>

                    </section>


                    {{-- ================================================= --}}
                    {{-- DELETE ACCOUNT --}}
                    {{-- ================================================= --}}

                    <section class="overflow-hidden rounded-3xl border border-red-100 bg-white shadow-sm">

                        <div class="border-b border-red-50 px-6 py-6 sm:px-8">

                            <div class="flex items-start gap-4">

                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-red-50 text-red-600">

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
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h10"
                                        />
                                    </svg>

                                </div>


                                <div>
                                    <h3 class="text-lg font-black text-slate-900">
                                        Delete account
                                    </h3>

                                    <p class="mt-1 text-sm leading-6 text-slate-500">
                                        Permanently remove your account and all associated data.
                                    </p>
                                </div>

                            </div>

                        </div>


                        <div class="px-6 py-7 sm:px-8">

                            <div class="rounded-2xl border border-red-100 bg-red-50/60 p-4">

                                <div class="flex gap-3">

                                    <svg
                                        class="mt-0.5 h-5 w-5 shrink-0 text-red-500"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12 9v3.75m0 3h.008v.008H12v-.008z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"
                                        />
                                    </svg>


                                    <p class="text-sm leading-6 text-red-700">
                                        This action is permanent. Your monitoring data, websites and account information may no longer be recoverable.
                                    </p>

                                </div>

                            </div>


                            <div class="mt-6">

                                <livewire:profile.delete-user-form />

                            </div>

                        </div>

                    </section>

                </main>


                {{-- ================================================= --}}
                {{-- SIDEBAR --}}
                {{-- ================================================= --}}

                <aside class="space-y-6 lg:sticky lg:top-24 lg:self-start">


                    {{-- Account card --}}
                    <div class="overflow-hidden rounded-3xl border border-slate-200/80 bg-white shadow-sm">

                        <div class="bg-gradient-to-br from-[#edf7f3] to-[#f7f1f8] px-6 py-7">

                            <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-white text-xl font-black text-[#145c50] shadow-sm">

                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                            </div>

                            <h3 class="mt-5 text-lg font-black text-slate-900">
                                {{ auth()->user()->name }}
                            </h3>

                            <p class="mt-1 break-all text-sm text-slate-500">
                                {{ auth()->user()->email }}
                            </p>

                        </div>


                        <div class="divide-y divide-slate-100">

                            <div class="flex items-center justify-between px-6 py-4">

                                <span class="text-sm text-slate-500">
                                    Account status
                                </span>

                                <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-emerald-700">
                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                    Active
                                </span>

                            </div>


                            <div class="flex items-center justify-between px-6 py-4">

                                <span class="text-sm text-slate-500">
                                    Member since
                                </span>

                                <span class="text-sm font-semibold text-slate-700">
                                    {{ auth()->user()->created_at?->format('M Y') ?? '—' }}
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Security card --}}
                    <div class="rounded-3xl border border-slate-200/80 bg-white p-6 shadow-sm">

                        <div class="flex items-center gap-3">

                            <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#e8f4f1] text-[#145c50]">

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
                                        d="M12 3l7 4v5c0 4.5-2.8 7.8-7 9-4.2-1.2-7-4.5-7-9V7l7-4z"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M9 12l2 2 4-4"
                                    />
                                </svg>

                            </div>


                            <div>
                                <h3 class="font-black text-slate-900">
                                    Account security
                                </h3>

                                <p class="text-xs text-slate-500">
                                    Your account is protected
                                </p>
                            </div>

                        </div>


                        <div class="mt-5 space-y-3">

                            <div class="flex items-center gap-3 rounded-xl bg-slate-50 px-4 py-3">

                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                                <span class="text-sm font-medium text-slate-600">
                                    Password protected
                                </span>

                            </div>


                            <div class="flex items-center gap-3 rounded-xl bg-slate-50 px-4 py-3">

                                <span class="h-2 w-2 rounded-full bg-emerald-500"></span>

                                <span class="text-sm font-medium text-slate-600">
                                    Secure session
                                </span>

                            </div>

                        </div>

                    </div>


                    {{-- Help card --}}
                    <div class="rounded-3xl bg-[#163f39] p-6 text-white shadow-lg shadow-emerald-950/10">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-white/10">

                            <svg
                                class="h-5 w-5 text-emerald-200"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.8"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M8.625 9.75a3.375 3.375 0 016.75 0c0 1.12-.55 2.11-1.4 2.72-.65.46-1.1 1.08-1.1 1.83"
                                />

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 17.25h.008v.008H12v-.008z"
                                />

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                    fill="none"
                                />
                            </svg>

                        </div>


                        <h3 class="mt-4 text-lg font-black">
                            Need help?
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-emerald-100/70">
                            Keep your account information up to date to get the most out of SiteMonitor.
                        </p>

                    </div>

                </aside>

            </div>

        </div>

    </div>

</x-app-layout>
```
