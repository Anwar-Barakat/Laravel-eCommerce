{{-- profile --}}
<div class="col d-flex flex-column">
    <form wire:submit.prevent='updateInfo'>
        <div class="card-body">
            <h2 class="mb-4">{{ __('msgs.edit', ['name' => __('partials.profile')]) }}</h2>
            <div class="row row-cards">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        @if ($logo)
                            <img src="{{ $logo->temporaryUrl() }}" class="img img-thumbnail" width="200">
                        @elseif (auth()->guard('admin')->user()->getFirstMediaUrl('avatar'))
                            <img src="{{ auth()->guard('admin')->user()->getFirstMediaUrl('avatar') }}" alt="{{ auth()->guard('admin')->user()->company_code }}" class="img img-thumbnail" width="200">
                        @else
                            <img src="{{ asset('backend/static/avatars/default-logo.jpg.webp') }}" alt="">
                        @endif
                    </div>
                </div>
            </div>
            @include('layouts.inc.errors-message')
            <div class="row row-cards">
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <x-input-label class="form-label" :value="__('auth.email')" />
                        <x-text-input type="text" class="form-control" placeholder="{{ __('auth.email') }}" wire:model='admin.email' required />
                        <x-input-error :messages="$errors->get('admin.email')" class="mt-2" />
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="mb-3">
                        <x-input-label class="form-label" :value="__('auth.name')" />
                        <x-text-input type="text" class="form-control" placeholder="{{ __('auth.name') }}" wire:model='admin.name' required />
                        <x-input-error :messages="$errors->get('admin.name')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <x-input-label class="form-label" :value="__('setting.address')" />
                        <x-text-input type="text" class="form-control" placeholder="{{ __('setting.address') }}" wire:model='admin.address' required />
                        <x-input-error :messages="$errors->get('admin.address')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <x-input-label class="form-label" :value="__('setting.bio')" />
                        <textarea rows="5" class="form-control" placeholder="{{ __('setting.bio') }}" wire:model='admin.bio' required></textarea>
                        <x-input-error :messages="$errors->get('admin.bio')" class="mt-2" />
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="mb-3">
                        <x-input-label class="form-label" :value="__('setting.avatar')" />
                        <x-text-input type="file" class="form-control" wire:model="logo" />
                        <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">{{ __('msgs.update', ['name' => __('partials.profile')]) }}</button>
        </div>
    </form>
</div>
