<x-app-layout>

    {{-- ========================================================= --}}
    {{-- HEADER --}}
    {{-- ========================================================= --}}

    <x-slot name="header">

        <div class="relative overflow-hidden rounded-3xl border border-[#d8e8e6] bg-gradient-to-r from-[#f5fbfa] via-[#eef8f7] to-[#f8f3f8] px-6 py-6 shadow-sm sm:px-8">

            {{-- Decorative elements --}}
            <div class="pointer-events-none absolute -right-20 -top-24 h-64 w-64 rounded-full bg-[#9bdedc]/20 blur-3xl"></div>

            <div class="pointer-events-none absolute -bottom-28 left-1/3 h-64 w-64 rounded-full bg-[#c9b4d5]/15 blur-3xl"></div>

            <div class="relative z-10 flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

                <div>

                    <div class="mb-2 flex items-center gap-2">

                        <span class="h-2 w-2 rounded-full bg-[#3f968d]"></span>

                        <span class="text-xs font-bold uppercase tracking-[0.18em] text-[#568b85]">
                            SiteMonitor
                        </span>

                    </div>

                    <h2 class="text-3xl font-black tracking-tight text-[#163d3a]">
                        Add Website
                    </h2>

                    <p class="mt-1 text-sm text-[#718582]">
                        Add a website and configure its monitoring settings.
                    </p>

                </div>


                {{-- Back button --}}

                <a
                    href="{{ route('sites.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-2xl border border-[#cfe1df] bg-white px-5 py-3 text-sm font-bold text-[#4f706b] shadow-sm transition duration-200 hover:-translate-y-0.5 hover:border-[#9cc9c6] hover:bg-[#f8fcfb] hover:text-[#176b70]"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"
                        />
                    </svg>

                    Back to Websites

                </a>

            </div>

        </div>

    </x-slot>


    {{-- ========================================================= --}}
    {{-- MAIN --}}
    {{-- ========================================================= --}}

    <div class="min-h-screen bg-[#f5f1e8]">

        <div class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:px-8">


            {{-- ================================================= --}}
            {{-- PAGE INTRO --}}
            {{-- ================================================= --}}

            <div class="mb-7">

                <p class="text-sm font-semibold text-[#5d8e87]">
                    Website Configuration
                </p>

                <h1 class="mt-1 text-3xl font-black tracking-tight text-[#243c39] sm:text-4xl">
                    Create a monitored website
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-[#7b8985]">
                    Enter your website information and choose how frequently SiteMonitor should check its availability.
                </p>

            </div>


            {{-- ================================================= --}}
            {{-- ERRORS --}}
            {{-- ================================================= --}}

            @if ($errors->any())

                <div class="mb-6 overflow-hidden rounded-3xl border border-[#efd0cd] bg-white shadow-sm">

                    <div class="flex gap-4 bg-[#fff6f4] px-5 py-5 sm:px-6">

                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-[#fde2df] text-[#c44743]">

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 9v4m0 4h.01M10.29 3.86l-8.1 14a2 2 0 001.73 3h16.16a2 2 0 001.73-3l-8.1-14a2 2 0 00-3.46 0z"
                                />
                            </svg>

                        </div>

                        <div>

                            <p class="text-sm font-black text-[#a84542]">
                                Please check the information below.
                            </p>

                            <ul class="mt-2 list-disc space-y-1 pl-5 text-sm text-[#9b6965]">

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


            {{-- ================================================= --}}
            {{-- FORM CARD --}}
            {{-- ================================================= --}}

            <div class="overflow-hidden rounded-3xl border border-[#dddcd5] bg-white shadow-sm">


                {{-- ================================================= --}}
                {{-- CARD HEADER --}}
                {{-- ================================================= --}}

                <div class="border-b border-[#e9e8e2] bg-gradient-to-r from-[#fafdfc] to-[#f8f5f8] px-6 py-6 sm:px-8">

                    <div class="flex items-center gap-4">

                        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-2xl bg-[#dceff0] text-[#287980]">

                            <svg
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="1.7"
                            >
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="9"
                                />

                                <path
                                    stroke-linecap="round"
                                    d="M3 12h18"
                                />

                                <path
                                    stroke-linecap="round"
                                    d="M12 3c2.2 2.4 3.3 5.4 3.3 9S14.2 18.6 12 21c-2.2-2.4-3.3-5.4-3.3-9S9.8 5.4 12 3z"
                                />

                            </svg>

                        </div>


                        <div>

                            <h2 class="text-xl font-black text-[#293e3a]">
                                Website Information
                            </h2>

                            <p class="mt-1 text-sm text-[#808d89]">
                                Provide the basic information needed to monitor your website.
                            </p>

                        </div>

                    </div>

                </div>


                {{-- ================================================= --}}
                {{-- FORM --}}
                {{-- ================================================= --}}

                <form
                    action="{{ route('sites.store') }}"
                    method="POST"
                    class="p-6 sm:p-8"
                >

                    @csrf


                    {{-- ================================================= --}}
                    {{-- BASIC INFORMATION --}}
                    {{-- ================================================= --}}

                    <div class="grid grid-cols-1 gap-7 lg:grid-cols-2">


                        {{-- Website Name --}}

                        <div>

                            <label
                                for="name"
                                class="block text-sm font-bold text-[#354540]"
                            >
                                Website Name
                            </label>

                            <p class="mt-1 text-xs leading-5 text-[#8a9692]">
                                A name to easily identify your website.
                            </p>

                            <div class="relative mt-3">

                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-[#7b9b98]">

                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M4 6.5A2.5 2.5 0 016.5 4h11A2.5 2.5 0 0120 6.5v11a2.5 2.5 0 01-2.5 2.5h-11A2.5 2.5 0 014 17.5v-11z"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            d="M8 9h8M8 13h5"
                                        />

                                    </svg>

                                </div>


                                <input
                                    id="name"
                                    type="text"
                                    name="name"
                                    value="{{ old('name') }}"
                                    placeholder="My Website"
                                    required
                                    class="block w-full rounded-2xl border border-[#dfe5e1] bg-[#fbfcfa] py-3.5 pl-12 pr-4 text-sm text-[#354540] shadow-sm outline-none transition duration-200 placeholder:text-[#a4ada9] focus:border-[#7bb5b0] focus:bg-white focus:ring-4 focus:ring-[#247f8b]/10"
                                >

                            </div>

                            @error('name')

                                <p class="mt-2 text-sm font-medium text-[#c44743]">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>


                        {{-- Website URL --}}

                        <div>

                            <label
                                for="url"
                                class="block text-sm font-bold text-[#354540]"
                            >
                                Website URL
                            </label>

                            <p class="mt-1 text-xs leading-5 text-[#8a9692]">
                                Enter the complete address of the website.
                            </p>

                            <div class="relative mt-3">

                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-[#7b9b98]">

                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                    >
                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="9"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            d="M3 12h18"
                                        />

                                    </svg>

                                </div>


                                <input
                                    id="url"
                                    type="url"
                                    name="url"
                                    value="{{ old('url') }}"
                                    placeholder="https://example.com"
                                    required
                                    class="block w-full rounded-2xl border border-[#dfe5e1] bg-[#fbfcfa] py-3.5 pl-12 pr-4 text-sm text-[#354540] shadow-sm outline-none transition duration-200 placeholder:text-[#a4ada9] focus:border-[#7bb5b0] focus:bg-white focus:ring-4 focus:ring-[#247f8b]/10"
                                >

                            </div>

                            @error('url')

                                <p class="mt-2 text-sm font-medium text-[#c44743]">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- MONITORING SETTINGS --}}
                    {{-- ================================================= --}}

                    <div class="mt-9 border-t border-[#eeeDE7] pt-8">

                        <div class="mb-6">

                            <p class="text-sm font-bold text-[#5d8e87]">
                                Monitoring Settings
                            </p>

                            <h3 class="mt-1 text-lg font-black text-[#354540]">
                                Choose your monitoring interval
                            </h3>

                            <p class="mt-1 text-sm text-[#858f8b]">
                                SiteMonitor will automatically check your website according to this interval.
                            </p>

                        </div>


                        {{-- Monitoring Interval --}}

                        <div class="max-w-xl">

                            <label
                                for="monitoring_interval"
                                class="block text-sm font-bold text-[#354540]"
                            >
                                Monitoring Interval
                            </label>

                            <p class="mt-1 text-xs leading-5 text-[#8a9692]">
                                How often should SiteMonitor check your website?
                            </p>


                            <div class="relative mt-3">

                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-[#7b9b98]">

                                    <svg
                                        class="h-5 w-5"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="1.7"
                                    >
                                        <circle
                                            cx="12"
                                            cy="12"
                                            r="9"
                                        />

                                        <path
                                            stroke-linecap="round"
                                            d="M12 7v5l3 2"
                                        />

                                    </svg>

                                </div>


                                <select
                                    id="monitoring_interval"
                                    name="monitoring_interval"
                                    required
                                    class="block w-full appearance-none rounded-2xl border border-[#dfe5e1] bg-[#fbfcfa] py-3.5 pl-12 pr-10 text-sm font-medium text-[#465752] shadow-sm outline-none transition duration-200 focus:border-[#7bb5b0] focus:bg-white focus:ring-4 focus:ring-[#247f8b]/10"
                                >

                                    <option value="1" {{ old('monitoring_interval', 5) == 1 ? 'selected' : '' }}>
                                        Every 1 minute
                                    </option>

                                    <option value="5" {{ old('monitoring_interval', 5) == 5 ? 'selected' : '' }}>
                                        Every 5 minutes
                                    </option>

                                    <option value="10" {{ old('monitoring_interval', 5) == 10 ? 'selected' : '' }}>
                                        Every 10 minutes
                                    </option>

                                    <option value="15" {{ old('monitoring_interval', 5) == 15 ? 'selected' : '' }}>
                                        Every 15 minutes
                                    </option>

                                    <option value="30" {{ old('monitoring_interval', 5) == 30 ? 'selected' : '' }}>
                                        Every 30 minutes
                                    </option>

                                    <option value="60" {{ old('monitoring_interval', 5) == 60 ? 'selected' : '' }}>
                                        Every 60 minutes
                                    </option>

                                </select>


                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-4 text-[#81918d]">

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
                                            d="M6 9l6 6 6-6"
                                        />
                                    </svg>

                                </div>

                            </div>

                            @error('monitoring_interval')

                                <p class="mt-2 text-sm font-medium text-[#c44743]">
                                    {{ $message }}
                                </p>

                            @enderror

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- INFORMATION BOX --}}
                    {{-- ================================================= --}}

                    <div class="mt-8 rounded-2xl border border-[#d8e8e6] bg-[#f6fbfa] p-5">

                        <div class="flex gap-4">

                            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#dceff0] text-[#287980]">

                                <svg
                                    class="h-5 w-5"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                >
                                    <circle
                                        cx="12"
                                        cy="12"
                                        r="9"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        d="M12 10v6"
                                    />

                                    <path
                                        stroke-linecap="round"
                                        d="M12 7h.01"
                                    />

                                </svg>

                            </div>


                            <div>

                                <p class="text-sm font-black text-[#3e6f6b]">
                                    How monitoring works
                                </p>

                                <p class="mt-1 text-sm leading-6 text-[#74837f]">
                                    SiteMonitor will automatically check your website according to the selected interval and record its status, response time and HTTP response code.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- ================================================= --}}
                    {{-- ACTIONS --}}
                    {{-- ================================================= --}}

                    <div class="mt-8 flex flex-col-reverse gap-3 border-t border-[#eeeDE7] pt-6 sm:flex-row sm:items-center sm:justify-between">

                        <a
                            href="{{ route('sites.index') }}"
                            class="inline-flex items-center justify-center rounded-2xl px-5 py-3 text-sm font-bold text-[#71807c] transition duration-200 hover:bg-[#f5f6f2] hover:text-[#3e504b]"
                        >
                            Cancel
                        </a>


                        <button
                            type="submit"
                            class="group inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-[#126b70] to-[#278590] px-6 py-3.5 text-sm font-black text-white shadow-lg shadow-[#126b70]/15 transition duration-200 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-[#126b70]/20 focus:outline-none focus:ring-4 focus:ring-[#247f8b]/15"
                        >

                            <span class="flex h-6 w-6 items-center justify-center rounded-lg bg-white/15 text-lg">
                                +
                            </span>

                            Add Website

                        </button>

                    </div>

                </form>

            </div>


            {{-- ================================================= --}}
            {{-- BOTTOM NOTE --}}
            {{-- ================================================= --}}

            <div class="mt-6 flex items-center justify-center gap-2 text-xs text-[#929c98]">

                <span class="h-1.5 w-1.5 rounded-full bg-[#4d9564]"></span>

                Your website will be monitored automatically after creation.

            </div>

        </div>

    </div>

</x-app-layout>