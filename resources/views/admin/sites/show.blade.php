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
                    Site Details
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-[#687870]">
                    View information and activity for the monitored site.
                </p>

            </div>


            {{-- Back --}}
            <a
                href="{{ route('admin.sites.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#D7E9E6] bg-white px-4 py-3 text-sm font-bold text-[#2F7480] shadow-sm transition duration-200 hover:bg-[#E8F4F3] hover:shadow-md"
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
                        d="M10 19l-7-7m0 0l7-7m-7 7h18"
                    />

                </svg>

                Back to Sites

            </a>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- MAIN SITE CARD --}}
    {{-- ========================================================= --}}

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">


        {{-- ===================================================== --}}
        {{-- SITE INFORMATION --}}
        {{-- ===================================================== --}}

        <div class="lg:col-span-2">

            <div class="overflow-hidden rounded-3xl border border-[#E4DDD4] bg-white shadow-sm">


                {{-- Card Header --}}
                <div class="border-b border-[#EAE5DF] bg-gradient-to-r from-[#FBFDFC] via-white to-[#F8FBFA] px-6 py-6">

                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                        <div class="flex items-center gap-4">

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#E8F4F3] to-[#DCEFED] text-2xl">
                                🌐
                            </div>

                            <div>

                                <h2 class="text-xl font-extrabold text-[#17352C]">
                                    {{ $site->name }}
                                </h2>

                                <p class="mt-1 text-xs font-medium text-[#9AA7A1]">
                                    Site #{{ $site->id }}
                                </p>

                            </div>

                        </div>


                        {{-- Status --}}
                        @if ($site->is_active)

                            <span class="inline-flex w-fit items-center gap-2 rounded-full bg-[#ECF7EF] px-4 py-2 text-xs font-extrabold text-[#3F8B5A]">

                                <span class="h-2 w-2 rounded-full bg-[#55A66F]"></span>

                                Active Site

                            </span>

                        @else

                            <span class="inline-flex w-fit items-center gap-2 rounded-full bg-[#FFF1EF] px-4 py-2 text-xs font-extrabold text-[#C65353]">

                                <span class="h-2 w-2 rounded-full bg-[#D66A61]"></span>

                                Inactive Site

                            </span>

                        @endif

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- INFORMATION GRID --}}
                {{-- ================================================= --}}

                <div class="p-6">

                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">


                        {{-- Name --}}
                        <div class="rounded-2xl border border-[#EAE5DF] bg-[#FCFDFD] p-5">

                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F4F3]">
                                🌐
                            </div>

                            <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-[#89978F]">
                                Site Name
                            </p>

                            <p class="mt-2 text-sm font-extrabold text-[#304C43]">
                                {{ $site->name }}
                            </p>

                        </div>


                        {{-- URL --}}
                        <div class="rounded-2xl border border-[#EAE5DF] bg-[#FCFDFD] p-5">

                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F4F3]">
                                🔗
                            </div>

                            <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-[#89978F]">
                                URL
                            </p>

                            <a
                                href="{{ $site->url }}"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="mt-2 block truncate text-sm font-bold text-[#2F7480] hover:underline"
                                title="{{ $site->url }}"
                            >
                                {{ $site->url }}
                            </a>

                        </div>


                        {{-- Monitoring interval --}}
                        <div class="rounded-2xl border border-[#EAE5DF] bg-[#FCFDFD] p-5">

                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F4F3]">
                                ⏱
                            </div>

                            <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-[#89978F]">
                                Monitoring Interval
                            </p>

                            <p class="mt-2 text-sm font-extrabold text-[#304C43]">
                                {{ $site->monitoring_interval }} minutes
                            </p>

                        </div>


                        {{-- Created --}}
                        <div class="rounded-2xl border border-[#EAE5DF] bg-[#FCFDFD] p-5">

                            <div class="mb-3 flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F4F3]">
                                📅
                            </div>

                            <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-[#89978F]">
                                Date Added
                            </p>

                            <p class="mt-2 text-sm font-extrabold text-[#304C43]">
                                {{ $site->created_at->format('d/m/Y \a\t H:i') }}
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ========================================================= --}}
        {{-- OWNER CARD --}}
        {{-- ========================================================= --}}

        <div>

            <div class="overflow-hidden rounded-3xl border border-[#E4DDD4] bg-white shadow-sm">


                {{-- Header --}}
                <div class="border-b border-[#EAE5DF] bg-gradient-to-r from-[#FBFDFC] via-white to-[#F8FBFA] px-6 py-6">

                    <div class="flex items-center gap-3">

                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#E8F4F3]">
                            👤
                        </div>

                        <div>

                            <h2 class="text-lg font-extrabold text-[#17352C]">
                                Owner
                            </h2>

                            <p class="mt-0.5 text-xs text-[#89978F]">
                                User associated with this site
                            </p>

                        </div>

                    </div>

                </div>


                {{-- Owner --}}
                <div class="p-6">

                    @if ($site->user)

                        <div class="flex items-center gap-4">

                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-gradient-to-br from-[#E8F4F3] to-[#DCEFED] text-lg font-extrabold text-[#2F7480]">

                                {{ strtoupper(substr($site->user->name, 0, 1)) }}

                            </div>

                            <div>

                                <p class="text-base font-extrabold text-[#304C43]">
                                    {{ $site->user->name }}
                                </p>

                                <p class="mt-1 text-xs text-[#89978F]">
                                    User #{{ $site->user->id }}
                                </p>

                            </div>

                        </div>


                        <div class="mt-6 rounded-2xl border border-[#EAE5DF] bg-[#FCFDFD] p-4">

                            <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-[#89978F]">
                                Email
                            </p>

                            <p class="mt-2 break-all text-sm font-semibold text-[#687870]">
                                {{ $site->user->email }}
                            </p>

                        </div>


                        {{-- User details --}}
                        <a
                            href="{{ route('admin.users.show', $site->user) }}"
                            class="mt-4 flex w-full items-center justify-center gap-2 rounded-xl border border-[#D7E9E6] bg-[#F8FCFB] px-4 py-3 text-sm font-bold text-[#2F7480] transition duration-200 hover:bg-[#E8F4F3] hover:shadow-sm"
                        >

                            View Owner

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
                                    d="M9 5l7 7-7 7"
                                />

                            </svg>

                        </a>

                    @else

                        <div class="rounded-2xl border border-[#F0DAD7] bg-[#FFF9F8] p-5 text-center">

                            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-xl bg-[#FBEFED]">
                                ⚠️
                            </div>

                            <p class="mt-3 text-sm font-bold text-[#C65353]">
                                User Not Found
                            </p>

                            <p class="mt-1 text-xs text-[#9AA7A1]">
                                No owner is associated with this site.
                            </p>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- ACTIONS --}}
    {{-- ========================================================= --}}

    <div class="mt-6 overflow-hidden rounded-3xl border border-[#E4DDD4] bg-white shadow-sm">

        <div class="p-6">

            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <h2 class="text-base font-extrabold text-[#17352C]">
                        Actions
                    </h2>

                    <p class="mt-1 text-xs text-[#89978F]">
                        Manage this site from the administration area.
                    </p>

                </div>


                <div class="flex flex-col gap-2 sm:flex-row">


                    {{-- Edit --}}
                    <a
                        href="{{ route('admin.sites.edit', $site) }}"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#E3D9E7] bg-[#FBF8FC] px-4 py-3 text-sm font-bold text-[#806D89] transition duration-200 hover:bg-[#F3EDF5] hover:shadow-sm"
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
                        action="{{ route('admin.sites.destroy', $site) }}"
                        onsubmit="return confirm('Are you sure you want to delete this site? This action cannot be undone.');"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="inline-flex w-full items-center justify-center gap-2 rounded-xl border border-[#F0DAD7] bg-[#FFF9F8] px-4 py-3 text-sm font-bold text-[#C65353] transition duration-200 hover:bg-[#FBEFED] hover:shadow-sm"
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

            </div>

        </div>

    </div>


    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <div class="mt-5 flex flex-col gap-2 px-1 text-xs text-[#9AA7A1] sm:flex-row sm:items-center sm:justify-between">

        <p>
            SiteMonitor Administration
        </p>

        <p>
            Site Details #{{ $site->id }}
        </p>

    </div>

@endsection