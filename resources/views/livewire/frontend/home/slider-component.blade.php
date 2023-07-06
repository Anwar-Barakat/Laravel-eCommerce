 <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-grey u-s-m-b-60" style="overflow: initial !important;">
     <div class="owl-carousel primary-style-1" id="hero-slider">
         @foreach ($banners as $banner)
             <div class="hero-slide">
                 @if ($banner->getFirstMediaUrl('banners', 'thumb'))
                     <img src="{{ $banner->getFirstMediaUrl('banners', 'thumb') }}" alt="{{ $banner->title }}" class="u-s-m-t-100">
                 @endif
             </div>
         @endforeach
     </div>
 </div>
