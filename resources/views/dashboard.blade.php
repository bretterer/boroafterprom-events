<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- Secondary column (hidden on smaller screens) -->
    <aside class="hidden w-96 overflow-y-auto border-l border-gray-200 bg-white lg:block">
        <!-- Your content -->
        List
    </aside>

    <main class="flex-1 overflow-y-auto">
        <!-- Primary column -->
        <section aria-labelledby="primary-heading" class="flex h-full min-w-0 flex-1 flex-col lg:order-last">
            <!-- Your content -->
            Main
        </section>
    </main>

</x-app-layout>
