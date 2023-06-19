<x-master-layout>
    @section('pageTitle', __('msgs.details', ['name' => __('order.order')]))
    @section('breadcrumbTitle', __('msgs.details', ['name' => __('order.order')]))
    @section('breadcrumbSubtitle', __('order.order'))

    <div class="page-body">
        <div class="container-xl">
            <div class="card card-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            {{-- <p class="h3">
                                @if ($company->getFirstMediaUrl('company_logo'))
                                    <img src="{{ $company->getFirstMediaUrl('company_logo') }}" alt="{{ $company->name }}" width="100">
                                @else
                                    <img src="{{ asset('backend/static/square-default-image.jpeg') }}" alt="{{ $company->name }}" width="100">
                                @endif
                            </p>
                            <address>
                                {{ $company->name }}<br>
                                {{ $company->address }}<br>
                                {{ $company->email }}
                            </address> --}}
                        </div>
                        <div class="col-6 text-end">
                            <p class="h3">{{ __('frontend.delivery_address') }}</p>
                            <address>
                                {{ $order->delivery_address->full_name }} <br>
                                {{ $order->delivery_address->street_address }}<br>
                                {{ $order->delivery_address->city }} - {{ $order->delivery_address->country->name }}<br>
                                {{ $order->delivery_address->mobile }}
                            </address>
                        </div>
                        <div class="col-12 my-5">
                            <h4> {{ __('order.order_number') }} {{ '#' . $order->id }}</h4>
                            <h4>{{ __('order.order_date') . ': ' . $order->created_at }}</h4>
                            <h4>{{ __('order.payment_method') . ': ' . $order->payment_method }}</h4>
                            <h4>{{ __('order.order_status') . ': ' . __('order.' . $order->status) }}</h4>
                            <h4>{{ __('order.grand_price') . ': ' . $order->grand_price }}$</h4>
                        </div>
                    </div>
                    <table class="table table-transparent table-responsive">
                        <thead>
                            <tr>
                                <th class="text-end">#</th>
                                <th class="">{{ __('msgs.photo') }}</th>
                                <th class="">{{ __('product.product') }}</th>
                                <th class="text-end">{{ __('product.qty') }}</th>
                                <th class="text-end">{{ __('product.unit_price') }}</th>
                                <th class="text-end">{{ __('product.size') }}</th>
                                <th class="text-end">{{ __('frontend.grand_total') }}</th>
                            </tr>
                        </thead>
                        @foreach ($order->order_products as $ele)
                            <tr>
                                <td class="text-end">{{ $loop->iteration }}</td>
                                <td class="">
                                    @if ($ele->product->getFirstMediaUrl('products', 'small'))
                                        <img src="{{ $ele->product->getFirstMediaUrl('products', 'small') }}" alt="{{ __('msgs.photo') }}" width="100">
                                    @endif
                                </td>
                                <td class="">
                                    <div class="strong mb-1">
                                        {{ $ele->product->name }}
                                        <div class="mt-3">
                                            @php
                                                echo DNS1D::getBarcodeHTML($ele->product->id, 'C39');
                                            @endphp
                                        </div>
                                    </div>
                                </td>

                                <td class="text-end">{{ $ele->qty }}</td>
                                <td class="text-end">${{ $ele->product_price }}</td>
                                <td class="text-end">{{ $ele->product_size }}</td>
                                <td class="text-end">{{ $ele->grand_price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="6" class="strong text-end">{{ __('frontend.subtotal') }}</td>
                            <td class="text-end">${{ $order->grand_price }}</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="strong text-end">{{ __('frontend.tax') }}</td>
                            <td class="text-end">
                                $0
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="strong text-end">{{ __('order.shipping_charge') }}</td>
                            <td class="text-end">
                                ${{ $order->shipping_charge ?? 0 }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="strong text-end">{{ __('frontend.discount') }}</td>
                            <td class="text-end">{{ $order->discount_value ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td colspan="6" class="font-weight-bold text-uppercase text-end">{{ __('order.grand_price') }}</td>
                            <td class="font-weight-bold text-end">${{ $order->grand_price }}</td>
                        </tr>
                    </table>
                    <p class="text-muted text-center mt-5">Thanks for sale from us</p>
                    <div class="mt-4 text-center">
                        <button class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                            </svg>
                            {{ __('btns.print') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
