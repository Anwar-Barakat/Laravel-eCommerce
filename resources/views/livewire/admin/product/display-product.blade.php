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
                    <div class="card card-stacked">
                        <div class="card-body p-4 text-center">
                            @if ($product->created_at->diffInMonths() < 1)
                                <div class="ribbon bg-red">NEW</div>
                            @endif
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
                            <a href="{{ route('admin.product.attachments.create', ['product' => $product]) }}" class="card-btn flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5"></path>
                                </svg>
                                {{ __('product.attachments') }}
                            </a>
                            <a href="{{ route('admin.product.attributes.create', ['product' => $product]) }}" class="card-btn flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tag" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="8.5" cy="8.5" r="1" fill="currentColor"></circle>
                                    <path d="M4 7v3.859c0 .537 .213 1.052 .593 1.432l8.116 8.116a2.025 2.025 0 0 0 2.864 0l4.834 -4.834a2.025 2.025 0 0 0 0 -2.864l-8.117 -8.116a2.025 2.025 0 0 0 -1.431 -.593h-3.859a3 3 0 0 0 -3 3z"></path>
                                </svg>
                                {{ __('product.attribites') }}
                            </a>
                        </div>
                        <div class="progress progress-sm card-progress">
                            <div class="progress-bar" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
                                <span class="visually-hidden">38% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <x-blank-section :url="route('admin.products.create')" :content="__('msgs.create', ['name' => __('product.product')])" />
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
