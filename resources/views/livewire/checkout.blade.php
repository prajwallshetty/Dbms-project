<x-app-layout>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-25">
                        <h4 class="font-semibold text-lg text-gray-600">Billing Details</h4>
                    </div>

                    <!-- Start Checkout Form -->
                    <form method="POST" action="{{ route('checkout.order') }}" id="checkoutForm">
                        @csrf
                        <div class="mb-4">
                            <x-input-label for="country" :value="__('Country *')" />
                            @include('livewire.countries-select')
                            <x-input-error class="mt-2" :messages="$errors->get('country')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="billing_address" :value="__('Address *')" />
                            <x-text-input id="billing_address" name="billing_address" type="text"
                                class="mt-1 block w-full" 
                                value="{{ old('billing_address', $billingDetails->billing_address ?? '') }}" 
                                required autofocus autocomplete="billing_address" />
                            <x-input-error class="mt-2" :messages="$errors->get('billing_address')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="city" :value="__('City *')" />
                            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full"
                                value="{{ old('city', $billingDetails->city ?? '') }}"
                                required autocomplete="city" />
                            <x-input-error class="mt-2" :messages="$errors->get('city')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="state" :value="__('State / County *')" />
                            <x-text-input id="state" name="state" type="text" class="mt-1 block w-full"
                                value="{{ old('state', $billingDetails->state ?? '') }}"
                                required autocomplete="state" />
                            <x-input-error class="mt-2" :messages="$errors->get('state')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="zipcode" :value="__('Postcode / ZIP *')" />
                            <x-text-input id="zipcode" name="zipcode" type="text" class="mt-1 block w-full"
                                value="{{ old('zipcode', $billingDetails->zipcode ?? '') }}"
                                required autocomplete="zipcode" />
                            <x-input-error class="mt-2" :messages="$errors->get('zipcode')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="phone" :value="__('Phone number *')" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full"
                                value="{{ old('phone', $billingDetails->phone ?? '') }}"
                                required autocomplete="phone" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="order_notes" :value="__('Additional information')" />
                            <x-text-input id="order_notes" name="order_notes" type="text" class="mt-1 block w-full"
                                placeholder="Any notes?" 
                                value="{{ old('order_notes', $billingDetails->order_notes ?? '') }}" />
                        </div>

                        <!-- Order Summary and Place Order Button -->
                        <div class="order_review border-0">
                            <div class="mb-5">
                                <h3 class="my-2 text-lg font-semibold text-gray-600">Your Orders</h3>
                            </div>
                            <div class="table-responsive order_table text-center">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $i)
                                            <tr>
                                                <td class="image product-thumbnail">
                                                    <img src="{{ asset('storage/'.$i->model->image) }}" alt="#">
                                                </td>
                                                <td>
                                                    <h5>
                                                        <a href="{{ route('product.details', $i->model->id) }}">
                                                            {{ $i->model->name }}
                                                        </a>
                                                    </h5>
                                                    <span class="product-qty">x {{ $i->qty }}</span>
                                                </td>
                                                <td>₹{{ $i->subtotal }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <th>SubTotal</th>
                                            <td colspan="2">₹{{ Cart::subtotal() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tax</th>
                                            <td colspan="2">₹{{ Cart::tax() }}</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td colspan="2"><em>Free Shipping</em></td>
                                        </tr>
                                        <tr>
                                            <th>Total</th>
                                            <td colspan="2">
                                                <span class="font-xl text-brand fw-900">₹{{ Cart::total() }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <button type="submit" class="btn btn-block mt-30">Place Order</button>
                        </div>
                    </form>
                    <!-- End Checkout Form -->
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
