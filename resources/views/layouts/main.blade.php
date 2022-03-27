<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script defer src="{{ asset('js/app.js') }}"></script>

    @livewireStyles
</head>

<body class="bg-gray-100 min-h-screen">
    <header class="bg-blue-800">
        <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" aria-label="Top">
            <div class="w-full py-6 flex items-center justify-between border-b border-boro-500 lg:border-none">
                <div class="flex items-center text-white">

                    <span class="sr-only">Springboro After Prom</span>
                    <!-- <img class="h-10 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=white" alt=""> -->
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000" xml:space="preserve" class="h-10 w-auto">
                        <path fill="currentColor" d="M837.3 816.4c26.2 120.4-104.5 146.5-162.1 130.8-57.6-15.7-175-18.3-175-18.3s-117.8 2.6-175.3 18.3c-57.6 15.8-188.4-10.4-162.3-130.8C188.7 696.1 303.9 701.3 335.4 539c31.5-162.3 164.9-151.8 164.9-151.8S633.4 376.7 664.9 539c31.3 162.3 146.3 157 172.4 277.4zM621 376.6c70.9 20.5 149.1-35.5 174.9-124.9 25.8-89.4-10.7-178.4-81.5-198.8-70.9-20.5-149.1 35.5-174.9 124.9-25.8 89.3 10.7 178.4 81.5 198.8zm293.7-32.5c-68.2-27.9-152 19.4-187.2 105.6-35.2 86.2-8.4 178.6 59.9 206.4 68.2 27.8 152-19.4 187.2-105.6 35.1-86.3 8.3-178.6-59.9-206.4zm-535.8 32.5c70.9-20.5 107.3-109.5 81.5-198.8C434.6 88.4 356.2 32.5 285.5 52.9 214.7 73.4 178.2 162.4 204 251.8c25.8 89.3 104 145.3 174.9 124.8zM212.7 656c68.2-27.9 95-120.3 59.9-206.4-35.2-86.1-119-133.4-187.2-105.6-68.2 27.9-95 120.3-59.9 206.4C60.6 636.6 144.4 683.9 212.7 656z"></path>
                    </svg>

                    <div class="ml-10 space-x-8 block">
                        <div class="text-base font-medium text-white hover:text-boro-50">
                            Boro After Prom </div>


                    </div>
                </div>
            </div>

        </nav>
    </header>
    {{ $slot }}



    @livewireScripts
</body>

</html>