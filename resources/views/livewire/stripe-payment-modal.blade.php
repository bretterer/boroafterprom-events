<div id="stripe-payment-modal-container">

    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">

            <div x-transition:enter.duration.500ms="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave.duration.500ms="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-transition:enter.duration.500ms="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave.duration.500ms="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-sm sm:w-full sm:p-6">

                <div>

                    <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-blue-600 border-4 border-white -mt-12">
                        <svg class="h-8 w-8 text-white" version="1.0" viewBox="0 0 256 262" fill="currentColor">
                            <path d="M204.9.4c-.2.2-6.1.9-13.1 1.5-25.3 2.3-48.8 9-71.7 20.6-20.9 10.5-36.7 22-54.7 39.9-17.7 17.8-30 35.1-40.9 58.1-12.7 26.6-19.3 52.8-21 83.2L2.9 214h26.9l.6-3.1c.3-1.7.6-5.5.6-8.3 0-17.2 7.2-45.9 16.6-66.4 1.9-4.1 3.4-7.5 3.4-7.8 0-.7 11.3-19 14.8-23.9 31.4-43.9 80.9-71.6 134.5-75.1l9.7-.6V0h-2.3c-1.3 0-2.6.2-2.8.4zM222 6.9c0 3.2.3 3.9 1.5 3.5 1.8-.7 4.5 1.2 4.5 3.2 0 .9-1.1 1.4-3 1.4-2.8 0-3 .3-3 3.6v3.7l10.8-.5c9-.4 11.6-.9 16.5-3.2 5.6-2.7 5.8-2.9 5.5-6.4-.3-3-.9-3.8-4.2-5.5-2.1-1.1-6.2-2.1-9-2.3-2.8-.1-8.4-.5-12.3-.9l-7.3-.7v4.1zm25.3 6.2c-.4.4-3.9 1.1-7.7 1.5-6.3.6-6.8.6-6.4-1.2.2-1.4 1.4-2 4.8-2.4 4.8-.6 10.7.7 9.3 2.1zM222 31v4h15v3.5c0 3.2.2 3.5 3 3.5s3-.3 3-3.5.2-3.5 3-3.5 3 .3 3 3.5.2 3.5 3 3.5h3V27h-33v4zm27.5 14.8c-.3.3-.5 1.4-.5 2.4 0 1.7-1.1 1.8-13.5 1.8H222v7h27v2.5c0 2.1.5 2.5 3 2.5h3v-7.9c0-7.6-.1-7.9-2.5-8.3-1.3-.3-2.7-.3-3 0z" />
                            <path d="M187.5 46.9c-6.8 2.9-11.9 13.3-9.5 19.3 3.2 8 8.3 11.8 15.7 11.8 7.4 0 15.3-8.3 15.3-16 0-4.3-3.3-10.4-7.1-13.1-3.4-2.4-11-3.5-14.4-2zM222 73c0 7.8.1 8 2.4 8 2.1 0 2.5-.5 2.8-3.8.3-3.7.3-3.7 5.1-4l4.7-.3V77c0 3.9.1 4.1 2.8 3.8 2.3-.3 2.7-.8 3-4.1.3-3.4.6-3.7 3.3-3.7 2.7 0 2.9.2 2.9 4s.2 4 3 4h3V65h-33v8zm-92.5-1.7c-4.1 1.9-8.2 6.9-9.6 11.7-2.2 7.2 2.1 15.9 9.5 19.4 13.6 6.4 27.4-8.8 20.6-22.8-1.2-2.5-3.5-5.5-5.1-6.6-3.7-2.7-11.4-3.5-15.4-1.7zM222 90v4h7.5c5.7 0 7.5.3 7.5 1.4 0 1.4-4.2 2.6-9 2.6-5 0-6 .9-6 5.2 0 3.7.2 4 2.3 3.4 9.2-2.3 13.1-2.7 15.1-1.8 3.7 1.8 5.5 2.1 6.1 1.2.4-.6 1.7-1 3-1 4.5 0 6.5-3.5 6.5-11.7V86h-33v4zm26.8 5.7c.4 2.4-3.4 3.9-5.5 2.1-1.9-1.5-1.6-2.7 1-3.8 3-1.2 4.1-.7 4.5 1.7zM151.5 109c-4.9 2.2-9.5 3.9-10.1 4-4 .1-2.9 5 5.1 23.5.7 1.6 2.1 5.2 3 8 1 2.7 2.1 5.4 2.5 6 .4.5 1.5 3.2 2.5 6 .9 2.7 2.3 6.3 3.1 8 .7 1.6 4.1 10 7.4 18.5 3.4 8.5 7.6 19 9.3 23.3l3.1 7.7H209v-97h-26v18.2c0 10.6-.4 17.8-.9 17.2-.5-.5-5-10.8-10.1-22.9-5.1-12.1-9.8-22.5-10.4-23.2-.8-.9-3.2-.3-10.1 2.7zm70.5 5v4h14.7l.6 4.1c.7 5.2 2.3 6.9 6.7 7 5.9.2 6.8 0 9-2.3 1.6-1.8 2-3.5 2-9.5V110h-33v4zm27 6.1c0 1.7-.5 2-3.2 1.7-2.2-.2-3.4-.9-3.6-2.1-.3-1.4.4-1.7 3.2-1.7 3 0 3.6.4 3.6 2.1zM83.4 122c-4.6 2.3-8.4 8.6-8.4 14 0 7.9 7.7 16 15.3 16 15.9 0 21.6-22.1 7.7-29.9-4.7-2.6-9.3-2.7-14.6-.1zM222 137.1v4l7.3-.2c5.5-.2 7.2.1 7.2 1.1 0 1.7-3.5 2.8-9.7 2.9l-4.8.1v8.6l7.2-1.4c5.7-1.2 7.9-1.2 10.5-.3 4.1 1.5 10.1.5 13.1-2.2 1.9-1.8 2.2-3.1 2.2-9.4V133h-33v4.1zm27 5.3c0 1.7-.7 2.5-2.4 2.8-4 .8-6.6-3.5-2.8-4.5 4.1-1.1 5.2-.7 5.2 1.7zm-20 15.5c-5.1 1.3-6.2 2.6-6.8 7.9-.4 4.4-.1 5.4 2.1 7.6 2.5 2.5 3.1 2.6 14.2 2.6 11.3 0 11.7-.1 14-2.6 3-3.2 3.3-8.8.7-12.2-1-1.3-3.6-2.7-5.7-3.2-4.4-1.1-14.6-1.1-18.5-.1zm17.8 6.7c1.3.4 2.2 1.4 2.2 2.5 0 1.7-.9 1.9-10.4 1.9-10.8 0-13.7-1-10.1-3.7 1.9-1.3 14-1.8 18.3-.7zM65.2 180.8c-7.6 2.4-13.4 12.4-11.1 19.3C56.8 208 62.2 212 70 212c8.8 0 15-5.5 15.8-14 .5-5.8-1.7-10.9-6.3-14.5-3.6-2.6-10.3-3.9-14.3-2.7zm156.8 4.4v4.3h11.7c7.4 0 11.8.4 12 1.1.6 1.8-6.9 3.4-15.6 3.4H222v8h9.9c8.4 0 10.2.3 12.2 2 2.8 2.3 3.5 2.1-10.8 2l-11.3-.1v8.1h33v-5.3c0-5-.2-5.3-4-7.7-4.6-2.8-4.9-3.7-1.7-5 4.8-2 5.7-3.5 5.7-9.4V181h-33v4.2zM7.3 226.4c-1.7.8-3.9 2.6-4.9 4.1-1.5 2.3-1.5 2.9-.3 5.2.8 1.4 4 4.8 7.1 7.6 5.8 5 7.5 8.8 4.4 10-2 .8-3.6-1.3-3.6-4.5 0-2.7-.2-2.8-4.5-2.8-4.2 0-4.5.2-4.5 2.5 0 3.4 2.5 8.2 4.9 9.5 1.1.5 4.2 1 6.9 1 6 0 9.9-2.6 10.8-7.4.9-4.8-1.7-9-8.1-13.1-5.6-3.6-6.8-5.8-3.8-6.9 1.6-.7 4.3 1.6 4.3 3.6 0 1 6.7 1.1 7.3 0 .8-1.5-1.4-7.2-3.2-8.1-3.4-1.9-9.5-2.2-12.8-.7zm121.8-.5c-4.5 1.3-6.4 5.3-6.9 14.6-.6 10.9 1 17 4.9 19 3.3 1.8 9 2 10.6.4.8-.8 1.7-.8 3.3.1 3.3 1.8 4 0 4-10.8V240h-5.5c-4.7 0-5.5.3-5.5 1.9 0 1 .7 2.4 1.5 3.1 1.9 1.6 2 7.4.1 8.9-.7.6-2.1.9-3 .5-1.3-.5-1.6-2.4-1.6-11.5V232h2.5c2 0 2.5.5 2.5 2.5 0 2.2.4 2.5 3.9 2.5 2.2 0 4.2-.4 4.6-1 .7-1.2-1.7-7.1-3.6-8.6-1.9-1.5-8.8-2.4-11.8-1.5zm55.2.2c-4.9 1.4-6.6 4.8-7.1 14.3-.7 14.1 2.2 18.6 12.1 18.6 6.3 0 8.4-1.2 9.7-5.8 1.5-5.5 1.2-18.4-.5-22.5-2.1-5-7.1-6.6-14.2-4.6zm6.5 6.1c.8.8 1.2 4.6 1.2 10.4 0 7.2-.3 9.4-1.6 10.5-2.8 2.3-4.4-1.4-4.4-10.4 0-9.9 1.7-13.6 4.8-10.5zm49.2-6.6c-6.2 2.2-8 6-8 17.1 0 12.2 2.9 16.3 11.3 16.3 3.8 0 5.3-.5 7.2-2.5 2.4-2.3 2.5-3 2.5-13.9 0-10.5-.2-11.7-2.2-14-2.3-2.5-7.8-4-10.8-3zm4.5 17c0 9-.3 10.9-1.5 10.9s-1.6-1.9-1.8-9.9c-.3-10.7.1-13 2.1-12.3.8.2 1.2 3.4 1.2 11.3zM53.4 226.9c-.2.2-.4 7.6-.4 16.3V259h9.5l-.3-6.2c-.4-10.1 3.4-12.3 4.4-2.7 1 8.8 1.1 8.9 5.2 8.9h3.9l-1.4-6.8c-1.2-5.4-1.2-7.4-.2-10.4 1.3-4 .7-11.4-1-13.1-1.1-1.1-18.8-2.7-19.7-1.8zm13.4 6.3c1.8 1.8 1.4 4.6-.8 5.8-2.8 1.5-4 .5-4-3.6 0-2.6.4-3.4 1.8-3.4 1 0 2.3.5 3 1.2zm18-6.4-3.8.3V259h8.5l-.2-16.1c-.1-8.9-.4-16.2-.5-16.3-.2 0-2 0-4 .2zm66.6.1c-.2.2-.4 7.6-.4 16.3V259h8c7.3 0 8.3-.3 10.5-2.5 1.9-1.9 2.5-3.5 2.5-7 0-2.6-.5-5.6-1.1-6.7-.8-1.4-.8-2.3 0-3.1 1.6-1.6 1.3-7.9-.4-10.1-1.2-1.6-3.2-2.1-10.1-2.6-4.7-.3-8.7-.3-9-.1zm12.2 7.7c.7 2.8-1.6 6.1-3.5 5-1.2-.8-1.5-5.9-.4-6.9 1.4-1.5 3.3-.6 3.9 1.9zm0 11.9c1.5 2.3 1.5 2.7 0 5.1-2.2 3.2-4 2.6-4.4-1.5-.6-6.2 1.5-8 4.4-3.6zM29 242.9V259h7.9l.3-7.2.3-7.3 4.9-.7c2.7-.4 5.3-1.3 5.8-2 2.4-3.7 2.2-8.5-.6-12.3-1.2-1.7-2.8-2.1-10-2.4l-8.6-.3v16.1zm12.6-8.2c.8 3.2-2 6-4.3 4.2-1.4-1.2-1.8-5.1-.6-6.2 1.6-1.7 4.3-.6 4.9 2zM96 243v16h8v-9.5c0-7.4.3-9.5 1.4-9.5 1.7 0 2.4 2.6 3.3 11.7l.6 7.3h7.7v-32h-4.1c-4 0-4.1.1-3.7 3 .7 4.4-.9 4.7-3.3.6-1.8-3.2-2.6-3.6-6-3.6H96v16zm109-.1V259h9v-6.9c0-6.1 1.1-9.3 2.6-7.8.3.3 1 3.7 1.6 7.6l1 7.1h7.8l-.6-4.2c-.3-2.4-1-5.8-1.6-7.6-.7-2.4-.6-3.7.3-4.8.7-.9 1.3-3.8 1.3-6.5 0-7.3-1.5-8.3-12.4-8.7l-9-.4v16.1zm14.1-8.7c1 1.8.8 2.4-1.1 4-2.9 2.3-4 1.5-4-2.8 0-2.7.4-3.4 2-3.4 1 0 2.5 1 3.1 2.2z" />
                        </svg>

                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Springboro Afterprom Tickets</h3>

                        <span class="inline-flex items-center px-3 py-0.5 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800 z-50"> Test Mode </span>
                        <div class="mt-2">
                            <div id="payment-element" wire:ignore class="py-6 px-2">
                                <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display Element errors. -->
                            <div id="card-errors" wire:ignore role="alert"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6">
                    <button type="button" class="inline-flex justify-center w-full rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:text-sm">Pay $10.00</button>
                </div>
                <div class="mt-3 text-center w-full text-blue-600">
                    <a href="https://stripe.com" target="_blank">
                        <svg data-name="Layer 1" class="mx-auto h-auto w-24" fill="currentColor" viewBox="0 0 150 34">
                            <path d="M146 0H3.73A3.73 3.73 0 0 0 0 3.73v26.54A3.73 3.73 0 0 0 3.73 34H146a4 4 0 0 0 4-4V4a4 4 0 0 0-4-4Zm3 30a3 3 0 0 1-3 3H3.73A2.74 2.74 0 0 1 1 30.27V3.73A2.74 2.74 0 0 1 3.73 1H146a3 3 0 0 1 3 3Z" class="cls-1" />
                            <path d="M17.07 11.24h-4.3V22h1.92v-4.16h2.38c2.4 0 3.9-1.16 3.9-3.3s-1.5-3.3-3.9-3.3Zm-.1 5h-2.28v-3.3H17c1.38 0 2.11.59 2.11 1.65s-.76 1.6-2.11 1.6ZM25.1 14a3.77 3.77 0 0 0-3.8 4.09 3.81 3.81 0 1 0 7.59 0A3.76 3.76 0 0 0 25.1 14Zm0 6.67c-1.22 0-2-1-2-2.58s.76-2.58 2-2.58 2 1 2 2.58-.79 2.57-2 2.57Zm11.68-1.32-1.41-5.22h-1.48l-1.4 5.22-1.42-5.22h-1.85l2.37 7.88h1.56l1.44-5.16 1.44 5.16h1.56l2.37-7.88h-1.78l-1.4 5.22zM44 14a3.83 3.83 0 0 0-3.75 4.09 3.79 3.79 0 0 0 3.83 4.09A3.47 3.47 0 0 0 47.49 20L46 19.38a1.78 1.78 0 0 1-1.83 1.26A2.12 2.12 0 0 1 42 18.47h5.52v-.6C47.54 15.71 46.32 14 44 14Zm-1.93 3.13A1.92 1.92 0 0 1 44 15.5a1.56 1.56 0 0 1 1.69 1.62Zm8.62-1.83v-1.17h-1.8V22h1.8v-4.13a1.89 1.89 0 0 1 2-2 4.68 4.68 0 0 1 .66 0v-1.8h-.51a2.29 2.29 0 0 0-2.15 1.23Zm6.79-1.3a3.83 3.83 0 0 0-3.75 4.09 3.79 3.79 0 0 0 3.83 4.09A3.47 3.47 0 0 0 60.93 20l-1.54-.59a1.78 1.78 0 0 1-1.83 1.26 2.12 2.12 0 0 1-2.1-2.17H61v-.6c0-2.19-1.24-3.9-3.52-3.9Zm-1.93 3.13a1.92 1.92 0 0 1 1.92-1.62 1.56 1.56 0 0 1 1.69 1.62ZM67.56 15a2.85 2.85 0 0 0-2.26-1c-2.21 0-3.47 1.85-3.47 4.09s1.26 4.09 3.47 4.09a2.82 2.82 0 0 0 2.26-1V22h1.8V11.24h-1.8Zm0 3.35a2 2 0 0 1-2 2.28c-1.31 0-2-1-2-2.52s.7-2.52 2-2.52c1.11 0 2 .81 2 2.29ZM79.31 14A2.88 2.88 0 0 0 77 15v-3.76h-1.8V22H77v-.83a2.86 2.86 0 0 0 2.27 1c2.2 0 3.46-1.86 3.46-4.09S81.51 14 79.31 14ZM79 20.6a2 2 0 0 1-2-2.28v-.47c0-1.48.84-2.29 2-2.29 1.3 0 2 1 2 2.52s-.75 2.52-2 2.52Zm7.93-.94L85 14.13h-1.9l2.9 7.59-.3.74a1 1 0 0 1-1.14.79 4.12 4.12 0 0 1-.6 0v1.51a4.62 4.62 0 0 0 .73.05 2.67 2.67 0 0 0 2.78-2l3.24-8.62h-1.89ZM125 12.43a3 3 0 0 0-2.13.87l-.14-.69h-2.39v12.92l2.72-.59v-3.13a3 3 0 0 0 1.93.7c1.94 0 3.72-1.59 3.72-5.11 0-3.22-1.8-4.97-3.71-4.97Zm-.65 7.63a1.61 1.61 0 0 1-1.28-.52v-4.11a1.64 1.64 0 0 1 1.3-.55c1 0 1.68 1.13 1.68 2.58s-.69 2.6-1.7 2.6Zm9.38-7.63c-2.62 0-4.21 2.26-4.21 5.11 0 3.37 1.88 5.08 4.56 5.08a6.12 6.12 0 0 0 3-.73v-2.25a5.79 5.79 0 0 1-2.7.62c-1.08 0-2-.39-2.14-1.7h5.38v-1c.09-2.87-1.27-5.13-3.89-5.13Zm-1.47 4.07c0-1.26.77-1.79 1.45-1.79s1.4.53 1.4 1.79ZM113 13.36l-.17-.82h-2.32v9.71h2.68v-6.58a1.87 1.87 0 0 1 2.05-.58v-2.55a1.8 1.8 0 0 0-2.24.82Zm-13.54 2.1c0-.44.36-.61.93-.61a5.9 5.9 0 0 1 2.7.72v-2.63a7 7 0 0 0-2.7-.51c-2.21 0-3.68 1.18-3.68 3.16 0 3.1 4.14 2.6 4.14 3.93 0 .52-.44.69-1 .69a6.78 6.78 0 0 1-3-.9V22a7.38 7.38 0 0 0 3 .64c2.26 0 3.82-1.15 3.82-3.16-.05-3.36-4.21-2.76-4.21-4.02Zm7.82-5.22-2.65.58v8.93a2.77 2.77 0 0 0 2.82 2.87 4.16 4.16 0 0 0 1.91-.37V20c-.35.15-2.06.66-2.06-1v-4h2.06v-2.34h-2.06Zm8.97 1.46 2.73-.57V8.97l-2.73.57v2.16zm0 .91h2.73v9.64h-2.73z" class="cls-1" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe("{{config('services.stripe.publishable_key')}}");

        var elements = stripe.elements();
        var cardNumberElement = elements.create('cardNumber');
        var cardExpiryElement = elements.create('cardExpiry');
        var cardCvcElement = elements.create('cardCvc');

        
    </script>
</div>