@extends('layouts.admin')

@section('content')

    {{-- ========================================================= --}}
    {{-- PAGE HEADER --}}
    {{-- ========================================================= --}}

    <div class="mb-8">

        <a
            href="{{ route('admin.users.index') }}"
            class="inline-flex items-center gap-2 text-sm font-semibold text-[#2F8F9D] transition hover:text-[#236F79]"
        >
            <span>←</span>
            Back to Users
        </a>


        <div class="mt-5 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

            <div class="flex items-center gap-4">

                {{-- Avatar --}}
                <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#E8F4F3] text-xl font-extrabold text-[#2F8F9D]">

                    {{ strtoupper(substr($user->name, 0, 1)) }}

                </div>


                <div>

                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#89978F]">
                        User
                    </p>

                    <h1 class="mt-1 text-3xl font-extrabold tracking-tight text-[#17352C]">
                        {{ $user->name }}
                    </h1>

                    <p class="mt-1 text-sm text-[#687870]">
                        {{ $user->email }}
                    </p>

                </div>

            </div>


            {{-- User ID --}}
            <div class="rounded-xl border border-[#DCEBE8] bg-white px-4 py-3 shadow-sm">

                <p class="text-[11px] font-semibold uppercase tracking-wide text-[#89978F]">
                    User ID
                </p>

                <p class="mt-1 text-sm font-extrabold text-[#17352C]">
                    #{{ $user->id }}
                </p>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- USER INFORMATION --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">


        {{-- Profile Card --}}
        <div class="rounded-2xl border border-[#E4DDD4] bg-white p-6 shadow-sm">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F4F3]">
                    👤
                </div>

                <div>

                    <h2 class="text-lg font-extrabold text-[#17352C]">
                        Information
                    </h2>

                    <p class="text-xs text-[#89978F]">
                        Account information
                    </p>

                </div>

            </div>


            <div class="mt-6 space-y-5">


                {{-- Name --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-[#89978F]">
                        Name
                    </p>

                    <p class="mt-1 text-sm font-bold text-[#304C43]">
                        {{ $user->name }}
                    </p>

                </div>


                {{-- Email --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-[#89978F]">
                        Email
                    </p>

                    <p class="mt-1 break-all text-sm font-medium text-[#687870]">
                        {{ $user->email }}
                    </p>

                </div>


                {{-- Registration Date --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-[#89978F]">
                        Registration Date
                    </p>

                    <p class="mt-1 text-sm font-medium text-[#687870]">
                        {{ $user->created_at->format('d/m/Y \a\t H:i') }}
                    </p>

                </div>


                {{-- Last Updated --}}
                <div>

                    <p class="text-xs font-semibold uppercase tracking-wide text-[#89978F]">
                        Last Updated
                    </p>

                    <p class="mt-1 text-sm font-medium text-[#687870]">
                        {{ $user->updated_at->format('d/m/Y \a\t H:i') }}
                    </p>

                </div>

            </div>

        </div>


        {{-- Statistics --}}
        <div class="lg:col-span-2 rounded-2xl border border-[#E4DDD4] bg-white p-6 shadow-sm">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#89978F]">
                        Activity
                    </p>

                    <h2 class="mt-1 text-xl font-extrabold text-[#17352C]">
                        User Overview
                    </h2>

                </div>

                <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#F2F8F7]">
                    📊
                </div>

            </div>


            <div class="mt-6 grid grid-cols-1 gap-4 sm:grid-cols-2">


                {{-- Sites --}}
                <div class="rounded-xl border border-[#E8EEEB] bg-[#FAFCFB] p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-semibold text-[#89978F]">
                                Monitored Sites
                            </p>

                            <p class="mt-2 text-3xl font-extrabold text-[#17352C]">
                                {{ $user->sites_count }}
                            </p>

                        </div>

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4F3]">
                            🌐
                        </div>

                    </div>

                </div>


                {{-- Account Status --}}
                <div class="rounded-xl border border-[#E2EEE5] bg-[#F8FCF9] p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs font-semibold text-[#6E8579]">
                                Account Status
                            </p>

                            <p class="mt-2 text-xl font-extrabold text-[#3F8B5A]">
                                Active
                            </p>

                        </div>

                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#ECF7EF]">
                            ✓
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- USER SITES --}}
    {{-- ========================================================= --}}

    <div class="mt-6 overflow-hidden rounded-2xl border border-[#E4DDD4] bg-white shadow-sm">


        {{-- Section Header --}}
        <div class="border-b border-[#E9E4DE] px-6 py-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#89978F]">
                        Monitoring
                    </p>

                    <h2 class="mt-1 text-lg font-extrabold text-[#17352C]">
                        Sites of {{ $user->name }}
                    </h2>

                </div>


                <div class="rounded-lg bg-[#E8F4F3] px-3 py-1.5 text-xs font-bold text-[#2F7480]">

                    {{ $user->sites_count }}

                    {{ $user->sites_count === 1 ? 'site' : 'sites' }}

                </div>

            </div>

        </div>


        {{-- Sites Table --}}
        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-[#FAF9F6]">

                    <tr>

                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-[#89978F]">
                            Site
                        </th>

                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-[#89978F]">
                            URL
                        </th>

                        <th class="px-6 py-4 text-xs font-bold uppercase tracking-wide text-[#89978F]">
                            Monitoring
                        </th>

                        <th class="px-6 py-4 text-right text-xs font-bold uppercase tracking-wide text-[#89978F]">
                            Status
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-[#EEEAE5]">

                    @forelse ($user->sites as $site)

                        <tr class="transition hover:bg-[#FAFCFB]">


                            {{-- Site Name --}}
                            <td class="px-6 py-5">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-[#E8F4F3]">
                                        🌐
                                    </div>

                                    <div>

                                        <p class="text-sm font-bold text-[#304C43]">
                                            {{ $site->name }}
                                        </p>

                                        <p class="text-xs text-[#9AA7A1]">
                                            ID #{{ $site->id }}
                                        </p>

                                    </div>

                                </div>

                            </td>


                            {{-- URL --}}
                            <td class="px-6 py-5">

                                <span class="text-sm text-[#687870]">
                                    {{ $site->url }}
                                </span>

                            </td>


                            {{-- Monitoring --}}
                            <td class="px-6 py-5">

                                @if ($site->is_active)

                                    <span class="inline-flex items-center gap-2 rounded-lg bg-[#ECF7EF] px-2.5 py-1 text-xs font-bold text-[#3F8B5A]">

                                        <span class="h-1.5 w-1.5 rounded-full bg-[#55A66F]"></span>

                                        Active

                                    </span>

                                @else

                                    <span class="inline-flex items-center gap-2 rounded-lg bg-[#F5F3F0] px-2.5 py-1 text-xs font-bold text-[#89978F]">

                                        <span class="h-1.5 w-1.5 rounded-full bg-[#9AA7A1]"></span>

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td class="px-6 py-5 text-right">

                                <span class="inline-flex items-center rounded-lg bg-[#F2F8F7] px-2.5 py-1 text-xs font-semibold text-[#2F7480]">
                                    Monitoring
                                </span>

                            </td>

                        </tr>


                    @empty

                        {{-- Empty State --}}
                        <tr>

                            <td colspan="4" class="px-6 py-14 text-center">

                                <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-[#E8F4F3]">
                                    🌐
                                </div>

                                <h3 class="mt-4 text-base font-bold text-[#304C43]">
                                    No Sites
                                </h3>

                                <p class="mt-1 text-sm text-[#89978F]">
                                    This user has no monitored sites.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- DANGER ZONE --}}
    {{-- ========================================================= --}}

    <div class="mt-6 rounded-2xl border border-[#F0DAD7] bg-[#FFF9F8] p-6">

        <div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">


            <div>

                <p class="text-xs font-bold uppercase tracking-[0.15em] text-[#C65353]">
                    Danger Zone
                </p>

                <h3 class="mt-1 text-base font-extrabold text-[#6F3834]">
                    Delete this User
                </h3>

                <p class="mt-1 text-sm text-[#947D78]">
                    This action will permanently delete the user account.
                </p>

            </div>


            {{-- Delete Form --}}
            <form
                method="POST"
                action="{{ route('admin.users.destroy', $user) }}"
                onsubmit="return confirm('Are you sure you want to delete this user? This action cannot be undone.');"
            >

                @csrf
                @method('DELETE')

                <button
                    type="submit"
                    class="rounded-xl border border-[#E8C9C5] bg-white px-4 py-2.5 text-sm font-bold text-[#C65353] shadow-sm transition hover:bg-[#FBEFED]"
                >
                    Delete User
                </button>

            </form>

        </div>

    </div>


@endsection