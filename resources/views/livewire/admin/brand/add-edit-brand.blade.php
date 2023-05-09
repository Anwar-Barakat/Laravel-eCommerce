<div class="card">
    <div class="row g-0">
        <div class="col d-flex flex-column">
            <form wire:submit.prevent='submit'>
                <div class="card-body">
                    <h3 class="mb-3 text-blue">{{ __('msgs.main_info') }}</h3>
                    <div class="row row-cards">
                        <div class="col-sm-12 m-auto mb-4 text-center mt-4">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" class="img img-thumbnail" width="300">
                            @elseif ($brand->getFirstMediaUrl('brands', 'thumb'))
                                <img src="{{ $brand->getFirstMediaUrl('brands') }}" class="img img-thumbnail" alt="{{ $brand->name }}" width="300">
                            @else
                                <img src="{{ asset('backend/static/logo-small.svg') }}" class="img img-thumbnail" alt="{{ $brand->name }}" width="300">
                            @endif
                        </div>
                    </div>
                    <div class="row row-cards">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="mb-3">
                                <x-input-label class="form-label" :value="__('auth.name')" />
                                <x-text-input type="text" class="form-control" placeholder="ZARA" wire:model='brand.name' required />
                                <x-input-error :messages="$errors->get('brand.name')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="mb-3">
                                <x-input-label class="form-label" :value="__('partials.status')" />
                                <select class="form-select" wire:model.defer='brand.is_active'>
                                    <option value="">{{ __('btns.select') }}</option>
                                    <option value="1" {{ old('is_active') == '1' ? 'selected' : '' }}>{{ __('msgs.yes') }}</option>
                                    <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>{{ __('msgs.no') }}</option>
                                </select>
                                <x-input-error :messages="$errors->get('brand.is_active')" class="mt-2" />
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <x-input-label class="form-label" :value="__('msgs.photo')" />
                            <x-text-input type="file" class="form-control" wire:model='image' />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
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
