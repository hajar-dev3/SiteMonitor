@extends('layouts.admin')

@section('content')

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <div class="mb-8">

        <div class="flex flex-col gap-5 sm:flex-row sm:items-end sm:justify-between">

            <div>

                <div class="mb-3 flex items-center gap-2">

                    <span class="h-2 w-2 rounded-full bg-[#2F8F9D]"></span>

                    <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#89978F]">
                        Administration
                    </span>

                </div>

                <h1 class="text-3xl font-extrabold tracking-tight text-[#17352C]">
                    Users
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-[#687870]">
                    Manage user accounts and view their activity
                    on the SiteMonitor platform.
                </p>

            </div>


            {{-- Actions Header --}}
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">

                {{-- Total users --}}
                <div class="flex items-center gap-3 rounded-2xl border border-[#DCEBE8] bg-white px-5 py-4 shadow-sm">

                    <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4F3] text-lg">
                        👥
                    </div>

                    <div>

                        <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-[#89978F]">
                            Total Users
                        </p>

                        <p class="mt-0.5 text-2xl font-extrabold text-[#17352C]">
                            {{ $users->total() }}
                        </p>

                    </div>

                </div>


                {{-- Add User --}}
                <a
                    href="{{ route('admin.users.create') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#126B70] px-5 py-3.5 text-sm font-bold text-white shadow-sm transition duration-200 hover:bg-[#0F5B5F] hover:shadow-md"
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
                            d="M12 5v14M5 12h14"
                        />

                    </svg>

                    Add User

                </a>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- SUCCESS MESSAGE --}}
    {{-- ========================================================= --}}

    @if (session('success'))

        <div class="mb-6 rounded-2xl border border-[#DCEBE8] bg-[#F2FAF8] p-4">

            <div class="flex items-center gap-3">

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-[#DFF2E5] text-[#3F8B5A]">
                    ✓
                </div>

                <p class="text-sm font-bold text-[#3F8B5A]">
                    {{ session('success') }}
                </p>

            </div>

        </div>

    @endif


    {{-- ========================================================= --}}
    {{-- QUICK SUMMARY --}}
    {{-- ========================================================= --}}

    <div class="mb-6 grid grid-cols-1 gap-4 sm:grid-cols-3">


        {{-- Total --}}
        <div class="group rounded-2xl border border-[#E4DDD4] bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-[#89978F]">
                        Users
                    </p>

                    <p class="mt-2 text-2xl font-extrabold text-[#17352C]">
                        {{ $users->total() }}
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4F3] transition group-hover:scale-105">
                    👥
                </div>

            </div>

            <p class="mt-3 text-xs text-[#89978F]">
                Registered accounts
            </p>

        </div>


        {{-- Sites --}}
        <div class="group rounded-2xl border border-[#E4DDD4] bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-[#89978F]">
                        Monitored Sites
                    </p>

                    <p class="mt-2 text-2xl font-extrabold text-[#17352C]">
                        {{ $users->sum('sites_count') }}
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#EEF7F6] transition group-hover:scale-105">
                    🌐
                </div>

            </div>

            <p class="mt-3 text-xs text-[#89978F]">
                Sites associated with displayed users
            </p>

        </div>


        {{-- Active --}}
        <div class="group rounded-2xl border border-[#E2EEE5] bg-white p-5 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-md">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-[#89978F]">
                        Status
                    </p>

                    <p class="mt-2 text-2xl font-extrabold text-[#3F8B5A]">
                        Active
                    </p>

                </div>

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#ECF7EF] transition group-hover:scale-105">
                    ✓
                </div>

            </div>

            <p class="mt-3 text-xs text-[#89978F]">
                Platform is operational
            </p>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- USERS TABLE CARD --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-3xl border border-[#E4DDD4] bg-white shadow-sm">


        {{-- Card Header --}}
        <div class="border-b border-[#EAE5DF] bg-gradient-to-r from-[#FBFDFC] via-white to-[#F8FBFA] px-6 py-6">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F4F3]">
                            👤
                        </div>

                        <div>

                            <h2 class="text-lg font-extrabold text-[#17352C]">
                                Users List
                            </h2>

                            <p class="mt-0.5 text-xs text-[#89978F]">
                                Manage SiteMonitor user accounts
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Records --}}
                <div class="rounded-xl border border-[#DCEBE8] bg-white px-3 py-2">

                    <span class="text-xs font-semibold text-[#687870]">

                        {{ $users->firstItem() ?? 0 }}
                        –
                        {{ $users->lastItem() ?? 0 }}
                        of
                        {{ $users->total() }}

                    </span>

                </div>

            </div>

        </div>


        {{-- ===================================================== --}}
        {{-- TABLE --}}
        {{-- ===================================================== --}}

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1050px] text-left">

                {{-- Table Header --}}
                <thead>

                    <tr class="border-b border-[#EAE5DF] bg-[#FAFCFB]">

                        <th class="px-6 py-4 text-[11px] font-extrabold uppercase tracking-[0.12em] text-[#89978F]">
                            User
                        </th>

                        <th class="px-6 py-4 text-[11px] font-extrabold uppercase tracking-[0.12em] text-[#89978F]">
                            Email
                        </th>

                        <th class="px-6 py-4 text-center text-[11px] font-extrabold uppercase tracking-[0.12em] text-[#89978F]">
                            Sites
                        </th>

                        <th class="px-6 py-4 text-[11px] font-extrabold uppercase tracking-[0.12em] text-[#89978F]">
                            Registered
                        </th>

                        <th class="px-6 py-4 text-right text-[11px] font-extrabold uppercase tracking-[0.12em] text-[#89978F]">
                            Actions
                        </th>

                    </tr>

                </thead>


                {{-- Table Body --}}
                <tbody class="divide-y divide-[#EEEAE5]">

                    @forelse ($users as $user)

                        <tr class="group transition duration-200 hover:bg-[#FAFCFB]">


                            {{-- USER --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3.5">

                                    {{-- Avatar --}}
                                    <div class="relative">

                                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-gradient-to-br from-[#E8F4F3] to-[#DCEFED] text-sm font-extrabold text-[#2F7480] transition duration-300 group-hover:scale-105">

                                            {{ strtoupper(substr($user->name, 0, 1)) }}

                                        </div>

                                        {{-- Online dot --}}
                                        <span class="absolute -bottom-0.5 -right-0.5 h-3 w-3 rounded-full border-2 border-white bg-[#55A66F]"></span>

                                    </div>


                                    <div>

                                        <p class="text-sm font-extrabold text-[#304C43]">
                                            {{ $user->name }}
                                        </p>

                                        <p class="mt-0.5 text-[11px] font-medium text-[#9AA7A1]">
                                            User #{{ $user->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- EMAIL --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-2">

                                    <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-[#F4F8F7] text-xs">
                                        ✉
                                    </div>

                                    <span class="text-sm font-medium text-[#687870]">
                                        {{ $user->email }}
                                    </span>

                                </div>

                            </td>


                            {{-- SITES --}}
                            <td class="px-6 py-5 text-center">

                                @if ($user->sites_count > 0)

                                    <span class="inline-flex min-w-[42px] items-center justify-center rounded-lg bg-[#E8F4F3] px-2.5 py-1.5 text-xs font-extrabold text-[#2F7480]">

                                        {{ $user->sites_count }}

                                    </span>

                                @else

                                    <span class="inline-flex min-w-[42px] items-center justify-center rounded-lg bg-[#F4F4F1] px-2.5 py-1.5 text-xs font-bold text-[#9AA7A1]">

                                        0

                                    </span>

                                @endif

                            </td>


                            {{-- CREATED --}}
                            <td class="px-6 py-5">

                                <div>

                                    <p class="text-sm font-semibold text-[#687870]">
                                        {{ $user->created_at->format('d/m/Y') }}
                                    </p>

                                    <p class="mt-0.5 text-[11px] text-[#A0ABA5]">
                                        {{ $user->created_at->format('H:i') }}
                                    </p>

                                </div>

                            </td>


                            {{-- ACTIONS --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center justify-end gap-2">

                                    {{-- View --}}
                                    <a
                                        href="{{ route('admin.users.show', $user) }}"
                                        class="inline-flex items-center gap-2 rounded-xl border border-[#D7E9E6] bg-[#F8FCFB] px-3.5 py-2 text-xs font-bold text-[#2F7480] transition duration-200 hover:border-[#BFDCD7] hover:bg-[#E8F4F3] hover:shadow-sm"
                                    >

                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7z"
                                            />

                                        </svg>

                                        View

                                    </a>


                                    {{-- Edit --}}
                                    <a
                                        href="{{ route('admin.users.edit', $user) }}"
                                        class="inline-flex items-center gap-2 rounded-xl border border-[#E3D9E7] bg-[#FBF8FC] px-3.5 py-2 text-xs font-bold text-[#806D89] transition duration-200 hover:border-[#D3C4D9] hover:bg-[#F3EDF5] hover:shadow-sm"
                                    >

                                        <svg
                                            class="h-4 w-4"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                            stroke-width="2"
                                        >

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5"
                                            />

                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"
                                            />

                                        </svg>

                                        Edit

                                    </a>


                                    {{-- Delete --}}
                                    <form
                                        method="POST"
                                        action="{{ route('admin.users.destroy', $user) }}"
                                        onsubmit="return confirm('Are you sure you want to delete ' + @json($user->name) + '? This action cannot be undone.');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="inline-flex items-center gap-2 rounded-xl border border-[#F0DAD7] bg-[#FFF9F8] px-3.5 py-2 text-xs font-bold text-[#C65353] transition duration-200 hover:bg-[#FBEFED] hover:shadow-sm"
                                        >

                                            <svg
                                                class="h-4 w-4"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke="currentColor"
                                                stroke-width="2"
                                            >

                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-7 0h8"
                                                />

                                            </svg>

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        {{-- EMPTY STATE --}}

                        <tr>

                            <td colspan="5" class="px-6 py-20 text-center">

                                <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#E8F4F3] text-2xl">
                                    👥
                                </div>

                                <h3 class="mt-5 text-lg font-extrabold text-[#304C43]">
                                    No Users Found
                                </h3>

                                <p class="mx-auto mt-2 max-w-md text-sm leading-6 text-[#89978F]">
                                    No user accounts are currently
                                    registered on SiteMonitor.
                                </p>

                                <a
                                    href="{{ route('admin.users.create') }}"
                                    class="mt-6 inline-flex items-center gap-2 rounded-xl bg-[#126B70] px-5 py-3 text-sm font-bold text-white transition hover:bg-[#0F5B5F]"
                                >

                                    <span>+</span>

                                    Add User

                                </a>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- ========================================================= --}}
        {{-- PAGINATION --}}
        {{-- ========================================================= --}}

        @if ($users->hasPages())

            <div class="border-t border-[#EAE5DF] bg-[#FCFDFD] px-6 py-5">

                {{ $users->links() }}

            </div>

        @endif

    </div>


    {{-- ========================================================= --}}
    {{-- FOOTER INFO --}}
    {{-- ========================================================= --}}

    <div class="mt-5 flex flex-col gap-2 px-1 text-xs text-[#9AA7A1] sm:flex-row sm:items-center sm:justify-between">

        <p>
            SiteMonitor Administration
        </p>

        <p>
            Secure user management
        </p>

    </div>

@endsection