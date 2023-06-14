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
                        @livewire('frontend.checkout.add-delivery-address-form')
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
                                                        <span class="o-card__quantity">Quantity x {{ $cart_item->qty }}</span>
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
                                        @php
                                            $address = Auth::user()
                                                ->delivery_addresses->where('is_default', 1)
                                                ->first();
                                        @endphp
                                        @if ($address)
                                            <div class="ship-b">
                                                <span class="ship-b__text">{{ __('frontend.ship_to') }}:</span>
                                                <div class="ship-b__box u-s-m-b-10">
                                                    <p class="ship-b__p">{{ $address->full_name }}, {{ $address->mobile }}, {{ $address->street_address }}, {{ $address->city }}, {{ $address->country->name }}</p>
                                                    <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#edit-ship-address">Edit</a>
                                                </div>
                                            </div>
                                        @else
                                            <span class="ship-b__text">{{ __('frontend.select_default_address') }}</span>
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
                                        <form class="checkout-f__payment">
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="cash-on-delivery" name="payment">
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="cash-on-delivery">Cash on Delivery</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <span class="gl-text u-s-m-t-6">Pay Upon Cash on delivery. (This service is only available for some countries)</span>
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="direct-bank-transfer" name="payment">
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="direct-bank-transfer">Direct Bank Transfer</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <span class="gl-text u-s-m-t-6">Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</span>
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="pay-with-check" name="payment">
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="pay-with-check">Pay With Check</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <span class="gl-text u-s-m-t-6">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span>
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="pay-with-card" name="payment">
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="pay-with-card">Pay With Credit / Debit Card</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <span class="gl-text u-s-m-t-6">International Credit Cards must be eligible for use within the United States.</span>
                                            </div>
                                            <div class="u-s-m-b-10">

                                                <!--====== Radio Box ======-->
                                                <div class="radio-box">

                                                    <input type="radio" id="pay-pal" name="payment">
                                                    <div class="radio-box__state radio-box__state--primary">

                                                        <label class="radio-box__label" for="pay-pal">Pay Pal</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Radio Box ======-->

                                                <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to set up your billing information.</span>
                                            </div>
                                            <div class="u-s-m-b-15">

                                                <!--====== Check Box ======-->
                                                <div class="check-box">

                                                    <input type="checkbox" id="term-and-condition">
                                                    <div class="check-box__state check-box__state--primary">

                                                        <label class="check-box__label" for="term-and-condition">I consent to the</label>
                                                    </div>
                                                </div>
                                                <!--====== End - Check Box ======-->

                                                <a class="gl-link">Terms of Service.</a>
                                            </div>
                                            <div>

                                                <button class="btn btn--e-brand-b-2" type="submit">PLACE ORDER</button>
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
