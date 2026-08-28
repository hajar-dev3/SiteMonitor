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
                    Edit Site
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-[#687870]">
                    Edit the information and settings of the monitored site.
                </p>

            </div>


            {{-- Back --}}

            <a
                href="{{ route('admin.sites.index') }}"
                class="inline-flex items-center justify-center gap-2 rounded-xl border border-[#DCEBE8] bg-white px-4 py-2.5 text-sm font-bold text-[#2F7480] shadow-sm transition hover:bg-[#E8F4F3]"
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
    {{-- VALIDATION ERRORS --}}
    {{-- ========================================================= --}}

    @if ($errors->any())

        <div class="mb-6 rounded-2xl border border-[#F0DAD7] bg-[#FFF9F8] p-5">

            <div class="flex items-start gap-3">

                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-xl bg-[#FBEFED] text-[#C65353]">
                    !
                </div>

                <div>

                    <h3 class="text-sm font-extrabold text-[#9F3F3F]">
                        Please check the information entered
                    </h3>

                    <ul class="mt-2 list-disc space-y-1 pl-5 text-xs text-[#C65353]">

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



    {{-- ========================================================= --}}
    {{-- FORM CARD --}}
    {{-- ========================================================= --}}

    <div class="overflow-hidden rounded-3xl border border-[#E4DDD4] bg-white shadow-sm">


        {{-- Card Header --}}

        <div class="border-b border-[#EAE5DF] bg-gradient-to-r from-[#FBFDFC] via-white to-[#F8FBFA] px-6 py-6">

            <div class="flex items-center gap-3">

                <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-[#E8F4F3] text-lg">
                    🌐
                </div>

                <div>

                    <h2 class="text-lg font-extrabold text-[#17352C]">
                        Site Information
                    </h2>

                    <p class="mt-0.5 text-xs text-[#89978F]">
                        Site #{{ $site->id }} · {{ $site->name }}
                    </p>

                </div>

            </div>

        </div>



        {{-- ===================================================== --}}
        {{-- FORM --}}
        {{-- ===================================================== --}}

        <form
            method="POST"
            action="{{ route('admin.sites.update', $site) }}"
            class="p-6"
        >

            @csrf
            @method('PUT')


            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">


                {{-- ================================================= --}}
                {{-- OWNER --}}
                {{-- ================================================= --}}

                <div class="md:col-span-2">

                    <label
                        for="user_id"
                        class="mb-2 block text-sm font-bold text-[#304C43]"
                    >
                        Owner
                    </label>

                    <select
                        id="user_id"
                        name="user_id"
                        required
                        class="w-full rounded-xl border border-[#DCEBE8] bg-white px-4 py-3 text-sm text-[#304C43] outline-none transition focus:border-[#2F8F9D] focus:ring-2 focus:ring-[#E8F4F3]"
                    >

                        <option value="">
                            Select a user
                        </option>

                        @foreach ($users as $user)

                            <option
                                value="{{ $user->id }}"
                                {{ old('user_id', $site->user_id) == $user->id ? 'selected' : '' }}
                            >
                                {{ $user->name }} — {{ $user->email }}
                            </option>

                        @endforeach

                    </select>

                    @error('user_id')

                        <p class="mt-2 text-xs font-medium text-[#C65353]">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- ================================================= --}}
                {{-- SITE NAME --}}
                {{-- ================================================= --}}

                <div>

                    <label
                        for="name"
                        class="mb-2 block text-sm font-bold text-[#304C43]"
                    >
                        Site Name
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $site->name) }}"
                        required
                        maxlength="255"
                        placeholder="Ex: Google"
                        class="w-full rounded-xl border border-[#DCEBE8] bg-white px-4 py-3 text-sm text-[#304C43] outline-none transition placeholder:text-[#A0ABA5] focus:border-[#2F8F9D] focus:ring-2 focus:ring-[#E8F4F3]"
                    >

                    @error('name')

                        <p class="mt-2 text-xs font-medium text-[#C65353]">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- ================================================= --}}
                {{-- URL --}}
                {{-- ================================================= --}}

                <div>

                    <label
                        for="url"
                        class="mb-2 block text-sm font-bold text-[#304C43]"
                    >
                        URL
                    </label>

                    <input
                        type="url"
                        id="url"
                        name="url"
                        value="{{ old('url', $site->url) }}"
                        required
                        maxlength="255"
                        placeholder="https://example.com"
                        class="w-full rounded-xl border border-[#DCEBE8] bg-white px-4 py-3 text-sm text-[#304C43] outline-none transition placeholder:text-[#A0ABA5] focus:border-[#2F8F9D] focus:ring-2 focus:ring-[#E8F4F3]"
                    >

                    @error('url')

                        <p class="mt-2 text-xs font-medium text-[#C65353]">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- ================================================= --}}
                {{-- MONITORING INTERVAL --}}
                {{-- ================================================= --}}

                <div>

                    <label
                        for="monitoring_interval"
                        class="mb-2 block text-sm font-bold text-[#304C43]"
                    >
                        Monitoring Interval
                    </label>

                    <select
                        id="monitoring_interval"
                        name="monitoring_interval"
                        required
                        class="w-full rounded-xl border border-[#DCEBE8] bg-white px-4 py-3 text-sm text-[#304C43] outline-none transition focus:border-[#2F8F9D] focus:ring-2 focus:ring-[#E8F4F3]"
                    >

                        <option
                            value="1"
                            {{ old('monitoring_interval', $site->monitoring_interval) == 1 ? 'selected' : '' }}
                        >
                            1 minute
                        </option>

                        <option
                            value="5"
                            {{ old('monitoring_interval', $site->monitoring_interval) == 5 ? 'selected' : '' }}
                        >
                            5 minutes
                        </option>

                        <option
                            value="10"
                            {{ old('monitoring_interval', $site->monitoring_interval) == 10 ? 'selected' : '' }}
                        >
                            10 minutes
                        </option>

                        <option
                            value="15"
                            {{ old('monitoring_interval', $site->monitoring_interval) == 15 ? 'selected' : '' }}
                        >
                            15 minutes
                        </option>

                        <option
                            value="30"
                            {{ old('monitoring_interval', $site->monitoring_interval) == 30 ? 'selected' : '' }}
                        >
                            30 minutes
                        </option>

                        <option
                            value="60"
                            {{ old('monitoring_interval', $site->monitoring_interval) == 60 ? 'selected' : '' }}
                        >
                            60 minutes
                        </option>

                    </select>

                    @error('monitoring_interval')

                        <p class="mt-2 text-xs font-medium text-[#C65353]">
                            {{ $message }}
                        </p>

                    @enderror

                </div>



                {{-- ================================================= --}}
                {{-- STATUS --}}
                {{-- ================================================= --}}

                <div>

                    <label
                        class="mb-2 block text-sm font-bold text-[#304C43]"
                    >
                        Monitoring Status
                    </label>

                    <label
                        class="flex cursor-pointer items-center gap-4 rounded-xl border border-[#DCEBE8] bg-[#FAFCFB] px-4 py-3 transition hover:bg-[#F5FAF9]"
                    >

                        <input
                            type="checkbox"
                            name="is_active"
                            value="1"
                            {{ old('is_active', $site->is_active) ? 'checked' : '' }}
                            class="h-5 w-5 rounded border-[#BFDCD7] text-[#2F8F9D] focus:ring-[#2F8F9D]"
                        >

                        <div>

                            <p class="text-sm font-bold text-[#304C43]">
                                Enable Monitoring
                            </p>

                            <p class="mt-0.5 text-xs text-[#89978F]">
                                This site will be included in monitoring.
                            </p>

                        </div>

                    </label>

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- CURRENT INFO --}}
            {{-- ===================================================== --}}

            <div class="mt-8 rounded-2xl border border-[#E4DDD4] bg-[#FCFDFD] p-5">

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">

                    <div>

                        <p class="text-[11px] font-bold uppercase tracking-[0.12em] text-[#89978F]">
                            Current Information
                        </p>

                        <div class="mt-3 flex flex-wrap gap-3">

                            <span class="inline-flex items-center gap-2 rounded-lg bg-[#F4F8F7] px-3 py-2 text-xs font-semibold text-[#687870]">
                                🌐 Site #{{ $site->id }}
                            </span>

                            <span class="inline-flex items-center gap-2 rounded-lg bg-[#F4F8F7] px-3 py-2 text-xs font-semibold text-[#687870]">
                                📅
                                {{ $site->created_at ? $site->created_at->format('d/m/Y H:i') : '-' }}
                            </span>

                        </div>

                    </div>


                    <div>

                        @if ($site->is_active)

                            <span class="inline-flex items-center gap-2 rounded-lg bg-[#ECF7EF] px-3 py-2 text-xs font-extrabold text-[#3F8B5A]">

                                <span class="h-2 w-2 rounded-full bg-[#55A66F]"></span>

                                Active

                            </span>

                        @else

                            <span class="inline-flex items-center gap-2 rounded-lg bg-[#FFF4F3] px-3 py-2 text-xs font-extrabold text-[#C65353]">

                                <span class="h-2 w-2 rounded-full bg-[#C65353]"></span>

                                Inactive

                            </span>

                        @endif

                    </div>

                </div>

            </div>



            {{-- ===================================================== --}}
            {{-- ACTIONS --}}
            {{-- ===================================================== --}}

            <div class="mt-8 flex flex-col-reverse gap-3 border-t border-[#EAE5DF] pt-6 sm:flex-row sm:justify-end">

                <a
                    href="{{ route('admin.sites.index') }}"
                    class="inline-flex items-center justify-center rounded-xl border border-[#DCEBE8] bg-white px-5 py-3 text-sm font-bold text-[#687870] transition hover:bg-[#F4F8F7]"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center gap-2 rounded-xl bg-[#2F8F9D] px-5 py-3 text-sm font-bold text-white shadow-sm transition hover:bg-[#267A86] hover:shadow-md"
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
                            d="M5 13l4 4L19 7"
                        />
                    </svg>

                    Save Changes

                </button>

            </div>

        </form>

    </div>



    {{-- ========================================================= --}}
    {{-- FOOTER --}}
    {{-- ========================================================= --}}

    <div class="mt-5 flex flex-col gap-2 px-1 text-xs text-[#9AA7A1] sm:flex-row sm:items-center sm:justify-between">

        <p>
            SiteMonitor Administration
        </p>

        <p>
            Secure site modification
        </p>

    </div>

@endsection