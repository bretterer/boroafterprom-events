<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-50">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased h-full overflow-hidden">
    <x-jet-banner />

    <div x-data="{ open: false }" @keydown.window.escape="open = false" class="flex h-full">
        <!-- Narrow sidebar -->
        <div class="hidden w-28 overflow-y-auto bg-boro-700 md:block">
            <div class="flex w-full flex-col items-center py-6">
                <div class="flex flex-shrink-0 items-center">
                    <svg viewBox="0 0 612 792" class="h-20 w-20 text-boro-100">
                        <path fill="currentColor" d="M79.31 667.66c0 12.5-9.26 17.34-24.33 17.34-5.8 0-13.24-.43-20.26-1.62-.71-4.74-.71-12.28 0-17.02 7.64 1.08 13.64 1.62 18.63 1.62 3.67 0 6.62-.32 6.62-3.55v-3.34c0-3.34-.41-4.09-6.01-6.03l-11.3-3.99c-5.19-1.83-8.14-5.92-8.14-17.34v-7.65c0-12.71 9.98-17.34 24.33-17.34 6.31 0 11.81.43 19.55 2.37.71 4.63.71 11.85 0 16.48-7.43-1.62-12.22-2.05-17.71-2.05-4.07 0-6.82.22-6.82 3.66v2.69c0 2.8.61 3.77 6.01 5.82l11.71 4.42c5.4 2.05 7.74 5.82 7.74 17.02v8.51ZM106.09 660.87v22.84c-5.4.43-13.64.54-19.45 0v-73.57h22.5c16.8 0 27.39 4.85 27.39 19.17v12.5c0 14.11-10.59 19.07-27.39 19.07h-3.05Zm10.99-26.93c0-5.82-3.77-6.79-8.25-6.79h-2.75v16.91h2.75c4.48 0 8.25-.86 8.25-6.68v-3.45ZM143.86 610.13h22.5c16.8 0 27.39 4.96 27.39 18.64v11.85c0 7.65-3.46 12.5-9.37 15.3 4.58 8.83 8.35 18.85 11.4 27.79-5.7.43-14.15.43-19.95 0-2.75-7.86-5.9-16.59-9.88-24.67h-2.65v24.67c-5.8.43-13.64.43-19.45 0v-73.57Zm30.44 23.59c0-5.82-3.77-6.57-8.25-6.57h-2.75v15.3h2.75c4.48 0 8.25-.75 8.25-6.57v-2.15ZM202.4 610.13c5.6-.43 14.05-.43 19.45 0v73.57c-5.4.43-13.85.43-19.45 0v-73.57ZM249.84 647.51v36.19c-6.11.65-13.13.65-19.24 0v-73.57c6.62-.43 13.54-.43 20.26 0l14.46 37.27v-37.27c6.92-.43 12.73-.43 19.24 0v73.57c-7.23.43-13.54.43-20.67 0l-14.05-36.19ZM323.55 657.1h-5.8c-.51-4.74-.51-10.23 0-14.97h21.99v39.86c-7.33 2.05-14.15 3.02-18.94 3.02-17 0-28.3-4.96-28.3-20.47v-35.33c0-15.51 11.3-20.47 28.3-20.47 5.5 0 10.49.54 17.41 1.94.51 4.74.51 11.74 0 16.48-5.09-.97-9.57-1.4-13.95-1.4-7.03 0-12.32.22-12.32 7.86v26.61c0 7.54 4.89 7.97 11.61 7.97v-11.1ZM396.64 666.15c0 12.5-8.35 17.56-21.18 17.56h-27.59v-73.57h25.86c13.23 0 21.69 4.85 21.69 17.02v4.74c0 7.54-3.36 11.85-9.47 13.9 6.72 2.05 10.69 6.89 10.69 15.62v4.74Zm-20.67-35.22c0-3.66-2.24-4.42-5.7-4.42h-3.05v12.6h3.05c3.46 0 5.7-.43 5.7-4.2v-3.99Zm1.22 27.36c0-4.31-2.54-5.06-5.6-5.06h-4.38v13.79h4.48c3.26 0 5.5-.97 5.5-4.95v-3.77ZM457.02 665.18c0 14.87-10.69 19.82-26.88 19.82s-26.88-4.96-26.88-19.82v-36.73c0-14.76 10.69-19.71 26.88-19.71s26.88 4.96 26.88 19.71v36.73Zm-19.45-32.86c0-5.92-3.46-6.57-7.43-6.57s-7.43.65-7.43 6.57v28.76c0 5.92 3.56 6.57 7.43 6.57s7.43-.65 7.43-6.57v-28.76ZM465.06 610.13h22.5c16.8 0 27.39 4.96 27.39 18.64v11.85c0 7.65-3.46 12.5-9.37 15.3 4.58 8.83 8.35 18.85 11.4 27.79-5.7.43-14.15.43-19.95 0-2.75-7.86-5.9-16.59-9.87-24.67h-2.65v24.67c-5.8.43-13.64.43-19.45 0v-73.57Zm30.44 23.59c0-5.82-3.77-6.57-8.25-6.57h-2.75v15.3h2.75c4.48 0 8.25-.75 8.25-6.57v-2.15ZM576.54 665.18c0 14.87-10.69 19.82-26.88 19.82s-26.88-4.96-26.88-19.82v-36.73c0-14.76 10.69-19.71 26.88-19.71s26.88 4.96 26.88 19.71v36.73Zm-19.45-32.86c0-5.92-3.46-6.57-7.43-6.57s-7.43.65-7.43 6.57v28.76c0 5.92 3.56 6.57 7.43 6.57s7.43-.65 7.43-6.57v-28.76ZM517.36 142.74v-14.61l-11.87-2.48c-.42-5.05-.42-12.96 0-18.01l71.12 19.29c.42 5.33.42 11.85 0 17.18l-71.12 19.29c-.42-5.05-.42-13.14 0-18.19l11.87-2.48Zm35.09-7.35-19.58-4.04v8.18l19.58-4.13ZM532.35 185.65h-26.86c-.21-4.87-.21-12.5 0-17.55h71.12v37.12c-4.58.46-11.25.46-15.83 0v-19.57h-12.6v17.64c-4.58.46-11.25.46-15.83 0v-17.64ZM560.67 224.06v-14.43c4.58-.55 11.35-.46 15.93 0v46.49c-4.58.55-11.35.37-15.93 0V241.6h-55.19c-.42-4.87-.42-12.5 0-17.55h55.19ZM505.49 261.73h71.12v37.12c-4.58.46-11.25.46-15.83 0v-19.57h-11.77v18.65c-4.58.46-11.14.46-15.72 0v-18.65h-11.87v19.57c-4.58.46-11.35.46-15.93 0v-37.12ZM576.61 306.1v20.31c0 15.16-4.79 24.72-18.01 24.72h-11.45c-7.39 0-12.08-3.12-14.79-8.45-8.54 4.13-18.22 7.53-26.86 10.29-.42-5.15-.42-12.77 0-18.01 7.6-2.48 16.03-5.33 23.84-8.91v-2.39H505.5c-.42-5.24-.42-12.31 0-17.55h71.12Zm-22.8 27.47c5.62 0 6.35-3.4 6.35-7.44v-2.48h-14.79v2.48c0 4.04.73 7.44 6.35 7.44h2.08ZM527.56 376.48h-22.07c-.42-4.87-.52-12.31 0-17.55h71.12v20.31c0 15.16-4.69 24.72-18.53 24.72H546c-13.64 0-18.43-9.56-18.43-24.72v-2.76Zm26.03 9.92c5.62 0 6.56-3.4 6.56-7.44v-2.48H543.8v2.48c0 4.04.83 7.44 6.46 7.44h3.33ZM576.61 410.57v20.31c0 15.16-4.79 24.72-18.01 24.72h-11.45c-7.39 0-12.08-3.12-14.79-8.45-8.54 4.13-18.22 7.53-26.86 10.29-.42-5.15-.42-12.77 0-18.01 7.6-2.48 16.03-5.33 23.84-8.91v-2.39H505.5c-.42-5.24-.42-12.31 0-17.55h71.12Zm-22.8 27.47c5.62 0 6.35-3.4 6.35-7.44v-2.48h-14.79v2.48c0 4.04.73 7.44 6.35 7.44h2.08ZM523.4 511.18c-14.37 0-19.16-9.65-19.16-24.26s4.79-24.26 19.16-24.26h35.51c14.27 0 19.05 9.65 19.05 24.26s-4.79 24.26-19.05 24.26H523.4Zm31.76-17.55c5.73 0 6.35-3.12 6.35-6.71s-.62-6.71-6.35-6.71h-27.8c-5.73 0-6.35 3.22-6.35 6.71s.62 6.71 6.35 6.71h27.8ZM539.68 559.69l-32.02-6.8c-.42-3.86-.42-6.43 0-10.29l31.71-6.71h-33.88c-.42-4.87-.42-12.4 0-17.46h71.12c.42 5.05.42 13.41 0 18.38l-36.81 11.03 36.81 11.12c.42 5.05.42 13.23 0 18.19h-71.12c-.42-4.87-.42-12.4 0-17.46h34.2ZM92.68 578.37h-58.6c0-59.97 11.68-119.41 34.72-176.68 22.37-55.6 54.17-106.1 94.51-150.09 41.02-44.73 88.43-80.03 140.92-104.92C359.74 120.35 418.3 107 478.29 107v58.6c-205.42 0-385.61 192.88-385.61 412.77Z" />
                        <circle fill="currentColor" cx="181.75" cy="545.35" r="32.38" />
                        <circle fill="currentColor" cx="222.81" cy="410.36" r="32.38" />
                        <circle fill="currentColor" cx="318.2" cy="303.41" r="32.38" />
                        <circle fill="currentColor" cx="441.92" cy="246.17" r="32.38" />
                        <path fill="currentColor" d="M475.84 366.71h-58.59l1.42 70.82-44.12-98.12-53.73 23.38 89.23 214.92h65.79v-211z" />
                    </svg>
                </div>
                <div class="mt-6 w-full flex-1 space-y-1 px-2">

                    <a href="#" class="hidden text-boro-100 hover:bg-boro-800 hover:text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-boro-800 text-white&quot;, Default: &quot;text-boro-100 hover:bg-boro-800 hover:text-white&quot;">
                        <svg class="text-boro-300 group-hover:text-white h-6 w-6" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;text-white&quot;, Default: &quot;text-boro-300 group-hover:text-white&quot;" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                        </svg>
                        <span class="mt-2">Home</span>
                    </a>

                    <a href="#" class="hidden text-boro-100 hover:bg-boro-800 hover:text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium" x-state-description="undefined: &quot;bg-boro-800 text-white&quot;, undefined: &quot;text-boro-100 hover:bg-boro-800 hover:text-white&quot;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-boro-300 group-hover:text-white h-6 w-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                        </svg>
                        <span class="mt-2">Tickets</span>
                    </a>

                    <a href="#" class="bg-boro-800 text-white group w-full p-3 rounded-md flex flex-col items-center text-xs font-medium" aria-current="page" x-state-description="undefined: &quot;bg-boro-800 text-white&quot;, undefined: &quot;text-boro-100 hover:bg-boro-800 hover:text-white&quot;">
                    <svg class="text-boro-300 group-hover:text-white h-6 w-6" x-state-description="undefined: &quot;text-white&quot;, undefined: &quot;text-boro-300 group-hover:text-white&quot;" x-description="Heroicon name: outline/user-group" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                        </svg>
                        <span class="mt-2">Attendees</span>
                    </a>



                </div>
            </div>
        </div>

        <!-- Mobile menu -->

        <div x-show="open" class="relative z-20 md:hidden" x-description="Off-canvas menu for mobile, show/hide based on off-canvas menu state." x-ref="dialog" aria-modal="true" style="display: none;">

            <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Off-canvas menu backdrop, show/hide based on off-canvas menu state." class="fixed inset-0 bg-gray-600 bg-opacity-75" style="display: none;"></div>


            <div class="fixed inset-0 z-40 flex">

                <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full" x-description="Off-canvas menu, show/hide based on off-canvas menu state." class="relative flex w-full max-w-xs flex-1 flex-col bg-boro-700 pt-5 pb-4" @click.away="open = false" style="display: none;">

                    <div x-show="open" x-transition:enter="ease-in-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute top-1 right-0 -mr-14 p-1" x-description="Close button, show/hide based on off-canvas menu state." style="display: none;">
                        <button type="button" class="flex h-12 w-12 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-white" @click="open = false">
                            <svg class="h-6 w-6 text-white" x-description="Heroicon name: outline/x-mark" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span class="sr-only">Close sidebar</span>
                        </button>
                    </div>

                    <div class="flex flex-shrink-0 items-center px-4">
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=white" alt="Your Company">
                    </div>
                    <div class="mt-5 h-0 flex-1 overflow-y-auto px-2">
                        <nav class="flex h-full flex-col">
                            <div class="space-y-1">

                                <a href="#" class="hidden text-boro-100 hover:bg-boro-800 hover:text-white group py-2 px-3 rounded-md flex items-center text-sm font-medium" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;bg-boro-800 text-white&quot;, Default: &quot;text-boro-100 hover:bg-boro-800 hover:text-white&quot;">
                                    <svg class="text-boro-300 mr-3 group-hover:text-white h-6 w-6" x-state:on="Current" x-state:off="Default" x-state-description="Current: &quot;text-white&quot;, Default: &quot;text-boro-300 group-hover:text-white&quot;" x-description="Heroicon name: outline/home" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                                    </svg>
                                    <span>Home</span>
                                </a>

                                <a href="#" class="hidden text-boro-100 hover:bg-boro-800 hover:text-white group py-2 px-3 rounded-md flex items-center text-sm font-medium" x-state-description="undefined: &quot;bg-boro-800 text-white&quot;, undefined: &quot;text-boro-100 hover:bg-boro-800 hover:text-white&quot;">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-boro-300 mr-3 group-hover:text-white h-6 w-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                                    </svg>
                                    <span>Tickets</span>
                                </a>

                                <a href="#" class="bg-boro-800 text-white group py-2 px-3 rounded-md flex items-center text-sm font-medium" aria-current="page" x-state-description="undefined: &quot;bg-boro-800 text-white&quot;, undefined: &quot;text-boro-100 hover:bg-boro-800 hover:text-white&quot;">
                                    <svg class="text-boro-300 mr-3 group-hover:text-white h-6 w-6" x-state-description="undefined: &quot;text-white&quot;, undefined: &quot;text-boro-300 group-hover:text-white&quot;" x-description="Heroicon name: outline/user-group" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                    </svg>
                                    <span>Attendees</span>
                                </a>

                            </div>
                        </nav>
                    </div>
                </div>

                <div class="w-14 flex-shrink-0" aria-hidden="true">
                    <!-- Dummy element to force sidebar to shrink to fit close icon -->
                </div>
            </div>
        </div>


        <!-- Content area -->
        <div class="flex flex-1 flex-col overflow-hidden">
            <header class="w-full">
                <div class="relative z-10 flex h-16 flex-shrink-0 border-b border-gray-200 bg-white shadow-sm">
                    <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-boro-500 md:hidden" @click="open = true">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="h-6 w-6" x-description="Heroicon name: outline/bars-3-bottom-left" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12"></path>
                        </svg>
                    </button>
                    <div class="flex flex-1 justify-between px-4 sm:px-6">
                        <div class="flex flex-1">

                        </div>
                        <div class="ml-2 flex items-center space-x-4 sm:ml-6 sm:space-x-6">
                            <!-- Profile dropdown -->
                            <div x-data="{profileMenuOpen: false}" @keydown.escape.stop="profileMenuOpen = false" @click.away="profileMenuOpen = false" class="relative flex-shrink-0">
                                <div>
                                    <button type="button" class="flex rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-boro-500 focus:ring-offset-2" id="user-menu-button" x-ref="button" @click="profileMenuOpen = !profileMenuOpen;">
                                        <span class="sr-only">Open user menu</span>
                                        <img class="hidden h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1517365830460-955ce3ccd263?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=8&amp;w=256&amp;h=256&amp;q=80" alt="">
                                        <img class="h-8 w-8 rounded-full" src="https://www.gravatar.com/avatar/{{md5(auth()->user()->email)}}?d=robohash" alt="">
                                    </button>
                                </div>

                                <div x-show="profileMenuOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" x-ref="menu-items" x-description="Dropdown menu, show/hide based on menu state." role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" style="display: none;">

                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" x-state:on="Active" x-state:off="Not Active" role="menuitem" tabindex="-1" id="user-menu-item-0" @click="profileMenuOpen = false;">Your Profile</a>

                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1" @click="profileMenuOpen = false;">Sign out</a>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <main class="flex-1 overflow-y-auto">
                <div class="py-6">
                    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
</body>

</html>