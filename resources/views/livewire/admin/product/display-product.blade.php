<div class="row g-4">
    <div class="col-3">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h4 class="card-title">{{ __('msgs.all', ['name' => __('product.filters')]) }}</h4>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="subheader mb-2 text-blue-500">{{ __('section.sections') }}</div>
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

                    <div class="card">

                        <div class="card-body p-4 text-center">
                            <span class="avatar avatar-xl mb-3 rounded" style="background-image: url(./static/avatars/000m.jpg)">
                                @if ($product->getFirstMediaUrl('products', 'thumb'))
                                    <img src="{{ $product->getFirstMediaUrl('products') }}" class="img img-thumbnail" alt="{{ $product->name }}">
                                @else
                                    <img src="{{ asset('backend/static/square-default-image.jpeg') }}" class="img img-thumbnail" alt="{{ $product->name }}">
                                @endif
                            </span>
                            <h3 class="m-0 mb-1">
                                <a href="{{ route('admin.products.edit', ['product' => $product]) }}">{{ $product->name }}</a>
                            </h3>
                            <div class="text-muted">${{ $product->price }}</div>
                            <div class="mt-3">
                                <span class="badge bg-purple-lt">{{ $product->brand->name }}</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="#" class="card-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                    <path d="M3 7l9 6l9 -6" />
                                </svg>
                                Add Images
                            </a>
                            <a href="#" class="card-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                </svg>
                                Call
                            </a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        @if ($products->count() > 10)
            <div class="card p-3 mt-3 pb-0">
                <div class="card-title m-0">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        @endif
    </div>
</div>
