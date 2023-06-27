<div>
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col d-flex flex-column">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h3 class="card-title">{{ __('msgs.create', ['name' => __('product.color')]) }}</h3>
                </div>
                <form wire:submit.prevent='submit'>
                    <div class="card-body">
                        <h3 class="mb-3 text-blue">{{ __('msgs.main_info') }}</h3>
                        <div class="row row-cards">
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <x-input-label class="form-label" :value="__('auth.name')" />
                                    <x-text-input type="text" class="form-control" placeholder="Red" wire:model='color.name' required />
                                    <x-input-error :messages="$errors->get('color.name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="mb-3">
                                    <x-input-label class="form-label" :value="__('partials.status')" />
                                    <select class="form-select" wire:model.defer='color.is_active'>
                                        <option value="">{{ __('btns.select') }}</option>
                                        <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>{{ __('msgs.yes') }}</option>
                                        <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>{{ __('msgs.no') }}</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('color.is_active')" class="mt-2" />
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
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-2">
                    <div class="mb-3">
                        <x-input-label class="form-label" :value="__('msgs.search_by_name')" />
                        <x-text-input class="form-control" placeholder="{{ __('btns.search') }}" wire:model="name" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-2">
                    <div class="mb-3">
                        <x-input-label class="form-label" :value="__('msgs.order_by')" />
                        <select class="form-select" wire:model='order_by'>
                            <option value="">{{ __('btns.select') }}</option>
                            <option value="name">{{ __('product.color_name') }}</option>
                            <option value="created_at">{{ __('msgs.created_at') }}</option>
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
                    </div>
                </div>
            </div>
            <br>
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
                        @forelse ($colors as $color)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td> {{ $color->name }}</td>
                                <td>
                                    <div>
                                        <button wire:click='updateStatus({{ $color->id }})' class="btn position-relative">
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
                    {{ $colors->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

        <div class="card-footer">
        </div>
    </div>

</div>
