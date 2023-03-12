<div x-data="{show: false}"
    x-init="
        Livewire.on('currentAttendeeSet', () => {
            show = true
        })
        ">


    <div  x-show="show" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            x-show="show"
            ></div>

        <div class="fixed inset-0 z-10 overflow-y-auto">
            <div class="flex min-h-0 items-end justify-center p-4 text-center sm:items-center sm:p-0">
                <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-xl sm:p-6"
                    x-transition:enter="ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave="ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                    x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    x-show="show">
                    <div>







                        <section aria-labelledby="applicant-information-title">
                            <div class="bg-white shadow sm:rounded-lg">
                                <div class="flex items-center">
                                    <div class="flex-1 px-4 py-5 sm:px-6">
                                        <h2 id="applicant-information-title"
                                            class="text-lg font-medium leading-6 text-gray-900">{{ $attendee->first_name }} {{ $attendee->last_name }}</h2>
                                        <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $attendee->email }}</p>
                                    </div>
                                    <div class="mr-4">
                                        <button @click="show=false" class="bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded-full">
                                            Close
                                        </button>
                                    </div>
                                </div>
                                <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                                    <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Checked In</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span>3/5/2023 8:48PM</span>
                                                <button
                                                    class="bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                    Check In
                                                </button>
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Checked Out</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span>N/A</span>
                                                <button
                                                    class="bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                    Check Out
                                                </button>
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Ticket Purchased</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span>N/A</span>
                                                <button disabled
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                                    Paid
                                                </button>
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-1">
                                            <dt class="text-sm font-medium text-gray-500">Ticket Picked Up</dt>
                                            <dd class="mt-1 text-sm text-gray-900 flex flex-col">
                                                <span>N/A</span>
                                                <button
                                                    class="bg-boro-500 hover:bg-boro-700 text-white font-bold py-2 px-4 rounded">
                                                    Pick Up
                                                </button>
                                            </dd>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Payment method</h3>
                                            <div class="mt-5">
                                                <div
                                                    class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                                                    <h4 class="sr-only">Visa</h4>
                                                    <div class="sm:flex sm:items-start">
                                                        <svg class="h-8 w-auto sm:h-6 sm:flex-shrink-0"
                                                            viewBox="0 0 36 24" aria-hidden="true">
                                                            <rect width="36" height="24" fill="#224DBA"
                                                                rx="4" />
                                                            <path fill="#fff"
                                                                d="M10.925 15.673H8.874l-1.538-6c-.073-.276-.228-.52-.456-.635A6.575 6.575 0 005 8.403v-.231h3.304c.456 0 .798.347.855.75l.798 4.328 2.05-5.078h1.994l-3.076 7.5zm4.216 0h-1.937L14.8 8.172h1.937l-1.595 7.5zm4.101-5.422c.057-.404.399-.635.798-.635a3.54 3.54 0 011.88.346l.342-1.615A4.808 4.808 0 0020.496 8c-1.88 0-3.248 1.039-3.248 2.481 0 1.097.969 1.673 1.653 2.02.74.346 1.025.577.968.923 0 .519-.57.75-1.139.75a4.795 4.795 0 01-1.994-.462l-.342 1.616a5.48 5.48 0 002.108.404c2.108.057 3.418-.981 3.418-2.539 0-1.962-2.678-2.077-2.678-2.942zm9.457 5.422L27.16 8.172h-1.652a.858.858 0 00-.798.577l-2.848 6.924h1.994l.398-1.096h2.45l.228 1.096h1.766zm-2.905-5.482l.57 2.827h-1.596l1.026-2.827z" />
                                                        </svg>
                                                        <div class="mt-3 sm:mt-0 sm:ml-4">
                                                            <div class="text-sm font-medium text-gray-900">Ending with
                                                                4242</div>
                                                            <div
                                                                class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                                                <div>Expires 12/20</div>
                                                                <span class="hidden sm:mx-2 sm:inline"
                                                                    aria-hidden="true">&middot;</span>
                                                                <div class="mt-1 sm:mt-0">Last updated on 22 Aug 2017
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0 hidden">
                                                        <button type="button"
                                                            class="inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:text-sm">Refund</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="sm:col-span-2">
                                            <h3 class="text-lg font-medium leading-6 text-gray-900">Event Log</h3>
                                            <ul role="list" class="-mb-8">
                                                <li>
                                                    <div class="relative pb-8">
                                                        <span
                                                            class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                            aria-hidden="true"></span>
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                <span
                                                                    class="h-8 w-8 rounded-full bg-gray-400 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white" viewBox="0 0 20 20"
                                                                        fill="currentColor" aria-hidden="true">
                                                                        <path
                                                                            d="M10 8a3 3 0 100-6 3 3 0 000 6zM3.465 14.493a1.23 1.23 0 00.41 1.412A9.957 9.957 0 0010 18c2.31 0 4.438-.784 6.131-2.1.43-.333.604-.903.408-1.41a7.002 7.002 0 00-13.074.003z" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">Check In SMS Sent
                                                                        to {phone_number}</p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-09-20">Sep 20</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="relative pb-8">
                                                        <span
                                                            class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                            aria-hidden="true"></span>
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                <span
                                                                    class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white" viewBox="0 0 20 20"
                                                                        fill="currentColor" aria-hidden="true">
                                                                        <path
                                                                            d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">Checked In</p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-09-22">Sep 22</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="relative pb-8">
                                                        <span
                                                            class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                            aria-hidden="true"></span>
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                <span
                                                                    class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">Event Reminder
                                                                        Email</p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-09-28">Sep 28</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="relative pb-8">
                                                        <span
                                                            class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200"
                                                            aria-hidden="true"></span>
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                <span
                                                                    class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path
                                                                            d="M1 8.25a1.25 1.25 0 112.5 0v7.5a1.25 1.25 0 11-2.5 0v-7.5zM11 3V1.7c0-.268.14-.526.395-.607A2 2 0 0114 3c0 .995-.182 1.948-.514 2.826-.204.54.166 1.174.744 1.174h2.52c1.243 0 2.261 1.01 2.146 2.247a23.864 23.864 0 01-1.341 5.974C17.153 16.323 16.072 17 14.9 17h-3.192a3 3 0 01-1.341-.317l-2.734-1.366A3 3 0 006.292 15H5V8h.963c.685 0 1.258-.483 1.612-1.068a4.011 4.011 0 012.166-1.73c.432-.143.853-.386 1.011-.814.16-.432.248-.9.248-1.388z" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">Ticket
                                                                        Confirmation Emailed</p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-09-30">Sep 30</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="relative pb-8">
                                                        <div class="relative flex space-x-3">
                                                            <div>
                                                                <span
                                                                    class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white">
                                                                    <svg class="h-5 w-5 text-white"
                                                                        viewBox="0 0 20 20" fill="currentColor"
                                                                        aria-hidden="true">
                                                                        <path fill-rule="evenodd"
                                                                            d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z"
                                                                            clip-rule="evenodd" />
                                                                    </svg>
                                                                </span>
                                                            </div>
                                                            <div
                                                                class="flex min-w-0 flex-1 justify-between space-x-4 pt-1.5">
                                                                <div>
                                                                    <p class="text-sm text-gray-500">Ticket
                                                                        Purchsed</a></p>
                                                                </div>
                                                                <div
                                                                    class="whitespace-nowrap text-right text-sm text-gray-500">
                                                                    <time datetime="2020-10-04">Oct 4</time>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>



                                    </dl>
                                </div>
                            </div>
                        </section>








                    </div>
                </div>
            </div>
        </div>


    </div>
