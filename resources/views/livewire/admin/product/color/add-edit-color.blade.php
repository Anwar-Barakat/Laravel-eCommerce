<div>
    <div class="row">
        @include('admin.products.inc.main-info', ['product' => $product])

        <div class="col-12 col-lg-8 mb-3 d-flex flex-column">
            <div class="card mb-3">
                <div class="card-stamp">
                    <div class="card-stamp-icon bg-yellow">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-article" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
                            <path d="M7 8h10"></path>
                            <path d="M7 12h10"></path>
                            <path d="M7 16h10"></path>
                        </svg>
                    </div>
                </div>
                <div class="card-header">
                    <h3 class="card-title">{{ __('msgs.add', ['name' => __('product.colors')]) }}</h3>
                </div>
                <form wire:submit.prevent='submit' id="add-attributes">
                    <div class="card-body">
                        <h3 class="mb-4 text-blue">{{ __('msgs.main_info') }}</h3>
                        <div class="row row-cards">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">
                                        {{ __('product.product_name') }}
                                        ( <a href="{{ route('admin.products.create') }}" class="text-blue" title="{{ __('msgs.add', ['name' => __('product.product')]) }}">{{ __('msgs.add_new') }}</a> )
                                    </label>
                                    <select class="form-select" readonly disabled>
                                        <option value="">{{ $product->name }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <x-input-label class="form-label" :value="__('setting.status')" />
                                    <select class="form-select" wire:model.defer='color.is_active'>
                                        <option value="">{{ __('btns.select') }}</option>
                                        <option value="1">{{ __('msgs.yes') }}</option>
                                        <option value="0">{{ __('msgs.no') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('color.is_active')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                        <div class="row row-cards">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">
                                        {{ __('product.color') }}
                                        ( <a href="{{ route('admin.colors.index') }}" class="text-blue" title="{{ __('msgs.add', ['name' => __('product.color')]) }}">{{ __('msgs.add_new') }}</a> )
                                    </label>
                                    <select class="form-select" wire:model.defer='color.color_id'>
                                        <option value="">{{ __('btns.select') }}</option>
                                        @foreach ($colors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('color.color_id')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-checklist" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8"></path>
                                <path d="M14 19l2 2l4 -4"></path>
                                <path d="M9 8h4"></path>
                                <path d="M9 12h2"></path>
                            </svg>
                            {{ __('btns.submit') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="card-title">{{ __('msgs.all', ['name' => __('product.color')]) }}</h3>
        </div>

        <div class="card-body">
            <div id="table-default" class="table-responsive">
                <table id="dataTables" class="table table-vcenter table-mobile-md card-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="w-25">{{ __('product.color') }}</th>
                            <th class="w-25">{{ __('partials.status') }}</th>
                            <th class="w-25">{{ __('msgs.created_at') }}</th>
                            <th class="w-32"></th>
                        </tr>
                    </thead>
                    <tbody class="table-tbody">
                        @forelse ($productColors as $color)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $color->color->name }}</td>
                                <td>
                                    <div>
                                        <button wire:click='updateStatus({{ $color }})' class="btn position-relative">
                                            {{ $color->is_active ? __('msgs.active') : __('msgs.not_active') }}
                                            <span class="badge {{ $color->is_active ? 'bg-green' : 'bg-red' }} badge-notification badge-blink"></span>
                                        </button>
                                    </div>
                                </td>
                                <td> {{ $color->created_at }} </td>
                                <td>
                                    <span class="dropdown">
                                        <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('btns.actions') }}</button>
                                        <div class="dropdown-menu">
                                            <a wire:click.prevent='update({{ $color }})' class="dropdown-item d-flex align-items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                    <path d="M16 5l3 3" />
                                                </svg>
                                                <span>{{ __('btns.edit') }}</span>
                                            </a>
                                            <a wire:click.prevent='delete({{ $color }})' class="dropdown-item d-flex align-items-center gap-1" data-bs-toggle="modal" data-bs-target="#modal-danger-{{ $color->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0 text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M4 7l16 0" />
                                                    <path d="M10 11l0 6" />
                                                    <path d="M14 11l0 6" />
                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                </svg>
                                                <span>{{ __('btns.delete') }}</span>
                                            </a>
                                        </div>
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="border-bottom-0">
                                    <x-blank-section :url="route('admin.colors.index')" :content="__('product.color')" />
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="p-3 mt-2">
                    {{ $productColors->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

        <div class="card-footer">
        </div>
    </div>
</div>
