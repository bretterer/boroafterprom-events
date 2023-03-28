<x-guest-layout>
    <div class="bg-white overflow-hidden shadow rounded-lg max-w-3xl sm:mx-auto mt-12 mx-4">
        <div class="px-4 py-5 sm:p-6">
            <div class="bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                        <!-- Heroicon name: outline/check -->
                        <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-5">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Order successful</h3>
                        <div class="mt-2 ">
                            <p class="text-lg text-gray-500">THIS IS NOT YOUR TICKET!</p>
                            <p class="text-sm text-gray-500">Pickup will happen at lunch <span class="font-bold text-xl">April 21</span> and <span class="font-bold text-xl">April 22</span> at lunch, Please take a screenshot of this page for your ticket pickup!</p>
                            @if($attendee->ticket->payment_type == "cash")
                            <p class="text-sm text-gray-500">You chose to pay with cash, Please bring cash with you to lunch one of these days.</p>
                            @endif
                        </div>

                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                <span class="text-xl font-bold">Order Number: </span><span class="font-normal">{{ explode('-', $attendee->ticket->uuid)[0] }}</span>
                            </p>
                        </div>
                    </div>

                    <div class="mt-10">
                        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">
                            <div class="relative">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{$attendee->first_name}} {{$attendee->last_name}}</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    {{$attendee->email}}<br />
                                    {{$attendee->phone}}
                                </dd>
                            </div>

                            @if($attendee->guest)
                            <div class="relative">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-indigo-500 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">{{$attendee->guest->first_name}} {{$attendee->guest->last_name}}</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    {{$attendee->guest->email}}<br />
                                    {{$attendee->guest->phone}}
                                </dd>
                            </div>
                            @endif
                        </dl>

                        @if($attendee->ticket->payment_type != "cash" && $attendee->ticket->payment_type != null)
                        <div class="mt-5">
                            <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                                <div class="sm:flex sm:items-start">

                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800 uppercase"> {{$paymentInfo->payment_method_details->card->brand}} </span>
                                    <div class="mt-3 sm:mt-0 sm:ml-4">
                                        <div class="text-sm font-medium text-gray-900">Ending with {{$paymentInfo->payment_method_details->card->last4}}</div>
                                        <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">
                                            <div>Expires {{$paymentInfo->payment_method_details->card->exp_month}}/{{$paymentInfo->payment_method_details->card->exp_year}}</div>
                                            <span class="hidden sm:mx-2 sm:inline" aria-hidden="true"> · </span>
                                            <div class="mt-1 sm:mt-0">Paid on {{$attendee->ticket->paid_on->format('M d, Y')}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-green-100 text-green-800"> PAID </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($attendee->ticket->payment_type == "cash")
                        <div class="mt-5">
                            <div class="rounded-md bg-gray-50 px-6 py-5 sm:flex sm:items-start sm:justify-between">
                                <div class="sm:flex sm:items-start">

                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800"> CASH </span>
                                    <div class="mt-3 sm:mt-0 sm:ml-4">
                                        <div class="text-sm font-medium text-gray-900">Cash Payment</div>
                                        <div class="mt-1 text-sm text-gray-600 sm:flex sm:items-center">

                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 sm:mt-0 sm:ml-6 sm:flex-shrink-0">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800"> PENDING PAYMENT </span>
                                </div>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>