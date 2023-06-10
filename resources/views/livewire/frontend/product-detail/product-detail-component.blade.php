 <div class="app-content">

     <!--====== Section 1 ======-->
     <div class="u-s-p-t-90">
         <div class="container">
             <div class="row">

                 @livewire('frontend.product-detail.product-detail-fixed-side', ['product' => $product])
                 <div class="col-lg-7">
                     <!--====== Product Right Side Details ======-->
                     <div class="pd-detail">
                         <div>
                             <span class="pd-detail__name">{{ $product->name }}</span>
                         </div>
                         <div>
                             <div class="pd-detail__inline">
                                 @php
                                     $dataPrices = App\Models\Product::applyDiscount($product->id, $product->price);
                                 @endphp
                                 @isset($dataPrices)
                                     @if ($dataPrices['discount'] > 0)
                                         <span class="pd-detail__price">${{ $dataPrices['final_price'] }}</span>
                                         <span class="pd-detail__discount">({{ $dataPrices['discount'] }}% OFF)</span><del class="pd-detail__del">${{ $dataPrices['original_price'] }}</del>
                                     @else
                                         <span class="pd-detail__price">${{ $product->price }}</span>
                                     @endif
                                 @endisset
                             </div>
                         </div>
                         <div class="u-s-m-b-15">
                             <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                 <span class="pd-detail__review u-s-m-l-4">
                                     <a data-click-scroll="#view-review">23 Reviews</a>
                                 </span>
                             </div>
                         </div>
                         <div class="u-s-m-b-15">
                             <div class="pd-detail__inline">
                                 @if ($total_stock > 0)
                                     <span class="pd-detail__stock">{{ __('frontend.in_stock') }}</span>
                                     <span class="pd-detail__left">{{ __('frontend.only') }} {{ $total_stock }} {{ __('frontend.left') }}</span>
                                 @else
                                     <span class="pd-detail__left">{{ __('frontend.out_of_stock') }}</span>
                                 @endif
                             </div>
                         </div>
                         <div class="u-s-m-b-15">
                             <span class="pd-detail__preview-desc">{{ Str::limit($product->description, 220, '...') }}</span>
                         </div>
                         <div class="u-s-m-b-15">
                             <div class="pd-detail__inline">
                                 <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>
                                     <a href="signin.html">Add to Wishlist</a>
                                     <span class="pd-detail__click-count">(222)</span>
                                 </span>
                             </div>
                         </div>
                         <div class="u-s-m-b-15">
                             <div class="pd-detail__inline">
                                 <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>
                                     <a href="signin.html">Email me When the price drops</a>
                                     <span class="pd-detail__click-count">(20)</span>
                                 </span>
                             </div>
                         </div>
                         <div class="u-s-m-b-15">
                             <ul class="pd-social-list">
                                 <li>

                                     <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                 </li>
                                 <li>

                                     <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                 </li>
                                 <li>

                                     <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                 </li>
                                 <li>

                                     <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a>
                                 </li>
                                 <li>

                                     <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                                 </li>
                             </ul>
                         </div>
                         <div class="u-s-m-b-15">
                             <form class="pd-detail__form">
                                 <div class="u-s-m-b-15">

                                     <span class="pd-detail__label u-s-m-b-8">Color:</span>
                                     <div class="pd-detail__color">
                                         <div class="color__radio">

                                             <input type="radio" id="jet" name="color" checked>

                                             <label class="color__radio-label" for="jet" style="background-color: #333333"></label>
                                         </div>
                                         <div class="color__radio">

                                             <input type="radio" id="folly" name="color">

                                             <label class="color__radio-label" for="folly" style="background-color: #FF0055"></label>
                                         </div>
                                         <div class="color__radio">

                                             <input type="radio" id="yellow" name="color">

                                             <label class="color__radio-label" for="yellow" style="background-color: #FFFF00"></label>
                                         </div>
                                         <div class="color__radio">

                                             <input type="radio" id="granite-gray" name="color">

                                             <label class="color__radio-label" for="granite-gray" style="background-color: #605F5E"></label>
                                         </div>
                                         <div class="color__radio">

                                             <input type="radio" id="space-cadet" name="color">

                                             <label class="color__radio-label" for="space-cadet" style="background-color: #1D3461"></label>
                                         </div>
                                     </div>
                                 </div>
                                 @if ($product->attributes->count() > 0)
                                     <div class="u-s-m-b-15">
                                         <span class="pd-detail__label u-s-m-b-8">{{ __('product.size') }}:</span>
                                         <div class="pd-detail__size">
                                             @foreach ($product->attributes as $key => $attr)
                                                 @if ($attr->stock > 0)
                                                     <div class="size__radio">
                                                         <input type="radio" id="{{ $attr->size }}" value="{{ $attr->size }}" name="size" wire:model='size'>
                                                         <label class="size__radio-label" for="{{ $attr->size }}">({{ $attr->stock }}) {{ $attr->size }}</label>
                                                     </div>
                                                 @endif
                                             @endforeach
                                         </div>
                                     </div>
                                 @endif
                                 <div class="pd-detail-inline-2">
                                     <div class="u-s-m-b-15">

                                         <!--====== Input Counter ======-->
                                         <div class="input-counter">

                                             <span class="input-counter__minus fas fa-minus"></span>

                                             <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                             <span class="input-counter__plus fas fa-plus"></span>
                                         </div>
                                         <!--====== End - Input Counter ======-->
                                     </div>
                                     <div class="u-s-m-b-15">

                                         <button class="btn btn--e-brand-b-2" type="submit">{{ __('frontend.add_to_card') }}</button>
                                     </div>
                                 </div>
                             </form>
                         </div>
                         <div class="u-s-m-b-15">

                             <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                             <ul class="pd-detail__policy-list">
                                 <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                     <span>Buyer Protection.</span>
                                 </li>
                                 <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                     <span>Full Refund if you don't receive your order.</span>
                                 </li>
                                 <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                     <span>Returns accepted if product not as described.</span>
                                 </li>
                             </ul>
                         </div>
                     </div>
                     <!--====== End - Product Right Side Details ======-->
                 </div>
             </div>
         </div>
     </div>

     <!--====== Product Detail Tab ======-->
     @livewire('frontend.product-detail.product-detail-tab-component', ['product' => $product])
     <!--====== End - Product Detail Tab ======-->


     <!--====== Similar Products ======-->
     @livewire('frontend.product-detail.product-detail-similar-product', ['product' => $product])
     <!--====== Similar Products ======-->


     <div class="u-s-p-b-90">
         <!--====== Section Intro ======-->
         <div class="section__intro u-s-m-b-46">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="section__text-wrap">
                             <h1 class="section__heading u-c-secondary u-s-m-b-12">CUSTOMER ALSO VIEWED</h1>

                             <span class="section__span u-c-grey">PRODUCTS THAT CUSTOMER VIEWED</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!--====== End - Section Intro ======-->


         <!--====== Section Content ======-->
         <div class="section__content">
             <div class="container">
                 <div class="slider-fouc">
                     <div class="owl-carousel product-slider" data-item="4">
                         <div class="u-s-m-b-30">
                             <div class="product-o product-o--hover-on">
                                 <div class="product-o__wrap">

                                     <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                         <img class="aspect__img" src="images/product/electronic/product1.jpg" alt=""></a>
                                     <div class="product-o__action-wrap">
                                         <ul class="product-o__action-list">
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                             </li>
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>

                                 <span class="product-o__category">

                                     <a href="shop-side-version-2.html">Electronics</a></span>

                                 <span class="product-o__name">

                                     <a href="product-detail.html">Beats Bomb Wireless Headphone</a></span>
                                 <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                     <span class="product-o__review">(20)</span>
                                 </div>

                                 <span class="product-o__price">$125.00

                                     <span class="product-o__discount">$160.00</span></span>
                             </div>
                         </div>
                         <div class="u-s-m-b-30">
                             <div class="product-o product-o--hover-on">
                                 <div class="product-o__wrap">

                                     <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                         <img class="aspect__img" src="images/product/electronic/product2.jpg" alt=""></a>
                                     <div class="product-o__action-wrap">
                                         <ul class="product-o__action-list">
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                             </li>
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>

                                 <span class="product-o__category">

                                     <a href="shop-side-version-2.html">Electronics</a></span>

                                 <span class="product-o__name">

                                     <a href="product-detail.html">Red Wireless Headphone</a></span>
                                 <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                     <span class="product-o__review">(20)</span>
                                 </div>

                                 <span class="product-o__price">$125.00

                                     <span class="product-o__discount">$160.00</span></span>
                             </div>
                         </div>
                         <div class="u-s-m-b-30">
                             <div class="product-o product-o--hover-on">
                                 <div class="product-o__wrap">

                                     <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                         <img class="aspect__img" src="images/product/electronic/product3.jpg" alt=""></a>
                                     <div class="product-o__action-wrap">
                                         <ul class="product-o__action-list">
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                             </li>
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>

                                 <span class="product-o__category">

                                     <a href="shop-side-version-2.html">Electronics</a></span>

                                 <span class="product-o__name">

                                     <a href="product-detail.html">Yellow Wireless Headphone</a></span>
                                 <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                     <span class="product-o__review">(20)</span>
                                 </div>

                                 <span class="product-o__price">$125.00

                                     <span class="product-o__discount">$160.00</span></span>
                             </div>
                         </div>
                         <div class="u-s-m-b-30">
                             <div class="product-o product-o--hover-on">
                                 <div class="product-o__wrap">

                                     <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                         <img class="aspect__img" src="images/product/electronic/product23.jpg" alt=""></a>
                                     <div class="product-o__action-wrap">
                                         <ul class="product-o__action-list">
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                             </li>
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>

                                 <span class="product-o__category">

                                     <a href="shop-side-version-2.html">Electronics</a></span>

                                 <span class="product-o__name">

                                     <a href="product-detail.html">Razor Gear Ultra Slim 8GB Ram</a></span>
                                 <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                     <span class="product-o__review">(20)</span>
                                 </div>

                                 <span class="product-o__price">$125.00

                                     <span class="product-o__discount">$160.00</span></span>
                             </div>
                         </div>
                         <div class="u-s-m-b-30">
                             <div class="product-o product-o--hover-on">
                                 <div class="product-o__wrap">

                                     <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                         <img class="aspect__img" src="images/product/electronic/product26.jpg" alt=""></a>
                                     <div class="product-o__action-wrap">
                                         <ul class="product-o__action-list">
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                             </li>
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>

                                 <span class="product-o__category">

                                     <a href="shop-side-version-2.html">Electronics</a></span>

                                 <span class="product-o__name">

                                     <a href="product-detail.html">Razor Gear Ultra Slim 12GB Ram</a></span>
                                 <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                     <span class="product-o__review">(20)</span>
                                 </div>

                                 <span class="product-o__price">$125.00

                                     <span class="product-o__discount">$160.00</span></span>
                             </div>
                         </div>
                         <div class="u-s-m-b-30">
                             <div class="product-o product-o--hover-on">
                                 <div class="product-o__wrap">

                                     <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">

                                         <img class="aspect__img" src="images/product/electronic/product30.jpg" alt=""></a>
                                     <div class="product-o__action-wrap">
                                         <ul class="product-o__action-list">
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a>
                                             </li>
                                             <li>

                                                 <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a>
                                             </li>
                                             <li>

                                                 <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a>
                                             </li>
                                         </ul>
                                     </div>
                                 </div>

                                 <span class="product-o__category">

                                     <a href="shop-side-version-2.html">Electronics</a></span>

                                 <span class="product-o__name">

                                     <a href="product-detail.html">Razor Gear Ultra Slim 16GB Ram</a></span>
                                 <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>

                                     <span class="product-o__review">(20)</span>
                                 </div>

                                 <span class="product-o__price">$125.00

                                     <span class="product-o__discount">$160.00</span></span>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!--====== End - Section Content ======-->
     </div>
     <!--====== End - Section 1 ======-->
 </div>
