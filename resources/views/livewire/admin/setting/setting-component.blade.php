<div class="col d-flex flex-column">
    <form wire:submit.prevent='updateSetting'>
        <div class="card-body">
            <h2 class="mb-4">{{ __('setting.settings') }}</h2>
            <h3 class="card-title">{{ __('setting.details') }}</h3>
            <div class="row align-items-center">
                <div class="col-auto">
                    @if ($logo)
                        <img src="{{ $logo->temporaryUrl() }}" class="img img-thumbnail" width="200">
                    @elseif ($setting->getFirstMediaUrl('setting'))
                        <img src="{{ $setting->getFirstMediaUrl('setting') }}" alt="{{ $setting->company_code }}" class="img img-thumbnail" width="200">
                    @else
                        <img src="{{ asset('backend/static/avatars/default-logo.jpg.webp') }}" alt="Avatar">
                    @endif
                </div>
            </div>
            <h3 class="card-title mt-4 text-blue">{{ __('btns.details') }}</h3>
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6">
                    <x-input-label class="form-label" :value="__('auth.name')" />
                    <x-text-input type="text" class="form-control" wire:model="setting.name" required />
                    <x-input-error :messages="$errors->get('setting.name')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6">
                    <x-input-label class="form-label" :value="__('auth.email')" />
                    <x-text-input type="text" class="form-control" wire:model="setting.email" required />
                    <x-input-error :messages="$errors->get('setting.email')" class="mt-2" />
                </div>
            </div>
            <div class="row g-3 mb-4">
                <div class="col-12 col-md-6">
                    <x-input-label class="form-label" :value="__('setting.mobile')" />
                    <x-text-input type="text" class="form-control" wire:model="setting.mobile" required />
                    <x-input-error :messages="$errors->get('setting.mobile')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6">
                    <x-input-label class="form-label" :value="__('setting.address')" />
                    <x-text-input type="text" class="form-control" wire:model="setting.address" required />
                    <x-input-error :messages="$errors->get('setting.address')" class="mt-2" />
                </div>
            </div>
            <hr>
            <h3 class="card-title mt-4 text-blue">{{ __('setting.social_media') }}</h3>
            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-6">
                    <x-input-label class="form-label" :value="__('setting.facebook_url')" />
                    <x-text-input type="url" class="form-control" wire:model="setting.facebook_url" required />
                    <x-input-error :messages="$errors->get('setting.facebook_url')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <x-input-label class="form-label" :value="__('setting.instagram_url')" />
                    <x-text-input type="url" class="form-control" wire:model="setting.instagram_url" required />
                    <x-input-error :messages="$errors->get('setting.instagram_url')" class="mt-2" />
                </div>
                <div class="col-12 col-md-6 col-lg-6">
                    <x-input-label class="form-label" :value="__('setting.twitter_url')" />
                    <x-text-input type="url" class="form-control" wire:model="setting.twitter_url" required />
                    <x-input-error :messages="$errors->get('setting.twitter_url')" class="mt-2" />
                </div>
            </div>
            <hr>
            <h3 class="card-title mt-4 text-blue">{{ __('setting.logo') }}</h3>
            <div class="row g-3">
                <div class="col-12 col-md-6 col-lg-6">
                    <x-text-input type="file" class="form-control" wire:model="logo" />
                    <x-input-error :messages="$errors->get('logo')" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent mt-auto">
            <div class="btn-list justify-content-end">
                <a href="#" class="btn">
                    {{ __('btns.cancel') }}
                </a>
                <button type="subnit" class="btn btn-primary">
                    <div wire:loading.delay wire:key='updateSetting' wire:target='updateSetting'>
                        <i class="fa fa-spinner fa-spin text-lg"></i>
                    </div>
                    {{ __('btns.submit') }}
                </button>
            </div>
        </div>
    </form>
</div>
