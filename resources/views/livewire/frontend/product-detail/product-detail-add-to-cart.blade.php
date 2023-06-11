<div class="pd-detail-inline-2">
    <div class="u-s-m-b-15">
        <!--====== Input Counter ======-->
        <div class="input-counter">
            <span class="input-counter__minus fas fa-minus cursor-pointer" wire:click="decreaseQty()"></span>
            <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="100" wire:input='qty'>
            <span class="input-counter__plus fas fa-plus cursor-pointer" wire:click="increaseQty()"></span>
        </div>
        <!--====== End - Input Counter ======-->
    </div>
    <div class="u-s-m-b-15">
        <button class="btn btn--e-brand-b-2" type="submit" wire:click.prevent="addToCard()">{{ __('frontend.add_to_card') }}</button>
    </div>
</div>
