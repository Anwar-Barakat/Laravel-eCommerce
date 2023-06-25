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
                             <div class="pd-detail__inline" wire:ignore.self=''>
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
                             <div class="pd-detail__rating gl-rating-style">
                                 @php
                                     $reviews_count = $reviews->count();
                                     $reviews_avg = $reviews_count ? $reviews->sum('rating') / $reviews_count : 0;
                                 @endphp
                                 @for ($i = 1; $i <= $reviews_avg; $i++)
                                     <i class="fas fa-star"></i>
                                 @endfor
                                 @if ($reviews_avg - floor($reviews_avg) > 0)
                                     <i class="fas fa-star-half-alt"></i>
                                 @endif
                                 <span class="pd-detail__review u-s-m-l-4">
                                     <a data-click-scroll="#view-review">{{ $reviews->count() ?? 0 }} {{ __('frontend.reviews') }}</a>
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
                                 <span class="pd-detail__click-wrap" wire:click.prevent='addToWishlist({{ $product->id }})'>
                                     <i class="far fa-heart u-s-m-r-6 {{ auth()->check()? (auth()->user()->wishlists->where('product_id', $product->id)->count() > 0? 'text-red-600': ''): '' }}"></i>
                                     <a href="signin.html">Add to Wishlist</a>
                                     <span class="pd-detail__click-count">({{ auth()->user()->wishlists->where('product_id', $product->id)->count() ?? 0 }})</span>
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
                             <form class="pd-detail__form" wire:submit.prevent='addToCard'>
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
                                 @include('layouts.inc.errors-message')
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

                                 @if ($product->attributes->count() > 0)
                                     <div class="pd-detail-inline-2">
                                         <div class="u-s-m-b-15">
                                             <!--====== Input Counter ======-->
                                             <div class="input-counter">
                                                 <span class="input-counter__minus fas fa-minus cursor-pointer" wire:click="decreaseQty()"></span>
                                                 <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="100" wire:model='qty'>
                                                 <span class="input-counter__plus fas fa-plus cursor-pointer" wire:click="increaseQty()"></span>
                                             </div>
                                             <!--====== End - Input Counter ======-->
                                         </div>
                                         <div class="u-s-m-b-15">
                                             <button class="btn dash__custom-link btn--e-transparent-hover-brand-b-2" type="submit" wire:click.prevent="addToCard()">{{ __('frontend.add_to_card') }}</button>
                                         </div>
                                     </div>
                                 @endif
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

     <!--====== Recently Viewed Products ======-->
     @livewire('frontend.product-detail.product-detail-recent-viewed', ['product' => $product])
     <!--====== Recently Viewed Products ======-->
 </div>
