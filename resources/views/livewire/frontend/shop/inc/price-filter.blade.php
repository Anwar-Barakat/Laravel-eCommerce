<div class="u-s-m-b-30">
    <div class="shop-w">
        <div class="shop-w__intro-wrap">
            <h1 class="shop-w__h">{{ __('frontend.shop_capital') }}</h1>

            <span class="fas fa-minus shop-w__toggle" data-target="#s-price" data-toggle="collapse"></span>
        </div>
        <div class="shop-w__wrap show" id="s-price">
            <form class="shop-w__form-p">
                <div class="shop-w__form-p-wrap">
                    <div>
                        <label for="price-min"></label>
                        <input class="input-text input-text--primary-style" type="text" id="price-min" placeholder="Min" wire:model='min_price'>
                    </div>
                    <div>
                        <label for="price-max"></label>
                        <input class="input-text input-text--primary-style" type="text" id="price-max" placeholder="Max" wire:model='max_price'>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
