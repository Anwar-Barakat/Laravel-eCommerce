<header class="header--style-2">

    <!--====== Nav 1 ======-->
    <nav class="primary-nav-wrapper">
        <div class="container">

            <!--====== Primary Nav ======-->
            <div class="primary-nav">
                <!--====== Main Logo ======-->

                <a class="main-logo" href="index.html">
                    <img src="{{ asset('frontend/dist/images/logo/logo-2.png') }}" alt=""></a>
                <!--====== End - Main Logo ======-->

                <!--====== Search Form ======-->
                <form class="main-form">
                    <label for="main-search"></label>
                    <input class="input-text input-text--border-radius input-text--style-2" type="text" id="main-search" placeholder="Search">
                    <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                </form>
                <!--====== End - Search Form ======-->


                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation">

                    <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cogs" type="button"></button>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design1 ah-list--link-color-white">
                            <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">

                                <a><i class="far fa-user-circle"></i></a>

                                <!--====== Dropdown ======-->

                                <span class="js-menu-toggle"></span>
                                <ul style="width:120px">
                                    @auth
                                        <li>
                                            <a href="dashboard.html">
                                                <i class="fas fa-user-circle u-s-m-r-6"></i>
                                                <span>Account</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('frontend.orders.index') }}">
                                                <i class="fas fa-shopping-bag u-s-m-r-6"></i>
                                                <span>{{ __('frontend.my_orders') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" onclick="document.getElementById('user-logout-form').submit()">
                                                <i class="fas fa-lock-open u-s-m-r-6"></i>
                                                <span>Signout</span>
                                            </a>
                                            <form action="{{ route('logout') }}" method="POST" id="user-logout-form" class="hidden">
                                                @csrf
                                            </form>
                                        </li>
                                    @endauth

                                    @guest
                                        <li>
                                            <a href="{{ route('register') }}">
                                                <i class="fas fa-user-plus u-s-m-r-6"></i>
                                                <span>Signup</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('login') }}">
                                                <i class="fas fa-lock u-s-m-r-6"></i>
                                                <span>Signin</span>
                                            </a>
                                        </li>
                                    @endguest
                                </ul>
                                <!--====== End - Dropdown ======-->
                            </li>
                            <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Settings">

                                <a><i class="fas fa-user-cog"></i></a>

                                <!--====== Dropdown ======-->

                                <span class="js-menu-toggle"></span>
                                <ul style="width:120px">
                                    <li class="has-dropdown has-dropdown--ul-right-100">

                                        <a>Language<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">
                                            <li>

                                                <a class="u-c-brand">ENGLISH</a>
                                            </li>
                                            <li>

                                                <a>ARABIC</a>
                                            </li>
                                            <li>

                                                <a>FRANCAIS</a>
                                            </li>
                                            <li>

                                                <a>ESPANOL</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-right-100">

                                        <a>Currency<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:225px">
                                            <li>

                                                <a class="u-c-brand">$ - US DOLLAR</a>
                                            </li>
                                            <li>

                                                <a>£ - BRITISH POUND STERLING</a>
                                            </li>
                                            <li>

                                                <a>€ - EURO</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - Dropdown ======-->
                            </li>
                            <li data-tooltip="tooltip" data-placement="left" title="Contact">

                                <a href="tel:+0900901904"><i class="fas fa-phone-volume"></i></a>
                            </li>
                            <li data-tooltip="tooltip" data-placement="left" title="Mail">

                                <a href="mailto:contact@domain.com"><i class="far fa-envelope"></i></a>
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
            </div>
            <!--====== End - Primary Nav ======-->
        </div>
    </nav>
    <!--====== End - Nav 1 ======-->


    <!--====== Nav 2 ======-->
    <nav class="secondary-nav-wrapper">
        <div class="container">

            <!--====== Secondary Nav ======-->
            <div class="secondary-nav">

                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation1">

                    <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                        <!--====== List ======-->
                        <ul class="ah-list">
                            <li class="has-dropdown">

                                <span class="mega-text">R</span>

                                <!--====== Mega Menu ======-->
                                <span class="js-menu-toggle"></span>
                                <div class="mega-menu">
                                    <div class="mega-menu-wrap">
                                        <div class="mega-menu-list">
                                            <ul>
                                                @foreach ($sections as $key => $section)
                                                    <li class="{{ $key == 0 ? 'js-active' : '' }}">
                                                        <a href="javascript:;">
                                                            <i class="fas fa-tv u-s-m-r-6"></i>
                                                            <span>{{ $section->name }}</span></a>
                                                        <span class="js-menu-toggle js-toggle-mark"></span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        @forelse ($sections as $key => $section)
                                            <!--====== Electronics ======-->
                                            <div class="mega-menu-content {{ $key == 0 ? 'js-active' : '' }}">
                                                <!--====== Mega Menu Row ======-->
                                                <div class="row flex-wrap ">
                                                    @forelse ($section->categories as $category)
                                                        <div class="col-lg-3 u-s-m-b-20">
                                                            <ul>
                                                                <li class="mega-list-title">
                                                                    <a href="{{ route('frontend.category.products', ['url' => $category->url]) }}">{{ $category->name }}</a>
                                                                </li>
                                                                @foreach ($category->subCategories as $sub)
                                                                    <li>
                                                                        <a href="{{ route('frontend.category.products', ['url' => $sub->url]) }}">{{ $sub->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                        <br>
                                                    @empty
                                                        <h5>No Categories</h5>
                                                    @endforelse

                                                </div>
                                                <!--====== End - Mega Menu Row ======-->

                                            </div>
                                            <!--====== End - Electronics ======-->
                                        @empty
                                            <h5>No Sections</h5>
                                        @endforelse
                                    </div>
                                </div>
                                <!--====== End - Mega Menu ======-->
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->


                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation2">

                    <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-cog" type="button"></button>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design2 ah-list--link-color-white">
                            <li>
                                <a href="#new-arrivals">NEW ARRIVALS</a>
                            </li>
                            <li class="has-dropdown">

                                <a>PAGES<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                <!--====== Dropdown ======-->

                                <span class="js-menu-toggle"></span>
                                <ul style="width:170px">
                                    <li class="has-dropdown has-dropdown--ul-left-100">
                                        <a href="{{ route('frontend.home') }}">{{ __('frontend.home') }}</a>
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">
                                        <a href="{{ route('frontend.shop') }}">{{ __('frontend.shop') }}</a>
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">
                                        <a href="{{ route('frontend.cart.index') }}">{{ __('frontend.cart') }}</a>
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">
                                        <a>Account<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>

                                                <a href="signin.html">Signin / Already Registered</a>
                                            </li>
                                            <li>

                                                <a href="signup.html">Signup / Register</a>
                                            </li>
                                            <li>

                                                <a href="lost-password.html">Lost Password</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a href="dashboard.html">Dashboard<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li class="has-dropdown has-dropdown--ul-left-100">

                                                <a href="dashboard.html">Manage My Account<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:180px">
                                                    <li>

                                                        <a href="dash-edit-profile.html">Edit Profile</a>
                                                    </li>
                                                    <li>

                                                        <a href="dash-address-book.html">Edit Address Book</a>
                                                    </li>
                                                    <li>

                                                        <a href="dash-manage-order.html">Manage Order</a>
                                                    </li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                            <li>

                                                <a href="dash-my-profile.html">My Profile</a>
                                            </li>
                                            <li class="has-dropdown has-dropdown--ul-left-100">

                                                <a href="dash-address-book.html">Address Book<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:180px">
                                                    <li>

                                                        <a href="dash-address-make-default.html">Address Make Default</a>
                                                    </li>
                                                    <li>

                                                        <a href="dash-address-add.html">Add New Address</a>
                                                    </li>
                                                    <li>

                                                        <a href="dash-address-edit.html">Edit Address Book</a>
                                                    </li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                            <li>

                                                <a href="dash-track-order.html">Track Order</a>
                                            </li>
                                            <li>

                                                <a href="dash-my-order.html">My Orders</a>
                                            </li>
                                            <li>

                                                <a href="dash-payment-option.html">My Payment Options</a>
                                            </li>
                                            <li>

                                                <a href="dash-cancellation.html">My Returns & Cancellations</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Empty<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>

                                                <a href="empty-search.html">Empty Search</a>
                                            </li>
                                            <li>

                                                <a href="empty-cart.html">Empty Cart</a>
                                            </li>
                                            <li>

                                                <a href="empty-wishlist.html">Empty Wishlist</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Product Details<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>

                                                <a href="product-detail.html">Product Details</a>
                                            </li>
                                            <li>

                                                <a href="product-detail-variable.html">Product Details Variable</a>
                                            </li>
                                            <li>

                                                <a href="product-detail-affiliate.html">Product Details Affiliate</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Shop Grid Layout<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>

                                                <a href="shop-grid-left.html">Shop Grid Left Sidebar</a>
                                            </li>
                                            <li>

                                                <a href="shop-grid-right.html">Shop Grid Right Sidebar</a>
                                            </li>
                                            <li>

                                                <a href="shop-grid-full.html">Shop Grid Full Width</a>
                                            </li>
                                            <li>

                                                <a href="shop-side-version-2.html">Shop Side Version 2</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown has-dropdown--ul-left-100">

                                        <a>Shop List Layout<i class="fas fa-angle-down i-state-right u-s-m-l-6"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:200px">
                                            <li>

                                                <a href="shop-list-left.html">Shop List Left Sidebar</a>
                                            </li>
                                            <li>

                                                <a href="shop-list-right.html">Shop List Right Sidebar</a>
                                            </li>
                                            <li>

                                                <a href="shop-list-full.html">Shop List Full Width</a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li>

                                        <a href="wishlist.html">Wishlist</a>
                                    </li>
                                    <li>

                                        <a href="{{ route('frontend.checkout') }}">{{ __('frontend.checkout') }}</a>
                                    </li>
                                    <li>

                                        <a href="faq.html">FAQ</a>
                                    </li>
                                    <li>

                                        <a href="about.html">About us</a>
                                    </li>
                                    <li>

                                        <a href="contact.html">Contact</a>
                                    </li>
                                    <li>

                                        <a href="404.html">404</a>
                                    </li>
                                </ul>
                                <!--====== End - Dropdown ======-->
                            </li>
                            <li class="has-dropdown">

                                <a>BLOG<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                <!--====== Dropdown ======-->

                                <span class="js-menu-toggle"></span>
                                <ul style="width:200px">
                                    <li>

                                        <a href="blog-left-sidebar.html">Blog Left Sidebar</a>
                                    </li>
                                    <li>

                                        <a href="blog-right-sidebar.html">Blog Right Sidebar</a>
                                    </li>
                                    <li>

                                        <a href="blog-sidebar-none.html">Blog Sidebar None</a>
                                    </li>
                                    <li>

                                        <a href="blog-masonry.html">Blog Masonry</a>
                                    </li>
                                    <li>

                                        <a href="blog-detail.html">Blog Details</a>
                                    </li>
                                </ul>
                                <!--====== End - Dropdown ======-->
                            </li>
                            <li>

                                <a href="shop-side-version-2.html">VALUE OF THE DAY</a>
                            </li>
                            <li>

                                <a href="shop-side-version-2.html">GIFT CARDS</a>
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->


                <!--====== Dropdown Main plugin ======-->
                <div class="menu-init" id="navigation3">

                    <button class="btn btn--icon toggle-button toggle-button--secondary fas fa-shopping-bag toggle-button-shop" type="button"></button>

                    <span class="total-item-round">2</span>

                    <!--====== Menu ======-->
                    <div class="ah-lg-mode">

                        <span class="ah-close">✕ Close</span>

                        <!--====== List ======-->
                        <ul class="ah-list ah-list--design1 ah-list--link-color-white">
                            <li>
                                <a href="{{ route('frontend.home') }}"><i class="fas fa-home u-c-brand"></i></a>
                            </li>
                            <li>
                                <a href="wishlist.html"><i class="far fa-heart"></i></a>
                            </li>
                            <li class="has-dropdown">
                                <a class="mini-cart-shop-link"><i class="fas fa-shopping-bag"></i>
                                    <span class="total-item-round">{{ $cart_items->count() }}</span>
                                </a>
                                <!--====== Dropdown ======-->
                                <span class="js-menu-toggle"></span>
                                <div class="mini-cart">

                                    <!--====== Mini Product Container ======-->
                                    <div class="mini-product-container gl-scroll u-s-m-b-15">
                                        @php
                                            $sub_total = 0;
                                        @endphp
                                        @forelse ($cart_items as $cart_item)
                                            @php
                                                $sub_total = $sub_total + $cart_item->grand_total;
                                            @endphp
                                            <!--====== Card for mini cart ======-->
                                            <div class="card-mini-product">
                                                <div class="mini-product">
                                                    <div class="mini-product__image-wrapper">
                                                        <a class="mini-product__link" href="{{ route('frontend.product.detail', ['product' => $cart_item->product]) }}">
                                                            @if ($cart_item->product->getFirstMediaUrl('products', 'small'))
                                                                <img class="u-img-fluid" src="{{ $cart_item->product->getFirstMediaUrl('products', 'small') }}" alt="{{ $cart_item->product->name }}">
                                                            @else
                                                                <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt="">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="mini-product__info-wrapper">
                                                        <span class="mini-product__category">
                                                            <a href="{{ route('frontend.category.products', ['url' => $cart_item->product->category->url]) }}">
                                                                {{ $cart_item->product->category->name }}
                                                            </a>
                                                        </span>
                                                        <span class="mini-product__category">
                                                            <a href="javascript:;">{{ __('frontend.size') }} : {{ $cart_item->size }}</a>
                                                        </span>
                                                        <span class="mini-product__name">
                                                            <a href="{{ route('frontend.product.detail', ['product' => $cart_item->product]) }}">{{ $cart_item->product->name }}
                                                            </a>
                                                        </span>
                                                        <span class="mini-product__quantity">{{ $cart_item->qty }} x</span>
                                                        <span class="mini-product__price">${{ $cart_item->unit_price }}</span>
                                                    </div>
                                                </div>
                                                <a class="mini-product__delete-link far fa-trash-alt" wire:click='deleteItem({{ $cart_item->id }})'></a>
                                            </div>
                                            <!--====== End - Card for mini cart ======-->
                                        @empty
                                            <h5 class="text-center">{{ __('msgs.not_found') }}</h5>
                                        @endforelse

                                    </div>
                                    <!--====== End - Mini Product Container ======-->


                                    <!--====== Mini Product Statistics ======-->
                                    <div class="mini-product-stat">
                                        @if ($cart_items->count() > 0)
                                            <div class="mini-total">
                                                <span class="subtotal-text">{{ __('frontend.subtotal') }}</span>
                                                <span class="subtotal-value">${{ $sub_total }}</span>
                                            </div>
                                        @endif
                                        <div class="mini-action">
                                            @if ($cart_items->count() > 0)
                                                <a class="mini-link btn--e-brand-b-2" href="checkout.html">{{ __('frontend.proceed_to_checkout') }}</a>
                                            @endif
                                            <a class="mini-link btn--e-transparent-secondary-b-2" href="{{ route('frontend.cart.index') }}">{{ __('frontend.view_cart') }}</a>
                                        </div>
                                    </div>
                                    <!--====== End - Mini Product Statistics ======-->
                                </div>
                                <!--====== End - Dropdown ======-->
                            </li>
                        </ul>
                        <!--====== End - List ======-->
                    </div>
                    <!--====== End - Menu ======-->
                </div>
                <!--====== End - Dropdown Main plugin ======-->
            </div>
            <!--====== End - Secondary Nav ======-->
        </div>
    </nav>
    <!--====== End - Nav 2 ======-->
</header>
