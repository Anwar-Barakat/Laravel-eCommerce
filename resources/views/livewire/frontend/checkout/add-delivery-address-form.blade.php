<form class="checkout-f__delivery" wire:submit.prevent='submit'>
    <div class="u-s-m-b-30">
        <!--====== First Name, Last Name ======-->
        <div class="gl-inline">
            <div class="u-s-m-b-15">
                <label class="gl-label" for="billing-fname">{{ __('frontend.first_name') }} *</label>
                <input class="input-text input-text--primary-style" type="text" id="billing-fname" data-bill="" wire:model.defer='address.first_name'>
                <x-input-error :messages="$errors->get('address.first_name')" class="mt-2" />

            </div>
            <div class="u-s-m-b-15">
                <label class="gl-label" for="billing-lname">{{ __('frontend.last_name') }} *</label>
                <input class="input-text input-text--primary-style" type="text" id="billing-lname" data-bill="" wire:model.defer='address.last_name'>
                <x-input-error :messages="$errors->get('address.last_name')" class="mt-2" />
            </div>
        </div>
        <!--====== End - First Name, Last Name ======-->


        <!--====== E-MAIL ======-->
        <div class="u-s-m-b-15">
            <label class="gl-label" for="billing-email">{{ __('frontend.email') }} *</label>
            <input class="input-text input-text--primary-style" type="email" id="billing-email" data-bill="" wire:model.defer='address.email'>
            <x-input-error :messages="$errors->get('address.email')" class="mt-2" />
        </div>
        <!--====== End - E-MAIL ======-->


        <!--====== PHONE ======-->
        <div class="u-s-m-b-15">
            <label class="gl-label" for="billing-phone">{{ __('frontend.mobile') }} *</label>
            <input class="input-text input-text--primary-style" type="tel" id="billing-phone" data-bill="" wire:model.defer='address.mobile'>
            <x-input-error :messages="$errors->get('address.mobile')" class="mt-2" />
        </div>
        <!--====== End - PHONE ======-->


        <!--====== Street Address ======-->
        <div class="u-s-m-b-15">
            <label class="gl-label" for="billing-street">STREET ADDRESS *</label>
            <input class="input-text input-text--primary-style" type="text" id="billing-street" placeholder="House name and street name" data-bill="" wire:model.defer='address.street_address'>
            <x-input-error :messages="$errors->get('address.street_address')" class="mt-2" />
        </div>
        <!--====== End - Street Address ======-->


        <!--====== Country ======-->
        <div class="u-s-m-b-15">
            <!--====== Select Box ======-->

            <label class="gl-label" for="billing-country">{{ __('frontend.country') }} *</label>
            <select class="select-box select-box--primary-style" id="billing-country" data-bill="" wire:model.defer='address.country_id'>
                <option selected value="">{{ __('btns.select') }}</option>
                @foreach (App\Models\Country::active()->get() as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('address.country_id')" class="mt-2" />
            <!--====== End - Select Box ======-->
        </div>
        <!--====== End - Country ======-->


        <!--====== Town / City ======-->
        <div class="u-s-m-b-15">
            <label class="gl-label" for="billing-town-city">{{ __('frontend.town_city') }} *</label>
            <input class="input-text input-text--primary-style" type="text" id="billing-town-city" data-bill="" wire:model.defer='address.city'>
            <x-input-error :messages="$errors->get('address.city')" class="mt-2" />
        </div>
        <!--====== End - Town / City ======-->



        <div class="u-s-m-b-10">
            <!--====== Check Box ======-->
            <div class="check-box">
                <input type="checkbox" id="make-default-address" data-bill="" wire:model='address.is_default'>
                <div class="check-box__state check-box__state--primary">
                    <label class="check-box__label" for="make-default-address">{{ __('frontend.make_it_default_delivery_address') }}</label>
                </div>
                <x-input-error :messages="$errors->get('address.is_default')" class="mt-2" />
            </div>
            <!--====== End - Check Box ======-->
        </div>
        <div class="gl-inline">
            <div class="u-s-m-b-30">
                <button class="btn btn--e-transparent-hover-brand-b-2" id="save-delivery-address" type="submit">{{ __('btns.submit') }}</button>
            </div>
        </div>
    </div>
</form>
