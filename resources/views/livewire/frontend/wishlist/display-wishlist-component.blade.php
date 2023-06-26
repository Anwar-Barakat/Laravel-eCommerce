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
                                     <a href="javascript:;">{{ __('frontend.wishlist') }}</a>
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
                                 <h1 class="section__heading u-c-secondary">{{ __('frontend.wishlist') }}</h1>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <!--====== End - Section Intro ======-->


             <!--====== Section Content ======-->
             <div class="section__content">
                 <div class="container">
                     <div class="row">
                         <div class="col-lg-12 col-md-12 col-sm-12">

                             @forelse ($wishlist as $item)
                                 <div class="w-r u-s-m-b-30">
                                     <div class="w-r__container">
                                         <div class="w-r__wrap-1">
                                             <div class="w-r__img-wrap">
                                                 @if ($item->product->getFirstMediaUrl('products', 'small'))
                                                     <img class="u-img-fluid" src="{{ $item->product->getFirstMediaUrl('products', 'small') }}" alt="">
                                                 @else
                                                     <img class="u-img-fluid" src="{{ asset('frontend/dist/images/product/electronic/product3.jpg') }}" alt="">
                                                 @endif
                                             </div>
                                             <div class="w-r__info">
                                                 <span class="w-r__name">
                                                     <a href="{{ route('frontend.product.detail', ['product' => $item->product]) }}">{{ $item->product->name }}</a>
                                                 </span>
                                                 <span class="w-r__category">
                                                     <a href="{{ route('frontend.category.products', ['url' => $item->product->category->url]) }}">{{ $item->product->category->name }}</a>
                                                 </span>
                                             </div>
                                         </div>
                                         <div class="w-r__wrap-2">
                                             <a class="w-r__link btn--e-brand-b-2" href="{{ route('frontend.product.detail', ['product' => $item->product]) }}">VIEW</a>
                                             <a class="w-r__link btn--e-transparent-platinum-b-2" href="#" wire:click.prevent='removeFromWishlist({{ $item->product_id }})'>REMOVE</a>
                                         </div>
                                     </div>
                                 </div>
                         </div>
                         <div class="col-lg-12">
                             <div class="route-box">
                                 <div class="route-box__g">
                                     <a class="route-box__link" href="{{ route('frontend.shop') }}"><i class="fas fa-long-arrow-alt-left"></i>
                                         <span>{{ __('frontend.continue_shopping') }}</span>
                                     </a>
                                 </div>
                                 @if ($wishlist->count() > 0)
                                     <div class="route-box__g">
                                         <a class="route-box__link" href="" wire:click.prevent='removeAllWishlist'>
                                             <i class="fas fa-trash"></i>
                                             <span>CLEAR WISHLIST</span>
                                         </a>
                                     </div>
                                 @endif
                             </div>
                         </div>
                     @empty
                         <div class="empty">
                             <div class="empty__wrap">
                                 <span class="empty__big-text">EMPTY</span>
                                 <span class="empty__text-1">No items found on your wishlist.</span>
                                 <a class="empty__redirect-link btn--e-brand" href="{{ route('frontend.shop') }}">{{ __('frontend.continue_shopping') }}</a>
                             </div>
                         </div>
                         @endforelse
                     </div>
                 </div>
             </div>
             <!--====== End - Section Content ======-->
         </div>
         <!--====== End - Section 2 ======-->
     </div>
