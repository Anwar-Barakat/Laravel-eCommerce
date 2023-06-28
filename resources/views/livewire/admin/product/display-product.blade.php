<div class="row g-4">
    <div class="col-3">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">{{ __('msgs.all', ['name' => __('product.filters')]) }}</h4>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="subheader mb-2 text-blue-500">{{ __('product.product_name') }}</div>
                    <div>
                        <input type="text" wire:model='name' class="form-control" placeholder="{{ __('msgs.search_by_name') }}">
                    </div>
                </div>
                <div class="mb-4">
                    <div class="subheader mb-2 text-blue-500">{{ __('section.sections') }}</div>
                    <div>
                        <select class="form-select" wire:model='section_id'>
                            <option value="">{{ __('btns.select') }}</option>
                            @foreach ($sections as $section)
                                <option value="{{ $section->id }}">{{ $section->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="subheader mb-2 text-blue-500">{{ __('category.categories') }}</div>
                    <div>
                        <select class="form-select" wire:model='category_id'>
                            <option value="">{{ __('btns.select') }}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="subheader mb-2 text-blue-500">{{ __('product.brands') }}</div>
                    <div class="mb-3">
                        @foreach ($brands as $brand)
                            <label class="form-check">
                                <input type="checkbox" class="form-check-input" value="{{ $brand->id }}" wire:model='brand_id'>
                                <span class="form-check-label">{{ $brand->name }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                <div class="mb-4">
                    <div class="subheader mb-2 text-blue-500">{{ __('product.price') }}</div>
                    <div class="row g-2 align-items-center mb-3">
                        <div class="col">

                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" placeholder="{{ __('product.from') }}" autocomplete="off" wire:model='price_from'>
                            </div>
                        </div>
                        <div class="col-auto">—</div>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="text" class="form-control" placeholder="{{ __('product.to') }}" autocomplete="off" wire:model='price_to'>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-9">
        <div class="row row-cards">
            @forelse ($products as $product)
                <div class="col-md-6 col-lg-4">
                    <x-back-product-block :product="$product" />
                </div>
            @empty
                <div class="mt-4">
                    <x-blank-section :url="route('admin.products.create')" :content="__('product.product')" />
                </div>
            @endforelse
        </div>
        @if ($products->count() > 10)
            <div class="card p-3 mt-3 pb-0">
                <div class="card-title m-0">
                    {{ $products?->links('pagination::bootstrap-5') }}
                </div>
            </div>
        @endif
    </div>
</div>
