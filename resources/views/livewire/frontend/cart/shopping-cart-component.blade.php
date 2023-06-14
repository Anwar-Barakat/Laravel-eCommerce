<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">
                                <a href="{{ route('frontend.home') }}">{{ __('frontend.home') }}</a>
                            </li>
                            <li class="is-marked">
                                <a href="javascript:;">{{ __('frontend.cart') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">{{ __('frontend.shopping_cart') }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                @if ($cart_items->count() > 0)
                    <div class="row mb-4">
                        <div class="col-lg-12">
                            <div id="checkout-msg-group">
                                <div class="f-cart__pad-box">
                                    <span class="msg__text">{{ __('frontend.have_a_coupon') }}
                                        <a class="gl-link" href="#have-coupon" data-toggle="collapse">{{ __('frontend.click_here_to_enter_code') }}</a>
                                    </span>
                                    <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                                        <div class="c-f u-s-m-b-16">
                                            <span class="gl-text u-s-m-b-16">{{ __('frontend.you_have_a_coupon_code') }}</span>
                                            <form class="c-f__form" wire:submit.prevent='applyCoupon'>
                                                <div class="u-s-m-b-16">
                                                    <div class="u-s-m-b-15">
                                                        <label for="coupon"></label>
                                                        <input class="input-text input-text--primary-style" type="text" id="coupon" placeholder="{{ __('product.coupon_code') }}" wire:model.defer='coupon' required>
                                                    </div>
                                                    <div class="u-s-m-b-15">
                                                        <button class="btn btn--e-transparent-brand-b-2" type="submit">{{ __('btns.apply') }}</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                        <div class="table-responsive">
                            <table class="table-p">
                                <tbody>
                                    <!--====== Row ======-->
                                    @php
                                        $sub_total = 0;
                                    @endphp
                                    @forelse ($cart_items as $cart_item)
                                        @php
                                            $sub_total += $cart_item->grand_total;
                                        @endphp
                                        <tr>
                                            <td>
                                                <div class="table-p__box">
                                                    <div class="table-p__img-wrap">
                                                        @if ($cart_item->product->getFirstMediaUrl('products', 'small'))
                                                            <img class="u-img-fluid" src="{{ $cart_item->product->getFirstMediaUrl('products', 'small') }}" alt="{{ $cart_item->product->name }}">
                                                        @else
                                                            <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="table-p__info">
                                                        <span class="table-p__name">
                                                            <a href="{{ route('frontend.product.detail', ['product' => $cart_item->product]) }}">{{ $cart_item->product->name }}</a>
                                                        </span>
                                                        <span class="table-p__category">
                                                            <a href="{{ route('frontend.category.products', ['url' => $cart_item->product->category->url]) }}">{{ $cart_item->product->category->name }}</a>
                                                        </span>
                                                        <ul class="table-p__variant-list">
                                                            <li>
                                                                <span>{{ __('frontend.size') }}: {{ $cart_item->size }}</span>
                                                            </li>
                                                            <li>
                                                                <span>Color: Red</span>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <span class="table-p__price">${{ $cart_item->unit_price }}</span>
                                            </td>
                                            <td>
                                                <div class="table-p__input-counter-wrap">
                                                    <!--====== Input Counter ======-->
                                                    <div class="input-counter">
                                                        <span class="input-counter__minus fas fa-minus" wire:click='decreaseQty({{ $cart_item->id }})'></span>
                                                        <input class="input-counter__text input-counter--text-primary-style" value="{{ $cart_item->qty }}" type="text" data-min="1" data-max="1000" wire:input='qty'>
                                                        <span class="input-counter__plus fas fa-plus" wire:click='increaseQty({{ $cart_item->id }})'></span>
                                                    </div>
                                                    <!--====== End - Input Counter ======-->
                                                </div>
                                            </td>
                                            <td>
                                                <span class="table-p__price">${{ $cart_item->grand_total }}</span>
                                            </td>
                                            <td>
                                                <div class="table-p__del-wrap">
                                                    <a class="far fa-trash-alt table-p__delete-link" href="javascript:;" wire:click="deleteItem({{ $cart_item->id }})"></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <div class="empty">
                                            <div class="empty__wrap">
                                                <span class="empty__big-text">EMPTY</span>
                                                <span class="empty__text-1">No items found on your cart.</span>
                                                <a class="empty__redirect-link btn--e-brand" href="{{ route('frontend.shop') }}">{{ __('frontend.continue_shopping') }}</a>
                                            </div>
                                        </div>
                                    @endforelse
                                    <!--====== End - Row ======-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="route-box">
                            <div class="route-box__g1">
                                <a class="route-box__link" href="{{ route('frontend.shop') }}"><i class="fas fa-long-arrow-alt-left"></i>
                                    <span>{{ __('frontend.continue_shopping') }}</span>
                                </a>
                            </div>
                            @if ($cart_items->count() > 0)
                                <div class="route-box__g2">
                                    <a class="route-box__link"><i class="fas fa-trash"></i>
                                        <span>{{ __('frontend.clear_cart') }}</span>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!--====== End - Section Content ======-->


    </div>
    <!--====== End - Section 2 ======-->


    @if ($cart_items->count() > 0)
        <!--====== Section 3 ======-->
        <div class="u-s-p-b-60">

            <!--====== Section Content ======-->
            <div class="section__content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                            <form class="f-cart">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                        <div class="f-cart__pad-box">
                                            <h1 class="gl-h1">ESTIMATE SHIPPING AND TAXES</h1>

                                            <span class="gl-text u-s-m-b-30">Enter your destination to get a shipping estimate.</span>
                                            <div class="u-s-m-b-30">
                                                <!--====== Select Box ======-->
                                                <label class="gl-label" for="shipping-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="shipping-country">
                                                    <option selected value="">Choose Country</option>
                                                    <option value="uae">United Arab Emirate (UAE)</option>
                                                    <option value="uk">United Kingdom (UK)</option>
                                                    <option value="us">United States (US)</option>
                                                </select>
                                                <!--====== End - Select Box ======-->
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <!--====== Select Box ======-->
                                                <label class="gl-label" for="shipping-state">STATE/PROVINCE *</label><select class="select-box select-box--primary-style" id="shipping-state">
                                                    <option selected value="">Choose State/Province</option>
                                                    <option value="al">Alabama</option>
                                                    <option value="al">Alaska</option>
                                                    <option value="ny">New York</option>
                                                </select>
                                                <!--====== End - Select Box ======-->
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="shipping-zip">ZIP/POSTAL CODE *</label>
                                                <input class="input-text input-text--primary-style" type="text" id="shipping-zip" placeholder="Zip/Postal Code">
                                            </div>
                                            <span class="gl-text">{{ __('frontend.cart_free_shipping_note') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                        <div class="f-cart__pad-box">
                                            <h1 class="gl-h1">{{ __('frontend.note') }}</h1>
                                            <span class="gl-text u-s-m-b-30">{{ __('frontend.add_special_note_about_your_product') }}</span>
                                            <div>
                                                <label for="f-cart-note"></label>
                                                <textarea class="text-area text-area--primary-style" id="f-cart-note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                        <div class="f-cart__pad-box">
                                            <div class="u-s-m-b-30">
                                                <table class="f-cart__table">
                                                    <tbody>
                                                        <tr>
                                                            <td>{{ __('frontend.shipping') }}</td>
                                                            <td>$0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('frontend.tax') }}</td>
                                                            <td>$0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('frontend.subtotal') }}</td>
                                                            <td>${{ number_format($sub_total, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('frontend.coupon_discount') }}</td>
                                                            <td>$0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>{{ __('frontend.grand_total') }}</td>
                                                            <td>${{ number_format($sub_total, 2) }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div>
                                                <button class="btn btn--e-brand-b-2" type="submit"> {{ __('frontend.proceed_to_checkout') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--====== End - Section Content ======-->
        </div>
        <!--====== End - Section 3 ======-->
    @endif
</div>
