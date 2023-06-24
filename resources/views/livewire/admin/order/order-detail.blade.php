<div class="card">
    <div class="card-header">
        <div class="card-body">
            <ul class="steps steps-green steps-counter my-4">
                @foreach (App\Models\OrderStatus::active()->get() as $case)
                    <li class="step-item {{ $order->status == $case->name ? 'active' : '' }}">{{ __('order.' . $case->name) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="card-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards">
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    {{ __('msgs.details', ['name' => __('order.order')]) }}
                                </div>
                                <div class="card-body">
                                    <table class="table table-vcenter card-table">
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
                                                <td>{{ __('order.subtotal') }}</td>
                                                <td>
                                                    ${{ $order->order_products->sum('grand_price') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('order.shipping_charge') }}</td>
                                                <td>
                                                    ${{ $order->shipping_charges }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('product.coupon_code') }}</td>
                                                <td>
                                                    {{ $order->coupon_code ?? '-' }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>{{ __('product.discount') }}</td>
                                                <td>
                                                    ${{ $order->coupon_value ?? 0 }}
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
                                <div class="card-footer"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    {{ __('msgs.details', ['name' => __('order.delivery_address')]) }}
                                </div>
                                <div class="card-body">
                                    <table class="table  card-table">

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
                                <div class="card-footer"></div>
                            </div>
                        </div>
                        <div class="col-12 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    {{ __('product.products') }}
                                </div>
                                <div class="card-body">
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
                                                                @if ($ele->product->getFirstMediaUrl('products', 'small'))
                                                                    <img src="{{ $ele->product->getFirstMediaUrl('products', 'small') }}" alt="{{ $ele->product->name }}" width="100">
                                                                @else
                                                                    <img src="{{ asset('backend/static/square-default-image.jpeg') }}" alt="{{ $ele->product->name }}" width="100">
                                                                @endif
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
                                <div class="card-footer"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <table class="table card-table">
                                    <div class="card-header">
                                        {{ __('msgs.update', ['name' => __('order.order_logs')]) }}
                                    </div>
                                    <tbody>
                                        @forelse ($orderLogs as $case)
                                            <tr>
                                                <td>
                                                    <div class="progressbg">
                                                        <div class="progress progressbg-progress">
                                                            <div class="progress-bar bg-primary-lt" role="progressbar">
                                                                <span class="visually-hidden"></span>
                                                            </div>
                                                        </div>
                                                        <div class="progressbg-text">
                                                            <p>
                                                                {{ __('order.' . $case->status) }}
                                                            </p>
                                                            @if ($case->status == 'shipped')
                                                                <p>{{ __('order.courier_name') }} : {{ $order->courier_name }}</p>
                                                                <p>{{ __('order.tracking_number') }} : {{ $order->tracking_number }}</p>
                                                            @endif
                                                            @if ($case->status == 'cancelled')
                                                                <p>The reason : {{ __('frontend.' . App\Models\OrderLog::CANCELREASON[$case->reason]) }}</p>
                                                            @endif
                                                            @unless ($loop->last)
                                                                <br>
                                                            @endunless
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="fw-bold text-end">
                                                    {{ $case->created_at }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr class="text-center">
                                                <td>
                                                    <h5>{{ __('msgs.not_found') }}</h5>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="card-footer">
                                    {{ $orderLogs->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                        @if (!$cancelled)
                            <div class="col-lg-6 mb-4">
                                <form wire:submit.prevent='updateOrderStatus()'>
                                    <div class="card">
                                        <div class="card-header">
                                            {{ __('msgs.update', ['name' => __('order.order_status')]) }}
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <x-input-label class="form-label" for="status" :value="__('order.order_status')" />
                                                        <select class="form-control" wire:model='order.status'>
                                                            <option>{{ __('msgs.update', ['name' => __('order.order_status')]) }}</option>
                                                            @foreach ($orderCases as $case)
                                                                <option value="{{ $case->name }}">{{ __('order.' . $case->name) }}</option>
                                                            @endforeach
                                                        </select>
                                                        <x-input-error :messages="$errors->get('order.status')" class="mt-2" />
                                                    </div>
                                                </div>
                                            </div>
                                            @if ($order->status == 'shipped')
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <x-input-label class="form-label" for="courier_name" :value="__('order.courier_name')" />
                                                            <x-text-input id="courier_name" class="form-control" type="text" wire:model='order.courier_name' />
                                                            <x-input-error :messages="$errors->get('order.courier_name')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <x-input-label class="form-label" for="tracking_number" :value="__('order.tracking_number')" />
                                                            <x-text-input id="tracking_number" class="form-control" type="text" wire:model='order.tracking_number' />
                                                            <x-input-error :messages="$errors->get('order.tracking_number')" class="mt-2" />
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="card-footer text-end">
                                            <button class="btn btn-primary">{{ __('btns.update') }}</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-footer"></div>
</div>
