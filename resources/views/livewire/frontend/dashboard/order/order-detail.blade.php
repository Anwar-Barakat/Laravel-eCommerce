<div class="col-lg-9 col-md-12">
    <div class="flex justify-between items-center mb-4">
        <h1 class="dash__h1 ">{{ __('msgs.details', ['name' => __('order.order')]) }}</h1>

        <!-- Order Cancellation -->
        @livewire('frontend.dashboard.order.cancel-order-form', ['order' => $order])

        <!-- Return Order -->
        @livewire('frontend.dashboard.order.return-order-form', ['order' => $order])
    </div>

    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
        <div class="dash__pad-2">
            <div class="dash-l-r">
                <div>
                    <div class="manage-o__text-2 u-c-secondary">
                        {{ __('order.order') }} #{{ $order->id }}
                    </div>
                    <div class="manage-o__text u-c-silver">Placed on : {{ $order->created_at }}</div>
                </div>
                <div>
                    <div class="manage-o__text-2 u-c-silver">
                        {{ __('frontend.total') }}:
                        <span class="manage-o__text-2 u-c-secondary">${{ $order->grand_price }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
        <div class="dash__pad-2">
            <div class="manage-o">
                <div class="manage-o__header u-s-m-b-30">
                    <div class="manage-o__icon">
                        <i class="fas fa-box u-s-m-r-5"></i>
                        <span class="manage-o__text">Products</span>
                    </div>
                </div>
                <div class="manage-o__timeline">
                    <div class="timeline-row">
                        @php
                            // Get the index of the order status in the ORDERCASES array
                            $status_index = array_search($order->status, App\Models\Order::ORDERCASES);
                        @endphp
                        @foreach (App\Models\Order::ORDERCASES as $index => $case)
                            <div class="col-lg-2 u-s-m-b-30">
                                <div class="timeline-step">
                                    <div class="timeline-l-i {{ $index <= $status_index ? 'timeline-l-i--finish' : '' }}">
                                        <span class="timeline-circle"></span>
                                    </div>
                                    <span class="timeline-text">{{ __('order.' . $case) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @foreach ($order->order_products as $ele)
                    <div class="manage-o__description u-s-m-b-30">
                        <div class="description__container">
                            <div class="description__img-wrap">
                                @if ($ele->product->getFirstMediaUrl('products', 'thumb'))
                                    <img class="u-img-fluid" src="{{ $ele->product->getFirstMediaUrl('products', 'small') }}" alt="{{ $ele->product->name }}">
                                @else
                                    <img class="u-img-fluid" src="{{ asset('frontend/dist/images/product/electronic/product3.jpg') }}" alt="{{ $ele->product->name }}">
                                @endif
                            </div>
                            <div class="description-title">
                                <span>{{ $ele->product->name }}</span>
                                <p>{{ __('product.color') }} : {{ $ele->product_color }}</p>
                                @if ($ele->status)
                                    <p>{{ __('setting.status') }} :
                                        <span class="text-bold {{ $ele->status == 'approved' ? 'text-green-600' : 'text-red-600' }}">
                                            {{ __('frontend.' . $ele->status) }}
                                        </span>
                                    </p>
                                @endif
                            </div>
                        </div>
                        <div class="description__info-wrap">
                            <div>
                                <span class="manage-o__text-2 u-c-silver">{{ __('frontend.quantity') }}:
                                    <span class="manage-o__text-2 u-c-secondary">{{ $ele->qty }}</span>
                                </span>
                            </div>
                            <div>
                                <span class="manage-o__text-2 u-c-silver">{{ __('frontend.total') }}:
                                    <span class="manage-o__text-2 u-c-secondary">${{ $ele->grand_price }}</span></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                <div class="dash__pad-3">
                    <h2 class="dash__h2 u-s-m-b-20">{{ __('frontend.delivery_address') }}</h2>
                    <h2 class="dash__h2 u-s-m-b-8">{{ $order->user->full_name }}</h2>

                    <span class="dash__text-2">{{ $order->delivery_address->street_address }} - {{ $order->delivery_address->city }} - {{ $order->delivery_address->country->name }}</span>

                    <span class="dash__text-2">{{ $order->delivery_address->mobile }}</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="dash__box dash__box--bg-white dash__box--shadow u-h-100">
                <div class="dash__pad-3">
                    <h2 class="dash__h2 u-s-m-b-20">Total Summary</h2>
                    <div class="dash-l-r u-s-m-b-8">
                        <div class="manage-o__text-2 u-c-secondary">
                            Subtotal
                        </div>
                        <div class="manage-o__text-2 u-c-secondary">
                            ${{ $order->order_products->sum('grand_price') }}
                        </div>
                    </div>
                    <div class="dash-l-r u-s-m-b-8">
                        <div class="manage-o__text-2 u-c-secondary">
                            {{ __('order.shipping_charge') }}
                        </div>
                        <div class="manage-o__text-2 u-c-secondary">
                            ${{ $order->shipping_charges }}
                        </div>
                    </div>
                    <div class="dash-l-r u-s-m-b-8">
                        <div class="manage-o__text-2 u-c-secondary">
                            Tax
                        </div>
                        <div class="manage-o__text-2 u-c-secondary">
                            $0
                        </div>
                    </div>
                    <div class="dash-l-r u-s-m-b-8">
                        <div class="manage-o__text-2 u-c-secondary">
                            Discount
                        </div>
                        <div class="manage-o__text-2 u-c-secondary">
                            ${{ $order->coupon_value ?? 0 }}
                        </div>
                    </div>
                    <div class="dash-l-r u-s-m-b-8">
                        <div class="manage-o__text-2 u-c-secondary">
                            Total
                        </div>
                        <div class="manage-o__text-2 u-c-secondary">
                            ${{ $order->grand_price }}
                        </div>
                    </div>
                    <span class="dash__text-2">Paid by {{ $order->payment_method }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
