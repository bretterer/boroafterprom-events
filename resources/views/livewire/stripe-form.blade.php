<div x-data="">

    Stripe Form
    <div id="cardElement" wire:ignore class="py-6 px-2">
        <!-- A Stripe Element will be inserted here. -->
    </div>
    <!-- Used to display Element errors. -->
    <div id="cardErrors" wire:ignore role="alert"></div>
    @if($errors->has('card'))
    <span class="text-red-500">{{ $errors->first('card') }}</span>
    @endif



    @push('custom-scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe("{{config('services.stripe.publishable_key')}}");
        var elements = stripe.elements();

        var card = elements.create('card');

        card.mount('#cardElement');


        function getPaymentToken() {
            document.getElementById('cardErrors').innerText = "";

            return new Promise(function(resolve, reject) {
                document.getElementById('cardErrors').innerText = "";
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        var errorElement = document.getElementById('cardErrors');
                        errorElement.textContent = result.error.message;
                        reject(result.error.message);
                    } else {
                        Livewire.emit('stripe.setPaymentToken', result.token.id)
                        resolve(result.token.id);
                    }
                });
            })
        }
    </script>
    @endpush
</div>
