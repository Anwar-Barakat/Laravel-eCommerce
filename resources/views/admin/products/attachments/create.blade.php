<x-master-layout>
    @section('pageTitle', __('msgs.add', ['name' => __('product.attachments')]))
    @section('breadcrumbTitle', __('msgs.add', ['name' => __('product.attachments')]))
    @section('breadcrumbSubtitle', __('product.products'))

    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            <div class="card">
                <div class="card-header flex justify-content-between items-center">
                    <h3 class="card-title">{{ __('msgs.main_info') }}</h3>
                </div>
                <table class="table card-table table-vcenter table-striped-columns">
                    <thead>
                        <tr>
                            <th>{{ __('msgs.column') }}</th>
                            <th colspan="2">{{ __('btns.details') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>{{ __('product.product') }}</th>
                            <td>#{{ $product->id }}</td>
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
                                {{ $product->discount_type == 0 ? '%' : '$' }}
                                {{ $product->discount_value ?? '0' }}
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
                            <td>{{ $product->is_active ? __('msgs.yes') : __('msgs.no') }}</td>
                        </tr>
                    </tbody>
                </table>
                <div class="card-footer border-top-0">
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card-header flex justify-content-between items-center">
                    <h3 class="card-title">{{ __('msgs.main_info') }}</h3>
                </div>
                <table class="table card-table table-vcenter table-striped-columns">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ __('product.attachment') }}</th>
                            <th>{{ __('btns.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product->getMedia('product_attachments') as $key => $attachment)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img width="100" src="{{ $attachment->getUrl('small') }}" class="img img-thumbnail">
                                </td>
                                <td>
                                    <div class="d-flex items-center gap-3">
                                        <form action="{{ route('admin.products.attachments.destroy', $attachment->id) }}" method="POST">
                                            @csrf
                                            <a href="{{ route('admin.products.attachments.destroy', $attachment->id) }}" class="bordered" title="{{ __('btns.delete') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M4 7l16 0"></path>
                                                    <path d="M10 11l0 6"></path>
                                                    <path d="M14 11l0 6"></path>
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                </svg>
                                            </a>
                                        </form>
                                        <a href="{{ route('admin.products.attachments.download', $attachment->id) }}" title="{{ __('btns.download') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2 -2v-2"></path>
                                                <path d="M7 11l5 5l5 -5"></path>
                                                <path d="M12 4l0 12"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer border-top-0">
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
