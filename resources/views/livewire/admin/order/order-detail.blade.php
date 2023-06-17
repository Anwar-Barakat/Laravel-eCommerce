<div class="card">
    <div class="card-header">
        <div class="card-body">
            <ul class="steps steps-green steps-counter my-4">
                <li class="step-item">{{ __('order.new') }}</li>
                <li class="step-item">{{ __('order.in_process') }}</li>
                <li class="step-item">{{ __('order.pending') }}</li>
                <li class="step-item active">{{ __('order.shipped') }}</li>
                <li class="step-item">{{ __('order.delivered') }}</li>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-lg-8">
                            <div class="card">
                                <table class="table table-vcenter card-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                {{ __('msgs.details', ['name' => __('order.order')]) }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ __('order.order_number') }}</td>
                                            <td>
                                                #{{ $order->id }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('order.order_date') }}</td>
                                            <td>
                                                {{ $order->created_at }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('order.shipping_charge') }}</td>
                                            <td>
                                                ${{ $order->shipping_charges }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('product.discount') }}</td>
                                            <td>
                                                ${{ $order->discount_value ?? 0 }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('product.coupon_code') }}</td>
                                            <td>
                                                {{ $order->coupon_code ?? '-' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>{{ __('order.grand_price') }}</td>
                                            <td class="text-blue-600">
                                                ${{ $order->grand_price }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('order.payment_method') }}</td>
                                            <td>
                                                {{ $order->payment_method }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card">
                                <table class="table  card-table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">
                                                {{ __('frontend.delivery_address') }}
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="progressbg">
                                                    <div class="progress progressbg-progress">
                                                        <div class="progress-bar bg-primary-lt" role="progressbar" aria-valuenow="76.29" aria-valuemin="0" aria-valuemax="100" aria-label="76.29% Complete">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                    </div>
                                                    <div class="progressbg-text">
                                                        {{ strtolower(__('frontend.full_name')) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                {{ $order->delivery_address->full_name }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="progressbg">
                                                    <div class="progress progressbg-progress">
                                                        <div class="progress-bar bg-primary-lt" role="progressbar" aria-valuenow="76.29" aria-valuemin="0" aria-valuemax="100" aria-label="76.29% Complete">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                    </div>
                                                    <div class="progressbg-text">
                                                        {{ strtolower(__('auth.email')) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                {{ $order->delivery_address->email }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="progressbg">
                                                    <div class="progress progressbg-progress">
                                                        <div class="progress-bar bg-primary-lt" role="progressbar" aria-valuenow="76.29" aria-valuemin="0" aria-valuemax="100" aria-label="76.29% Complete">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                    </div>
                                                    <div class="progressbg-text">
                                                        {{ strtolower(__('frontend.mobile')) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                {{ $order->delivery_address->mobile }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="progressbg">
                                                    <div class="progress progressbg-progress">
                                                        <div class="progress-bar bg-primary-lt" role="progressbar" aria-valuenow="76.29" aria-valuemin="0" aria-valuemax="100" aria-label="76.29% Complete">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                    </div>
                                                    <div class="progressbg-text">
                                                        {{ strtolower(__('frontend.town_city')) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                {{ $order->delivery_address->city }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="progressbg">
                                                    <div class="progress progressbg-progress">
                                                        <div class="progress-bar bg-primary-lt" role="progressbar" aria-valuenow="76.29" aria-valuemin="0" aria-valuemax="100" aria-label="76.29% Complete">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                    </div>
                                                    <div class="progressbg-text">
                                                        {{ strtolower(__('frontend.street_address')) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                {{ $order->delivery_address->street_address }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="progressbg">
                                                    <div class="progress progressbg-progress">
                                                        <div class="progress-bar bg-primary-lt" role="progressbar" aria-valuenow="76.29" aria-valuemin="0" aria-valuemax="100" aria-label="76.29% Complete">
                                                            <span class="visually-hidden"></span>
                                                        </div>
                                                    </div>
                                                    <div class="progressbg-text">{{ strtolower(__('frontend.country')) }}
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-bold text-end">
                                                {{ $order->delivery_address->country->name }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="table-responsive">
                                    <table class="table table-vcenter card-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>{{ __('product.product') }}</th>
                                                <th>{{ __('product.qty') }}</th>
                                                <th>{{ __('product.unit_price') }}</th>
                                                <th>{{ __('product.size') }}</th>
                                                <th>{{ __('product.amount') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->order_products as $ele)
                                                <tr>
                                                    <td>{{ $ele->id }}</td>
                                                    <td>
                                                        <div class="d-flex gap-4 align-items-center">
                                                            <img src="{{ $ele->product->getFirstMediaUrl('products', 'small') }}" alt="{{ $ele->product->name }}" width="200">
                                                            <div class="flex-fill">
                                                                <div class="font-weight-medium">
                                                                    {{ $ele->product->name }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>{{ $ele->qty }}</div>
                                                    </td>
                                                    <td>
                                                        <div>${{ $ele->product_price }}</div>
                                                    </td>
                                                    <td class="text-muted">{{ $ele->product_size }}</td>
                                                    <td class="text-muted">${{ $ele->grand_price }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer"></div>
</div>
