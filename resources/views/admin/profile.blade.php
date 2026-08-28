@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="flex flex-col gap-5 border-b border-[#e0e4df] pb-8 sm:flex-row sm:items-center sm:justify-between">

        <div>

            <p class="text-[11px] font-bold uppercase tracking-[0.20em] text-[#2F8F9D]">
                Account
            </p>

            <h1 class="mt-2 text-3xl font-black tracking-tight text-[#253638]">
                Profile settings
            </h1>

            <p class="mt-2 max-w-2xl text-base text-[#71898b]">
                Manage your personal information, password and account security.
            </p>

        </div>


        {{-- Account status --}}

        <div
            class="inline-flex w-fit items-center gap-2 rounded-full
                   border border-[#cde8dd]
                   bg-[#effaf3]
                   px-5 py-3
                   text-sm font-bold text-[#27845e]"
        >

            <span class="h-2.5 w-2.5 rounded-full bg-[#20b981]"></span>

            Account active

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- ACCOUNT HERO --}}
    {{-- ========================================================= --}}

    <div
        class="mt-8 overflow-hidden rounded-[28px]
               bg-gradient-to-r from-[#14695d] to-[#218474]
               p-7 text-white
               shadow-[0_18px_45px_rgba(20,105,93,0.16)]
               sm:p-10"
    >

        <div class="flex flex-col gap-7 lg:flex-row lg:items-center lg:justify-between">

            <div class="flex items-center gap-5">

                {{-- Avatar --}}

                <div
                    class="flex h-24 w-24 shrink-0 items-center justify-center
                           rounded-3xl border border-white/20
                           bg-white/10
                           text-3xl font-black"
                >

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>


                {{-- User information --}}

                <div>

                    <p class="text-sm font-semibold text-white/65">
                        Your account
                    </p>

                    <h2 class="mt-1 text-3xl font-black tracking-tight">
                        {{ auth()->user()->name }}
                    </h2>

                    <p class="mt-1 text-base text-white/65">
                        {{ auth()->user()->email }}
                    </p>

                </div>

            </div>


            {{-- Status --}}

            <div
                class="w-fit rounded-2xl border border-white/15
                       bg-white/10 px-6 py-4"
            >

                <p class="text-[10px] font-bold uppercase tracking-[0.16em] text-white/60">
                    Status
                </p>

                <div class="mt-1 flex items-center gap-2">

                    <span class="h-2.5 w-2.5 rounded-full bg-[#6ee7b7]"></span>

                    <span class="font-bold">
                        Active
                    </span>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- PROFILE CONTENT --}}
    {{-- ========================================================= --}}

    <div class="mt-8 space-y-6">


        {{-- ========================================================= --}}
        {{-- PERSONAL INFORMATION --}}
        {{-- ========================================================= --}}

        <section
            class="overflow-hidden rounded-3xl
                   border border-[#dce4e1]
                   bg-white
                   shadow-[0_8px_30px_rgba(37,54,56,0.05)]"
        >

            <div class="border-b border-[#e5ebe8] p-7 sm:p-8">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-12 w-12 items-center justify-center
                               rounded-2xl bg-[#e4f3f1]
                               text-[#177b82]"
                    >

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M20 21a8 8 0 00-16 0"
                            />

                            <circle
                                cx="12"
                                cy="7"
                                r="4"
                                stroke-width="1.7"
                            />

                        </svg>

                    </div>


                    <div>

                        <h2 class="text-xl font-black text-[#253638]">
                            Personal information
                        </h2>

                        <p class="mt-1 text-sm text-[#71898b]">
                            Update your name and email address associated with your account.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-7 sm:p-8">

                {{-- IMPORTANT:
                     نفس component ديال User Profile
                     وبالتالي نفس update functionality
                --}}

                <livewire:profile.update-profile-information-form />

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- PASSWORD --}}
        {{-- ========================================================= --}}

        <section
            class="overflow-hidden rounded-3xl
                   border border-[#dce4e1]
                   bg-white
                   shadow-[0_8px_30px_rgba(37,54,56,0.05)]"
        >

            <div class="border-b border-[#e5ebe8] p-7 sm:p-8">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-12 w-12 items-center justify-center
                               rounded-2xl bg-[#f1edf5]
                               text-[#8b7199]"
                    >

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M12 15v2"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M6 11V7a6 6 0 0112 0v4"
                            />

                            <rect
                                x="4"
                                y="11"
                                width="16"
                                height="10"
                                rx="2"
                                stroke-width="1.7"
                            />

                        </svg>

                    </div>


                    <div>

                        <h2 class="text-xl font-black text-[#253638]">
                            Update password
                        </h2>

                        <p class="mt-1 text-sm text-[#71898b]">
                            Ensure your account is using a long, random password to stay secure.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-7 sm:p-8">

                {{-- نفس password component ديال User Profile --}}

                <livewire:profile.update-password-form />

            </div>

        </section>



        {{-- ========================================================= --}}
        {{-- DELETE ACCOUNT --}}
        {{-- ========================================================= --}}

        <section
            class="overflow-hidden rounded-3xl
                   border border-[#ead9d8]
                   bg-white
                   shadow-[0_8px_30px_rgba(37,54,56,0.04)]"
        >

            <div class="border-b border-[#f0dfdd] bg-[#fffafa] p-7 sm:p-8">

                <div class="flex items-center gap-4">

                    <div
                        class="flex h-12 w-12 items-center justify-center
                               rounded-2xl bg-[#faeceb]
                               text-[#c85b57]"
                    >

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M6 7h12"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M10 11v6M14 11v6"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M9 7V4h6v3"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.7"
                                d="M5 7l1 14h12l1-14"
                            />

                        </svg>

                    </div>


                    <div>

                        <h2 class="text-xl font-black text-[#253638]">
                            Delete account
                        </h2>

                        <p class="mt-1 text-sm text-[#71898b]">
                            Permanently delete your administrator account and all of its data.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-7 sm:p-8">

                {{-- نفس delete component ديال User Profile --}}

                <livewire:profile.delete-user-form />

            </div>

        </section>


    </div>

</div>

@endsection