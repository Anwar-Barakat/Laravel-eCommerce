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
    @include('admin.products.attachments.index')
</div>
