@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-[#F5F1E8]">

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="border-b border-[#E4DDD4] bg-white">

        <div class="mx-auto max-w-7xl px-6 py-8">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    {{-- Breadcrumbs --}}
                    <div class="flex items-center gap-2 text-sm font-semibold text-[#89978F]">

                        <a
                            href="{{ route('admin.dashboard') }}"
                            class="transition hover:text-[#126B70]"
                        >
                            Administration
                        </a>

                        <span>/</span>

                        <a
                            href="{{ route('admin.users.index') }}"
                            class="transition hover:text-[#126B70]"
                        >
                            Users
                        </a>

                        <span>/</span>

                        <span class="text-[#243C39]">
                            Add User
                        </span>

                    </div>


                    {{-- Title --}}
                    <h1 class="mt-3 text-3xl font-black tracking-tight text-[#243C39]">
                        Add User
                    </h1>

                    <p class="mt-2 text-sm text-[#71817B]">
                        Create a new user account for the SiteMonitor platform.
                    </p>

                </div>


                {{-- Back Button --}}
                <a
                    href="{{ route('admin.users.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#D8E2DE] bg-white px-5 py-3 text-sm font-bold text-[#243C39] shadow-sm transition hover:border-[#126B70] hover:text-[#126B70]"
                >

                    <span>←</span>

                    Back to Users

                </a>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MAIN CONTENT --}}
    {{-- ========================================================= --}}

    <div class="mx-auto max-w-4xl px-6 py-10">


        {{-- ===================================================== --}}
        {{-- VALIDATION ERRORS --}}
        {{-- ===================================================== --}}

        @if ($errors->any())

            <div class="mb-6 rounded-2xl border border-[#C44743]/20 bg-[#C44743]/5 p-5">

                <div class="flex gap-3">

                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#C44743]/10 text-[#C44743]">
                        !
                    </div>

                    <div>

                        <h3 class="font-bold text-[#C44743]">
                            Please check the information entered
                        </h3>

                        <ul class="mt-2 list-inside list-disc space-y-1 text-sm text-[#7A4A47]">

                            @foreach ($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                </div>

            </div>

        @endif


        {{-- ===================================================== --}}
        {{-- FORM CARD --}}
        {{-- ===================================================== --}}

        <div class="overflow-hidden rounded-3xl border border-[#E4DDD4] bg-white shadow-[0_10px_35px_rgba(36,60,57,0.06)]">


            {{-- ================================================= --}}
            {{-- CARD HEADER --}}
            {{-- ================================================= --}}

            <div class="border-b border-[#EDF1EF] bg-[#FAFBFA] px-7 py-6">

                <div class="flex items-center gap-4">

                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#126B70]/10 text-[#126B70]">

                        <svg
                            class="h-6 w-6"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M15 19a3 3 0 0 0-6 0"
                            />

                            <circle
                                cx="12"
                                cy="9"
                                r="3"
                                stroke-width="1.8"
                            />

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="1.8"
                                d="M5 19a7 7 0 0 1 14 0"
                            />

                        </svg>

                    </div>


                    <div>

                        <h2 class="text-lg font-black text-[#243C39]">
                            Account Information
                        </h2>

                        <p class="mt-1 text-sm text-[#89978F]">
                            Enter the information for the new user.
                        </p>

                    </div>

                </div>

            </div>


            {{-- ================================================= --}}
            {{-- FORM --}}
            {{-- ================================================= --}}

            <form
                method="POST"
                action="{{ route('admin.users.store') }}"
                class="px-7 py-8"
            >

                @csrf


                <div class="space-y-7">


                    {{-- ================================================= --}}
                    {{-- NAME --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="name"
                            class="mb-2 block text-sm font-bold text-[#243C39]"
                        >

                            Full Name

                            <span class="text-[#C44743]">
                                *
                            </span>

                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            placeholder="e.g. Hajar Gheziel"
                            class="w-full rounded-xl border border-[#D8E2DE] bg-white px-4 py-3.5 text-sm text-[#243C39] outline-none transition placeholder:text-[#AAB5B1] focus:border-[#126B70] focus:ring-4 focus:ring-[#126B70]/10 @error('name') border-[#C44743] @enderror"
                        >


                        @error('name')

                            <p class="mt-2 text-sm font-medium text-[#C44743]">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ================================================= --}}
                    {{-- EMAIL --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="email"
                            class="mb-2 block text-sm font-bold text-[#243C39]"
                        >

                            Email Address

                            <span class="text-[#C44743]">
                                *
                            </span>

                        </label>


                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="example@email.com"
                            class="w-full rounded-xl border border-[#D8E2DE] bg-white px-4 py-3.5 text-sm text-[#243C39] outline-none transition placeholder:text-[#AAB5B1] focus:border-[#126B70] focus:ring-4 focus:ring-[#126B70]/10 @error('email') border-[#C44743] @enderror"
                        >


                        @error('email')

                            <p class="mt-2 text-sm font-medium text-[#C44743]">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ================================================= --}}
                    {{-- PASSWORD --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="password"
                            class="mb-2 block text-sm font-bold text-[#243C39]"
                        >

                            Password

                            <span class="text-[#C44743]">
                                *
                            </span>

                        </label>


                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            placeholder="Minimum 8 characters"
                            class="w-full rounded-xl border border-[#D8E2DE] bg-white px-4 py-3.5 text-sm text-[#243C39] outline-none transition placeholder:text-[#AAB5B1] focus:border-[#126B70] focus:ring-4 focus:ring-[#126B70]/10 @error('password') border-[#C44743] @enderror"
                        >


                        @error('password')

                            <p class="mt-2 text-sm font-medium text-[#C44743]">
                                {{ $message }}
                            </p>

                        @enderror

                    </div>


                    {{-- ================================================= --}}
                    {{-- PASSWORD CONFIRMATION --}}
                    {{-- ================================================= --}}

                    <div>

                        <label
                            for="password_confirmation"
                            class="mb-2 block text-sm font-bold text-[#243C39]"
                        >

                            Confirm Password

                            <span class="text-[#C44743]">
                                *
                            </span>

                        </label>


                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            required
                            placeholder="Confirm your password"
                            class="w-full rounded-xl border border-[#D8E2DE] bg-white px-4 py-3.5 text-sm text-[#243C39] outline-none transition placeholder:text-[#AAB5B1] focus:border-[#126B70] focus:ring-4 focus:ring-[#126B70]/10"
                        >

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- INFORMATION BOX --}}
                {{-- ================================================= --}}

                <div class="mt-8 rounded-2xl border border-[#2F8F9D]/15 bg-[#2F8F9D]/5 p-5">

                    <div class="flex gap-3">

                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#2F8F9D]/10 text-[#2F8F9D]">
                            i
                        </div>


                        <div>

                            <p class="text-sm font-bold text-[#243C39]">
                                Information
                            </p>

                            <p class="mt-1 text-sm leading-6 text-[#71817B]">
                                The password must contain at least 8 characters.
                                The email address must be unique on the platform.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- ACTIONS --}}
                {{-- ================================================= --}}

                <div class="mt-8 flex flex-col-reverse gap-3 border-t border-[#EDF1EF] pt-7 sm:flex-row sm:justify-end">


                    {{-- Cancel --}}
                    <a
                        href="{{ route('admin.users.index') }}"
                        class="inline-flex items-center justify-center rounded-xl border border-[#D8E2DE] bg-white px-6 py-3.5 text-sm font-bold text-[#243C39] transition hover:border-[#126B70] hover:text-[#126B70]"
                    >

                        Cancel

                    </a>


                    {{-- Submit --}}
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#126B70] px-6 py-3.5 text-sm font-bold text-white shadow-sm transition hover:bg-[#0F5B5F] hover:shadow-md focus:outline-none focus:ring-4 focus:ring-[#126B70]/20"
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
                                stroke-width="1.8"
                                d="M12 5v14M5 12h14"
                            />

                        </svg>

                        Add User

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection