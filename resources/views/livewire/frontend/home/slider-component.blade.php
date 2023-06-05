 <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey">
     <div class="owl-carousel primary-style-1" id="hero-slider">
         @foreach ($banners as $banner)
             <div class="hero-slide">
                 @if ($banner->getFirstMediaUrl('banners', 'thumb'))
                     <img src="{{ $banner->getFirstMediaUrl('banners', 'thumb') }}" alt="{{ $banner->title }}" class="absolute opacity-50">
                 @endif
                 <div class="container">
                     <div class="row">
                         <div class="col-12">
                             <div class="slider-content slider-content--animation">
                                 <span class="content-span-1 u-c-secondary">{{ $banner->title }}</span>
                                 <span class="content-span-2 u-c-secondary">30% Off On Electronics</span>
                                 <span class="content-span-3 u-c-secondary text-lg">Find {{ $banner->title }} on best prices, Also Discover most selling products of {{ $banner->title }}</span>
                                 <span class="content-span-4 u-c-secondary">Starting At
                                     <span class="u-c-brand">$1050.00</span></span>
                                 <a class="shop-now-link btn--e-brand" href="{{ $banner->link }}">{{ __('frontend.shop_now') }}</a>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         @endforeach
     </div>
 </div>
