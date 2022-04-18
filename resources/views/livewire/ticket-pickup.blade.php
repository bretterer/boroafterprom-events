<div x-data="{
        showModal: false
    }" x-init="
        Livewire.on('currentStudentSet', () => {
            showModal = true
        })
        Livewire.on('closeModal', () => {
            showModal = false
        })
        ">


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="mt-8 flex flex-col">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Search Tickets</label>
                <div class="mt-1 flex rounded-md shadow-sm">
                    <div class="relative flex items-stretch flex-grow focus-within:z-10">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <!-- Heroicon name: solid/users -->
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                            </svg>
                        </div>
                        <input wire:model="search" type="search" name="search" class="focus:ring-blue-500 focus:border-blue-500 block w-full rounded-none rounded-l-md pl-10 sm:text-sm border-gray-300" placeholder="John Doe or Order Id">
                    </div>
                    <button type="button" class="-ml-px relative inline-flex items-center space-x-2 px-4 py-2 border border-gray-300 text-sm font-medium rounded-r-md text-gray-700 bg-gray-50 hover:bg-gray-100 focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500">

                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                            <path strokeLinecap="round" strokeLinejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <span>Search</span>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">

                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Student Info</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Guest info</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Tickets</th>
                                    <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                                    <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($students as $student)
                                <tr>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <div class="text-gray-900">{{$student->first_name}} {{$student->last_name}}</div>
                                        <div class="text-gray-500">{{$student->phone}}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <div class="text-gray-900">
                                            @if($student->guest)
                                            {{$student->guest->first_name}} {{$student->guest->last_name}}
                                            @endif
                                        </div>
                                        <div class="text-gray-500">
                                            @if($student->guest)
                                            {{$student->guest->phone}}
                                            @endif
                                        </div>
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        <div class="text-gray-900">
                                            @if($student->guest)
                                            2
                                            @else
                                            1
                                            @endif
                                        </div>
                                    </td>

                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        @if($student->picked_up != null)
                                        <span class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">Picked Up</span>
                                        @elseif($student->picked_up == null && $student->paid_on != null && $student->payment_type != "cash")
                                        <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Paid</span>
                                        @elseif($student->picked_up == null && $student->paid_on == null && $student->payment_type == "cash")
                                        <span class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">Pending Payment</span>
                                        @endif
                                    </td>
                                    <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6 space-x-2">
                                        <a href="#" @click.prevent="
                                                showModel = false
                                                Livewire.emit('setCurrentStudent', '{{ $student->id }}')
                                            " class="text-blue-600 hover:text-blue-900">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="lg:px-8 md:px-6 min-w-full">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>





    <div x-show="showModal" @keydown.escape.window="showModal = false" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div x-show="showModal" x-transition:enter.duration.500ms="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave.duration.500ms="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div x-show="showModal" x-transition:enter.duration.500ms="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave.duration.500ms="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative inline-block align-bottom bg-white rounded-lg pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle">




                <div class="bg-white overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6 flex justify-between">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Ticket Information</h3>
                        <div class="flex flex-row justify-around items-center space-x-2">
                            @if($this->student->picked_up != null)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-yellow-100 text-yellow-800"> Picked Up </span>
                            @elseif($this->student->picked_up == null && $this->student->paid_on != null && $this->student->payment_type != "cash")
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800"> Paid </span>
                            @elseif($this->student->picked_up == null && $this->student->paid_on == null && $this->student->payment_type == "cash")
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800"> Pending Payment </span>
                            @endif
                            <div class="ml-3 relative hidden">
                                <div>
                                    <button type="button" class="inline-flex items-center px-2 py-1 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        Update Status
                                        <!-- Heroicon name: solid/mail -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                    <!-- Active: "bg-gray-100", Not Active: "" -->
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Pending Payment</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Picked Up</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Paid & Picked Up</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                        <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Student</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{$this->student->first_name}} {{$this->student->last_name}}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Guest</dt>
                                <dd class="mt-1 text-sm text-gray-900">@if($this->student->guest) {{$this->student->guest->first_name}} {{$this->student->guest->last_name}} @else N/A @endif</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{$this->student->email}}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900">@if($this->student->guest) {{$this->student->guest->email}} @else N/A @endif</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Parent/Guardian Number</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{$this->student->phone}}</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Parent/Guardian Number</dt>
                                <dd class="mt-1 text-sm text-gray-900">@if($this->student->guest) {{$this->student->guest->phone}} @else N/A @endif</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <dt class="text-sm font-medium text-gray-500">Tickets Purchased</dt>
                                <dd class="mt-1 text-sm text-gray-900">@if($this->student->guest) 3 @else 1 @endif</dd>
                            </div>
                            <div class="sm:col-span-1">
                                <h3 class="text-sm font-medium text-gray-500">Payment Method</h3>


                                @if($this->student->payment_type != "cash" && $this->student->payment_type != null)
                                <div class="mt-5">
                                    <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                                        <h4 class="sr-only">Visa</h4>
                                        <div class="sm:flex sm:items-start">

                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 uppercase"> {{$this->student->payment_type}} </span>
                                            <div class="mt-3 sm:mt-0 sm:ml-4">
                                                <div class="text-sm font-medium text-gray-900">Ending with {{$this->student->card_end}}</div>
                                                <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                                    <div>Expires {{$this->student->exp}}</div>
                                                    <span class="hidden sm:mx-2 sm:inline" aria-hidden="true"> · </span>
                                                    <div class="mt-1 sm:mt-0">Paid on {{$this->student->paid_on->format('M d, Y')}}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800"> PAID </span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if($this->student->payment_type == "cash")
                                <div class="mt-5">
                                    <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                                        <h4 class="sr-only">Visa</h4>
                                        <div class="sm:flex sm:items-start">

                                            <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800"> CASH </span>
                                            <div class="mt-3 sm:mt-0 sm:ml-4">
                                                <div class="text-sm font-medium text-gray-900">Cash Payment</div>
                                                <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">

                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                                            @if($this->student->paid_on != null && $this->student->payment_type = "cash")
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800"> PAID </span>
                                            @elseif($this->student->picked_up == null && $this->student->paid_on == null && $this->student->payment_type == "cash")
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800"> PENDING PAYMENT </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif


                            </div>
                        </dl>
                    </div>
                </div>
                <div class="mt-5 sm:mt-6 flex flex-row space-around space-x-2 px-4 justify-end">
                    <div class="flex-1"></div>
                    @if($this->student->picked_up == null && $this->student->payment_type != "cash")
                    <button wire:click="pickedUp" type="button" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">Mark as Picked Up</button>
                    @endif
                    @if($this->student->picked_up == null && $this->student->payment_type == "cash")
                    <button wire:click="paidAndPickedUp" type="button" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">Mark as Paid and Picked Up</button>
                    @endif
                    @if($this->student->picked_up != null)
                    <button wire:click="allowPickup" type="button" class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:col-start-2 sm:text-sm">Mark as Available for Pick Up</button>
                    @endif
                    <button @click="showModal = false" type="button" class="mt-3 inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:col-start-1 sm:text-sm">Close</button>
                </div>



            </div>
        </div>
    </div>




</div>