<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">
                                <a href="{{ route('frontend.home') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="is-marked">
                                <a href="javascript:;">{{ __('frontend.checkout') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="u-s-p-b-60">
        <div class="section__content">
            <div class="container">
                <div class="checkout-f">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">{{ __('frontend.delivery_info') }}</h1>
                            @auth
                                @if ($defaultAddress)
                                    <div class="u-s-m-b-15">
                                        <div class="check-box">
                                            <input type="checkbox" id="get-address">
                                            <div class="check-box__state check-box__state--primary">
                                                <label class="check-box__label" for="get-address">{{ __('frontend.use_default_delivery_address') }}</label>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endauth

                            @livewire('frontend.checkout.add-delivery-address-form')
                        </div>
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">{{ __('frontend.order_summary') }}</h1>
                            <!--====== Order Summary ======-->
                            <div class="o-summary">
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__item-wrap gl-scroll">
                                        @forelse ($cart_items as $cart_item)
                                            <div class="o-card">
                                                <div class="o-card__flex">
                                                    <div class="o-card__img-wrap">
                                                        @if ($cart_item->product->getFirstMediaUrl('products', 'small'))
                                                            <img class="u-img-fluid" src="{{ $cart_item->product->getFirstMediaUrl('products', 'small') }}" alt="{{ $cart_item->product }}">
                                                        @else
                                                            <img class="u-img-fluid" src="{{ asset('frontend/dist/images/product/electronic/product3.jpg') }}" alt="{{ $cart_item->product }}">
                                                        @endif
                                                    </div>
                                                    <div class="o-card__info-wrap">
                                                        <span class="o-card__name">
                                                            <a href="{{ route('frontend.product.detail', ['product' => $cart_item->product]) }}">{{ $cart_item->product->name }}</a>
                                                        </span>
                                                        <span class="o-card__quantity">{{ __('frontend.quantity') }} x {{ $cart_item->qty }}</span>
                                                        <span class="o-card__price">${{ $cart_item->grand_total }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <h5 class="text-center">{{ __('msgs.not_found') }}</h5>
                                        @endforelse
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">{{ __('frontend.shipping') }}</h1>
                                        @if ($defaultAddress)
                                            <div class="ship-b">
                                                <span class="ship-b__text">{{ __('frontend.ship_to') }}:</span>
                                                <div class="ship-b__box u-s-m-b-10">
                                                    <p class="ship-b__p">{{ $defaultAddress->full_name }}, {{ $defaultAddress->mobile }}, {{ $defaultAddress->street_address }}, {{ $defaultAddress->city }}, {{ $defaultAddress->country->name }}</p>
                                                    <a class="ship-b__edit btn--e-transparent-platinum-b-2" href="{{ route('frontend.delivery-addresses.index') }}">Edit</a>
                                                </div>
                                            </div>
                                        @else
                                            <a class="ship-b__text" href="{{ route('frontend.delivery-addresses.index') }}">{{ __('frontend.select_default_address') }} </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <table class="o-summary__table">
                                            <tbody>
                                                <tr>
                                                    <td>{{ __('frontend.shipping') }}</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('frontend.tax') }}</td>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <td>SUBTOTAL</td>
                                                    <td>${{ $cart_items->sum('grand_total') }}</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('frontend.discount') }}</td>
                                                    <td>$0</td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('frontend.grand_total') }}</td>
                                                    <td>${{ $cart_items->sum('grand_total') }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                        <form class="checkout-f__payment" wire:submit.prevent='placeOrder'>
                                            @foreach (App\Models\Order::PAYMENTMETHOD as $payment)
                                                <div class=" mb-4">
                                                    <div class="radio-box">
                                                        <input type="radio" id="cash-on-delivery" name="payment" wire:model="payment_method" value="{{ $payment['id'] }}">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="cash-on-delivery">{{ $payment['title'] }}</label>
                                                        </div>
                                                    </div>
                                                    <span class="gl-text u-s-m-t-6">{{ $payment['desc'] }}</span>
                                                </div>
                                            @endforeach

                                            <div>
                                                <button class="btn btn--e-brand-b-2 mt-4" type="submit">PLACE ORDER</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--====== End - Order Summary ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
        function checkAddress() {
            var getAddress = $("#get-address");

            if (getAddress.is(":checked")) {
                $("#save-delivery-address").hide();
            } else {
                $("#save-delivery-address").show();
            }
        }

        $('#get-address').click(function() {
            checkAddress()
        });
    </script>
@endpush
