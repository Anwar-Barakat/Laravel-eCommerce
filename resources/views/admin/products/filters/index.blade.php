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
                        <th>{{ __('product.filter') }}</th>
                        <th>{{ __('product.filter_value') }}</th>
                        <th>{{ __('setting.status') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productFilters as $productFilter)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $productFilter->filter->name }}</td>
                            <td>{{ $productFilter->filter_value->value }}</td>
                            <td>
                                <div>
                                    <button wire:click='updateStatus({{ $productFilter }})' class="btn position-relative">
                                        {{ $productFilter->is_active ? __('msgs.active') : __('msgs.not_active') }}
                                        <span class="badge {{ $productFilter->is_active ? 'bg-green' : 'bg-red' }} badge-notification badge-blink"></span>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex items-center gap-3">
                                    <a href="javascrip:;" class="" wire:click='edit({{ $productFilter }})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                            <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                            <path d="M16 5l3 3" />
                                        </svg>
                                    </a>
                                    <a href="javascript:;" class="" wire:click='delete({{ $productFilter }})'>
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
                        <tr>
                            <td colspan="5" class="border-bottom-0">
                                <x-blank-section :url="'#add-productFilters'" :content="__('msgs.create', ['name' => __('product.product_productFilter')])" />
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="card-footer border-top-0">
            </div>
        </div>
    </div>
</div>
