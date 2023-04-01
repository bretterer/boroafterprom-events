<div x-data="{
    showGuest: false,
    showPaymentModal: false,
    showCard: true,
}" x-init="
        Livewire.on('addGuest', () => {
            showGuest = true
        })
        Livewire.on('removeGuest', () => {
            showGuest = false
        })">
        <div class="mb-8">
            <p class="text-gray-900">Please use the below form to order your tickets for Afterprom.</p>
            <p class="text-gray-900 font-bold">If you are bringing a guest, please click the "add guest" button below your information</p>
            <p class="text-gray-900">If you are experiencing issues with ordering tickets, please email <a class="text-blue-700" href="mailto:tickets@boroafterprom.com">tickets@boroafterprom.com</a></p>
        </div>
    <div class="lg:grid lg:grid-cols-2 lg:gap-x-12 xl:gap-x-16">



        <div>
            <div>
                <h2 class="text-lg font-medium text-gray-900">My Information</h2>

                <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                    <div>
                        <label for="first_name" class="block text-sm font-medium text-gray-700">First name</label>
                        <div class="mt-1">
                            <input wire:model="first_name" type="text" id="first_name" name="first_name" autocomplete="given-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        @if($errors->has('first_name'))
                        <span class="text-red-500">{{ $errors->first('first_name') }}</span>
                        @endif


                    </div>

                    <div>
                        <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                        <div class="mt-1">
                            <input wire:model="last_name" type="text" id="last_name" name="last_name" autocomplete="family-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        @if($errors->has('last_name'))
                        <span class="text-red-500">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>

                    <div class="sm:col-span-2">
                        <div class="flex justify-between">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        </div>
                        <div class="mt-1">
                            <input wire:model="email" type="email" name="email" id="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        @if($errors->has('email'))
                        <span class="text-red-500">{{ $errors->first('email') }}</span>
                        @endif
                    </div>

                    <div class="sm:col-span-2">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Parent/Guardian Phone Number</label>
                        <div class="mt-1">
                            <input wire:model="phone" type="text" name="phone" id="phone" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        @if($errors->has('phone'))
                        <span class="text-red-500">{{ $errors->first('phone') }}</span>
                        @endif
                    </div>

                    <div class="sm:col-span-2">
                        <label for="parent_email" class="block text-sm font-medium text-gray-700">Parent/Guardian Email</label>
                        <div class="mt-1">
                            <input wire:model="parent_email" type="text" name="parent_email" id="parent_email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                        </div>
                        @if($errors->has('parent_email'))
                        <span class="text-red-500">{{ $errors->first('parent_email') }}</span>
                        @endif
                    </div>
                </div>

            </div>

            <div class="mt-10 border-t border-gray-200">
            <h2 class="text-lg font-medium text-gray-900 mt-12">Guest Information</h2>
                <button x-show="!showGuest" wire:click="addGuest" type="button" class="mt-4 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Add Guest</button>
                <div class="pt-10" x-show="showGuest" x-cloak>
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900">Guest Information</h2>
                        <button wire:click="removeGuest" type="button" class="inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs font-medium rounded text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Remove Guest</button>

                    </div>
                    <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                        <div>
                            <label for="guest_first_name" class="block text-sm font-medium text-gray-700">Guest First name</label>
                            <div class="mt-1">
                                <input wire:model="guest_first_name" type="text" id="guest-guest_first_name" name="guest_first_name" autocomplete="given-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            @if($errors->has('guest_first_name'))
                            <span class="text-red-500">{{ $errors->first('guest_first_name') }}</span>
                            @endif
                        </div>

                        <div>
                            <label for="guest_last_name" class="block text-sm font-medium text-gray-700">Guest Last name</label>
                            <div class="mt-1">
                                <input wire:model="guest_last_name" type="text" id="guest_last_name" name="guest_last_name" autocomplete="family-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            @if($errors->has('guest_last_name'))
                            <span class="text-red-500">{{ $errors->first('guest_last_name') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                            <div class="flex justify-between">
                                <label for="guest_email" class="block text-sm font-medium text-gray-700">Guest Email</label>
                                <span class="text-sm text-gray-500" id="email-optional">(Optional)</span>
                            </div>
                            <div class="mt-1">
                                <input wire:model="guest_email" type="email" name="guest_email" id="guest_email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            @if($errors->has('guest_email'))
                            <span class="text-red-500">{{ $errors->first('guest_email') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                            <label for="guest_phone" class="block text-sm font-medium text-gray-700">Guest Parent/Guardian Phone Number</label>
                            <div class="mt-1">
                                <input wire:model="guest_phone" type="text" name="guest_phone" id="guest_phone" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            @if($errors->has('guest_phone'))
                            <span class="text-red-500">{{ $errors->first('guest_phone') }}</span>
                            @endif
                        </div>

                        <div class="sm:col-span-2">
                            <label for="guest_parent_email" class="block text-sm font-medium text-gray-700">Guest Parent/Guardian Email</label>
                            <div class="mt-1">
                                <input wire:model="guest_parent_email" type="text" name="guest_parent_email" id="guest_parent_email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                            </div>
                            @if($errors->has('guest_parent_email'))
                            <span class="text-red-500">{{ $errors->first('guest_parent_email') }}</span>
                            @endif
                        </div>


                    </div>
                </div>
            </div>


        </div>






        <!-- Order summary -->
        <div class="mt-10 lg:mt-0">
            <!-- Payment -->
            <div>
                <div class="flex">
                    <h2 class="text-lg font-medium text-gray-900">Payment</h2>
                    @if( Str::contains(config('services.stripe.publishable_key'), ["pk_test_"]) )
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800"> Test Mode </span>
                    @endif
                </div>
                <div class=" bg-white border border-gray-200 rounded-lg shadow-sm px-4 py-6">
                    <fieldset>
                        <legend class="sr-only">Payment type</legend>
                        <div class="flex items-center">
                            <div @click="showCard = true" class="flex items-center">
                                <input id="credit-card" value="credit-card" name="payment-type" type="radio" checked class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="credit-card" class="ml-3 block text-sm font-medium text-gray-700"> Credit card </label>
                            </div>
                            <div @click="showCard = false" class="flex items-center ml-6">
                                <input id="cash" value="cash" name="payment-type" type="radio" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
                                <label for="cash" class="ml-3 block text-sm font-medium text-gray-700"> Cash </label>
                            </div>


                        </div>

                    </fieldset>


                    <div x-show="showCard" class="pt-4">
                        @livewire('stripe-form')
                    </div>


                    @if($errors->has('paymentErrors'))
                    <span class="text-red-500">{{ $errors->first('paymentErrors') }}</span>
                    @endif

                </div>
            </div>

            <h2 class="text-lg font-medium text-gray-900">Order summary</h2>

            <div class="mt-4 bg-white border border-gray-200 rounded-lg shadow-sm">
                <h3 class="sr-only">Items in your cart</h3>
                <ul role="list" class="divide-y divide-gray-200">
                    <li class="flex py-6 px-4 sm:px-6">
                        <div class="flex-shrink-0">
                            <img src="https://media.istockphoto.com/photos/golden-tickets-picture-id173233767?b=1&k=20&m=173233767&s=170667a&w=0&h=JJd_8ygHLHXbBvuipshW1VJCbnFzPo7-dTg8pm-rDsw=" alt="Front of men&#039;s Basic Tee in black." class="w-20 rounded-md">
                        </div>

                        <div class="ml-6 flex-1 flex flex-col">
                            <div class="flex">
                                <div class="min-w-0 flex-1">
                                    <h4 class="text-sm">
                                        <a href="#" class="font-medium text-gray-700 hover:text-gray-800"> AfterProm Ticket </a>
                                    </h4>
                                </div>

                            </div>

                            <div class="flex-1 pt-2 flex items-center justify-between">
                                <p class="mt-1 text-sm font-medium text-gray-900">${{$this->ticketCost}}.00 (x{{$this->ticketCount}})</p>

                            </div>
                        </div>
                    </li>

                </ul>
                <dl class="border-t border-gray-200 py-6 px-4 space-y-6 sm:px-6">

                    <div class="flex items-center justify-between pt-6">
                        <dt class="text-base font-medium">Total</dt>
                        <dd class="text-base font-medium text-gray-900">${{$this->totalCost}}.00</dd>
                    </div>
                </dl>

                <div class="border-t border-gray-200 py-6 px-4 sm:px-6 flex space-x-2">
                    <div class="flex items-center h-5">
                        <input id="confirmation" wire:model="confirmation" aria-describedby="confirmation-description" name="confirmation" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    </div>
                    <div class="ml-3 text-sm">
                        <p id="confirmation-description" class="text-gray-500">By continuing with this purchase, I confirm that the student is a Junior or Senior of Springboro Highschool and the registered guest who is not a student of Springboro has a form that will be provided to the school.</p>
                        @if($errors->has('confirmation'))
                        <span class="text-red-500">{{ $errors->first('confirmation') }}</span>
                        @endif
                    </div>

                </div>

                <div class="border-t border-gray-200 py-6 px-4 sm:px-6 flex space-x-2">
                    <button @click="submitOrder" wire:loading.attr="disabled" id="submitOrder" class="w-full bg-blue-600 border border-transparent rounded-md shadow-sm py-3 px-4 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-blue-500">Continue</button>
                </div>
            </div>
        </div>


    </div>

    @push('custom-scripts')
        <script>
            function submitOrder() {

                @this.validateInput();

                if (document.querySelector('input[name="payment-type"]:checked').value == 'cash') {
                    @this.payCash();
                    return;
                }

                getPaymentToken()
                    .then(function(paymentToken) {
                        @this.paymentToken = paymentToken;
                        @this.payCard();
                    },

                    function(err) {
                        console.log(err);
                    }
                )

            }
        </script>
    @endpush
</div>