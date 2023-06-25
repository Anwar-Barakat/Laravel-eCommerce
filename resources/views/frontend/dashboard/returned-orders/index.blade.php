<x-app-layout>
    @section('pageTitle', 'Rmark - View Your Returned Orders')
    @section('metaDescription', 'View your returned orders on Rmark. We offer free shipping on orders over $50 and a 100% satisfaction guarantee.')
    @section('metaKeywords', 'rmark, orders, returned orders, ecommerce, shopping')

    <!--====== App Content ======-->
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
                                    <a href="javascript:;">{{ __('frontend.my_returns_orders') }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section 1 ======-->


        <!--====== Section 2 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="dash">
                    <div class="container">
                        <div class="row">
                            @include('frontend.dashboard.inc.sidebar')

                            <div class="col-lg-9 col-md-12">
                                <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
                                    <div class="dash__pad-2">
                                        <div class="dash__address-header">
                                            <h1 class="dash__h1">{{ __('msgs.list', ['name' => __('frontend.delivery_addresses')]) }}</h1>
                                        </div>
                                    </div>
                                </div>
                                <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
                                    <div class="dash__table-2-wrap gl-scroll">
                                        <table class="dash__table-2">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>{{ __('order.returned_date') }}</th>
                                                    <th>{{ __('order.order_number') }}</th>
                                                    <th>{{ __('product.product_name') }}</th>
                                                    <th>{{ __('frontend.size') }}</th>
                                                    <th>{{ __('setting.status') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($returnedOrders as $request)
                                                    <tr>
                                                        <td>{{ $request->id }}</td>
                                                        <td>{{ $request->created_at }}</td>
                                                        <td><span class="badge badge--processing"><a href="{{ route('frontend.orders.show', ['order' => $request->order]) }}">{{ $request->order_id }}</a></span></td>
                                                        <td>{{ $request->product->name }}</td>
                                                        <td>{{ $request->product_size }}</td>
                                                        <td>
                                                            <div class="{{ $request->status == 'approved' ? 'text-green-600' : 'text-red-600' }} text-bold">{{ __('order.' . $request->status) }}</div>
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
                                    </div>
                                    <div class="mt-4 p-4">
                                        {{ $returnedOrders->links() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 2 ======-->
    </div>
    <!--====== End - App Content ======-->
</x-app-layout>
