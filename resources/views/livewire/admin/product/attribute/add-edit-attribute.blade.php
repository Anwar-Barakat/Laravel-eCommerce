<div>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4 mb-3">
            @include('admin.products.inc.main-info', ['product' => $product])
        </div>
        <div class="col-12 col-lg-8 mb-3 d-flex flex-column">
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="card-title">{{ __('msgs.add', ['name' => __('product.attribites')]) }}</h3>
                </div>
                <form wire:submit.prevent='submit' id="add-attributes">
                    <div class="card-body">
                        <h3 class="mb-4 text-blue">{{ __('msgs.main_info') }}</h3>
                        <div class="row">
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
                                    <select class="form-select" wire:model.defer='attribute.is_active'>
                                        <option value="">{{ __('btns.select') }}</option>
                                        <option value="1">{{ __('msgs.yes') }}</option>
                                        <option value="0">{{ __('msgs.no') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('attribute.is_active')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <x-input-label class="form-label" :value="__('product.sku')" />
                                    <x-text-input type="text" placeholder="SH001-SM" class="form-control" wire:model.debounce.500s='attribute.sku' />
                                    <x-input-error :messages="$errors->get('attribute.sku')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <x-input-label class="form-label" :value="__('product.size')" />
                                    <x-text-input type="text" placeholder="small" class="form-control" wire:model.debounce.500s='attribute.size' />
                                    <x-input-error :messages="$errors->get('attribute.size')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <x-input-label class="form-label" :value="__('product.qty_stock')" />
                                    <x-text-input type="number" placeholder="5" class="form-control" wire:model.debounce.500s='attribute.stock' />
                                    <x-input-error :messages="$errors->get('attribute.stock')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <x-input-label class="form-label" :value="__('product.price')" />
                                    <x-text-input type="number" placeholder="10.15" class="form-control" wire:model.debounce.500s='attribute.price' />
                                    <x-input-error :messages="$errors->get('attribute.price')" class="mt-2" />
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
                            <th>{{ __('product.size') }}</th>
                            <th>{{ __('product.price') }}</th>
                            <th>{{ __('product.qty_stock') }}</th>
                            <th>{{ __('product.sku') }}</th>
                            <th>{{ __('setting.status') }}</th>
                            <th>{{ __('btns.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attributes as $attribute)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attribute->size }}</td>
                                <td>{{ $attribute->price }}</td>
                                <td>{{ $attribute->stock }}</td>
                                <td>{{ $attribute->sku }}</td>
                                <td>
                                    <div>
                                        <button wire:click='updateStatus({{ $attribute }})' class="btn position-relative">
                                            {{ $attribute->is_active ? __('msgs.active') : __('msgs.not_active') }}
                                            <span class="badge {{ $attribute->is_active ? 'bg-green' : 'bg-red' }} badge-notification badge-blink"></span>
                                        </button>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex items-center gap-3">
                                        <a href="javascrip:;" class="" wire:click='edit({{ $attribute }})'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                        </a>
                                        <a href="javascript:;" class="" wire:click='delete({{ $attribute }})'>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon m-0 text-danger" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M4 7l16 0" />
                                                <path d="M10 11l0 6" />
                                                <path d="M14 11l0 6" />
                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <x-blank-section :url="'#add-attributes'" :content="__('msgs.create', ['name' => __('product.product_attribute')])" />
                        @endforelse
                    </tbody>
                </table>
                <div class="card-footer border-top-0">
                </div>
            </div>
        </div>
    </div>

</div>
