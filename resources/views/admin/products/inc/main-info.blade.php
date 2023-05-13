<div class="col-12 col-md-6 col-lg-4 mb-3">

    <div class="card">
        <div class="card-header flex justify-content-between items-center">
            <h3 class="card-title">{{ __('msgs.main_info') }}</h3>
        </div>
        <table class="table card-table table-vcenter table-striped-columns">
            <thead>
                <tr>
                    <th>{{ __('msgs.column') }}</th>
                    <th>{{ __('btns.details') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>{{ __('product.product_number') }}</th>
                    <td>#{{ $product->id }}</td>
                </tr>
                <tr>
                    <th>{{ __('product.product_name') }}</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>{{ __('section.section') }}</th>
                    <td>{{ $product->section->name }}</td>
                </tr>
                <tr>
                    <th>{{ __('category.category') }}</th>
                    <td>{{ $product->category->name }}</td>
                </tr>
                <tr>
                    <th>{{ __('product.brand') }}</th>
                    <td>{{ $product->brand->name }}</td>
                </tr>
                <tr>
                    <th>{{ __('product.price') }}</th>
                    <td>${{ $product->price }}</td>
                </tr>
                <tr>
                    <th>{{ __('product.weight') }} (g)</th>
                    <td>{{ $product->weight }}</td>
                </tr>
                <tr>
                    <th>{{ __('product.gst') }}</th>
                    <td>{{ $product->gst ?? '0' }}</td>
                </tr>
                <tr>
                    <th>{{ __('product.discount') }}</th>
                    <td>
                        {{ $product->discount_value ?? '0' }}
                        {{ $product->discount_type == 0 ? '%' : '$' }}
                    </td>
                </tr>
                <tr>
                    <th>{{ __('product.product_is_best_seller') }}</th>
                    <td>{{ $product->is_best_seller ? __('msgs.yes') : __('msgs.no') }}</td>
                </tr>
                <tr>
                    <th>{{ __('product.product_is_featured') }}</th>
                    <td>{{ $product->is_featured ? __('msgs.yes') : __('msgs.no') }}</td>
                </tr>
                <tr>
                    <th>{{ __('setting.status') }}</th>
                    <td>{{ $product->is_active ? __('msgs.active') : __('msgs.not_active') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="card-footer border-top-0">
        </div>
    </div>
</div>
