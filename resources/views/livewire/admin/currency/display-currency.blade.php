<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h3 class="card-title">{{ __('msgs.all', ['name' => __('order.shipping_charge')]) }}</h3>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-2">
                <div class="mb-3">
                    <x-input-label class="form-label" :value="__('order.currency_code')" />
                    <x-text-input class="form-control" placeholder="{{ __('btns.search') }}" wire:model="code" />
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-2">
                <div class="mb-3">
                    <x-input-label class="form-label" :value="__('msgs.order_by')" />
                    <select class="form-select" wire:model='order_by'>
                        <option value="">{{ __('btns.select') }}</option>
                        <option value="code">{{ __('order.currency_code') }}</option>
                        <option value="exchange_rate">{{ __('order.exchange_rate') }}</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-2">
                <div class="mb-3">
                    <x-input-label class="form-label" :value="__('msgs.per_page')" />
                    <select class="form-select" wire:model='per_page'>
                        <option value="">{{ __('btns.select') }}</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-2">
                <div class="mb-3">
                    <x-input-label class="form-label" :value="__('msgs.sort_by')" />
                    <select class="form-select" wire:model='sort_by'>
                        <option value="">{{ __('btns.select') }}</option>
                        <option value="asc">{{ __('msgs.asc') }}</option>
                        <option value="desc">{{ __('msgs.desc') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                </div>
            </div>
        </div>
        <br>
        <div id="table-default" class="table-responsive">
            <table id="dataTables" class="table table-vcenter table-mobile-md card-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ __('order.currency_code') }}</th>
                        <th>{{ __('order.exchange_rate') }}</th>
                        <th>{{ __('partials.status') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody class="table-tbody">
                    @forelse ($currencies as $currency)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td> {{ $currency->code }}</td>
                            <td> {{ $currency->exchange_rate }}</td>
                            <td>
                                <div>
                                    <button wire:click='updateStatus({{ $currency }})' class="btn position-relative">
                                        {{ $currency->is_active ? __('msgs.active') : __('msgs.not_active') }}
                                        <span class="badge {{ $currency->is_active ? 'bg-green' : 'bg-red' }} badge-notification badge-blink"></span>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <span class="dropdown">
                                    <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('btns.actions') }}</button>
                                    <div class="dropdown-menu">
                                        <a href="{{ route('admin.shipping-charges.edit', ['shipping_charge' => $currency]) }}" class="dropdown-item d-flex align-items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                <path d="M16 5l3 3" />
                                            </svg>
                                            <span>{{ __('btns.edit') }}</span>
                                        </a>
                                    </div>
                                </span>
                                {{-- <x-modal-delete :id="$currency->id" :action="route('admin.shipping-charges.destroy', ['currency' => $currency])" /> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="border-bottom-0">
                                <x-blank-section :url="'javascript:;'" :content="__('')" />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="p-3 mt-2">
                {{ $currencies->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <div class="card-footer">
    </div>
</div>
