<div class="shop-a" id="side-filter">
    <div class="shop-a__wrap">
        <div class="shop-a__inner gl-scroll">
            <div class="shop-w-master">
                <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>
                    <span>{{ __('frontend.filters') }}</span>
                </h1>
                <div class="shop-w-master__sidebar">
                    <div class="u-s-m-b-30">
                        <div class="shop-w">
                            <div class="shop-w__intro-wrap">
                                <h1 class="shop-w__h">{{ __('frontend.sections') }}</h1>
                                <span class="fas fa-minus shop-w__toggle" data-target="#sections" data-toggle="collapse"></span>
                            </div>
                            <div class="shop-w__wrap show" id="sections">
                                <ul class="shop-w__category-list gl-scroll">
                                    @foreach (App\Models\Section::with('categories')->active()->get() as $section)
                                        <li class="{{ $section->categories->count() ? 'has-list' : '' }} mb-2">
                                            <a href="javascript:;" class="pointer-events-none">{{ $section->name }}</a>
                                            @if ($section->categories->count() > 0)
                                                <span class="js-shop-category-span is-expanded fas fa-plus u-s-m-l-6"></span>
                                                <ul style="display:block">
                                                    @foreach ($section->categories as $category)
                                                        <li class="{{ $category->subCategories->count() > 0 ? 'has-list' : '' }}">
                                                            <a href="{{ route('frontend.category.products', ['url' => $category->url]) }}">{{ $category->name }}</a>
                                                            <span class="category-list__text u-s-m-l-6">({{ $category->products->count() ?? 0 }})</span>
                                                            @if ($category->subCategories->count() > 0)
                                                                <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                                                <ul>
                                                                    @foreach ($category->subCategories as $sub)
                                                                        <li>
                                                                            <a href="{{ route('frontend.category.products', ['url' => $sub->url]) }}">{{ $sub->name }} ({{ $sub->products->count() ?? 0 }})</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="shop-w">
                            <div class="shop-w__intro-wrap">
                                <h1 class="shop-w__h">RATING</h1>

                                <span class="fas fa-minus shop-w__toggle" data-target="#s-rating" data-toggle="collapse"></span>
                            </div>
                            <div class="shop-w__wrap show" id="s-rating">
                                <ul class="shop-w__list gl-scroll">
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        </div>

                                        <span class="shop-w__total-text">(2)</span>
                                    </li>
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                <span>& Up</span>
                                            </div>
                                        </div>

                                        <span class="shop-w__total-text">(8)</span>
                                    </li>
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                <span>& Up</span>
                                            </div>
                                        </div>

                                        <span class="shop-w__total-text">(10)</span>
                                    </li>
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                <span>& Up</span>
                                            </div>
                                        </div>

                                        <span class="shop-w__total-text">(12)</span>
                                    </li>
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                <span>& Up</span>
                                            </div>
                                        </div>

                                        <span class="shop-w__total-text">(1)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="shop-w">
                            <div class="shop-w__intro-wrap">
                                <h1 class="shop-w__h">SHIPPING</h1>

                                <span class="fas fa-minus shop-w__toggle" data-target="#s-shipping" data-toggle="collapse"></span>
                            </div>
                            <div class="shop-w__wrap show" id="s-shipping">
                                <ul class="shop-w__list gl-scroll">
                                    <li>

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="free-shipping">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="free-shipping">Free Shipping</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="shop-w">
                            <div class="shop-w__intro-wrap">
                                <h1 class="shop-w__h">PRICE</h1>

                                <span class="fas fa-minus shop-w__toggle" data-target="#s-price" data-toggle="collapse"></span>
                            </div>
                            <div class="shop-w__wrap show" id="s-price">
                                <form class="shop-w__form-p">
                                    <div class="shop-w__form-p-wrap">
                                        <div>

                                            <label for="price-min"></label>

                                            <input class="input-text input-text--primary-style" type="text" id="price-min" placeholder="Min">
                                        </div>
                                        <div>

                                            <label for="price-max"></label>

                                            <input class="input-text input-text--primary-style" type="text" id="price-max" placeholder="Max">
                                        </div>
                                        <div>

                                            <button class="btn btn--icon fas fa-angle-right btn--e-transparent-platinum-b-2" type="submit"></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="shop-w">
                            <div class="shop-w__intro-wrap">
                                <h1 class="shop-w__h">MANUFACTURER</h1>

                                <span class="fas fa-minus shop-w__toggle" data-target="#s-manufacturer" data-toggle="collapse"></span>
                            </div>
                            <div class="shop-w__wrap show" id="s-manufacturer">
                                <ul class="shop-w__list-2">
                                    <li>
                                        <div class="list__content">

                                            <input type="checkbox" checked>

                                            <span>Calvin Klein</span>
                                        </div>

                                        <span class="shop-w__total-text">(23)</span>
                                    </li>
                                    <li>
                                        <div class="list__content">

                                            <input type="checkbox">

                                            <span>Diesel</span>
                                        </div>

                                        <span class="shop-w__total-text">(2)</span>
                                    </li>
                                    <li>
                                        <div class="list__content">

                                            <input type="checkbox">

                                            <span>Polo</span>
                                        </div>

                                        <span class="shop-w__total-text">(2)</span>
                                    </li>
                                    <li>
                                        <div class="list__content">

                                            <input type="checkbox">

                                            <span>Tommy Hilfiger</span>
                                        </div>

                                        <span class="shop-w__total-text">(9)</span>
                                    </li>
                                    <li>
                                        <div class="list__content">

                                            <input type="checkbox">

                                            <span>Ndoge</span>
                                        </div>

                                        <span class="shop-w__total-text">(3)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="shop-w">
                            <div class="shop-w__intro-wrap">
                                <h1 class="shop-w__h">COLOR</h1>

                                <span class="fas fa-minus shop-w__toggle" data-target="#s-color" data-toggle="collapse"></span>
                            </div>
                            <div class="shop-w__wrap show" id="s-color">
                                <ul class="shop-w__list gl-scroll">
                                    <li>
                                        <div class="color__check">

                                            <input type="checkbox" id="jet">

                                            <label class="color__check-label" for="jet" style="background-color: #333333"></label>
                                        </div>

                                        <span class="shop-w__total-text">(2)</span>
                                    </li>
                                    <li>
                                        <div class="color__check">

                                            <input type="checkbox" id="folly">

                                            <label class="color__check-label" for="folly" style="background-color: #FF0055"></label>
                                        </div>

                                        <span class="shop-w__total-text">(4)</span>
                                    </li>
                                    <li>
                                        <div class="color__check">

                                            <input type="checkbox" id="yellow">

                                            <label class="color__check-label" for="yellow" style="background-color: #FFFF00"></label>
                                        </div>

                                        <span class="shop-w__total-text">(6)</span>
                                    </li>
                                    <li>
                                        <div class="color__check">

                                            <input type="checkbox" id="granite-gray">

                                            <label class="color__check-label" for="granite-gray" style="background-color: #605F5E"></label>
                                        </div>

                                        <span class="shop-w__total-text">(8)</span>
                                    </li>
                                    <li>
                                        <div class="color__check">

                                            <input type="checkbox" id="space-cadet">

                                            <label class="color__check-label" for="space-cadet" style="background-color: #1D3461"></label>
                                        </div>

                                        <span class="shop-w__total-text">(10)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="shop-w">
                            <div class="shop-w__intro-wrap">
                                <h1 class="shop-w__h">SIZE</h1>

                                <span class="fas fa-minus collapsed shop-w__toggle" data-target="#s-size" data-toggle="collapse"></span>
                            </div>
                            <div class="shop-w__wrap" id="s-size">
                                <ul class="shop-w__list gl-scroll">
                                    <li>

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="xs">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="xs">XS</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->

                                        <span class="shop-w__total-text">(2)</span>
                                    </li>
                                    <li>

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="small">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="small">Small</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->

                                        <span class="shop-w__total-text">(4)</span>
                                    </li>
                                    <li>

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="medium">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="medium">Medium</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->

                                        <span class="shop-w__total-text">(6)</span>
                                    </li>
                                    <li>

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="large">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="large">Large</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->

                                        <span class="shop-w__total-text">(8)</span>
                                    </li>
                                    <li>

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="xl">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="xl">XL</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->

                                        <span class="shop-w__total-text">(10)</span>
                                    </li>
                                    <li>

                                        <!--====== Check Box ======-->
                                        <div class="check-box">

                                            <input type="checkbox" id="xxl">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="xxl">XXL</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->

                                        <span class="shop-w__total-text">(12)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
