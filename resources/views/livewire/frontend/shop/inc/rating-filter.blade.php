 <div class="u-s-m-b-30">
     <div class="shop-w">
         <div class="shop-w__intro-wrap">
             <h1 class="shop-w__h">{{ __('frontend.rating') }}</h1>
             <span class="fas fa-minus shop-w__toggle" data-target="#s-rating" data-toggle="collapse"></span>
         </div>

         <div class="shop-w__wrap show" id="s-rating">
             <ul class="shop-w__list gl-scroll">
                 @php
                     $total = 6;
                 @endphp
                 @for ($i = 1; $i <= 5; $i++)
                     <li wire:key='rating-{{ $i }}'>
                         <div class="rating__check">
                             <input type="checkbox" value="{{ $total - $i }}" wire:model='rating' name="rating">
                             <div class="rating__check-star-wrap">
                                 @for ($j = 1; $j <= $total - $i; $j++)
                                     <i class="fas fa-star"></i>
                                 @endfor
                                 @if ($total - $j > 0)
                                     @for ($k = 1; $k <= $total - $j; $k++)
                                         <i class="far fa-star"></i>
                                     @endfor
                                 @endif
                             </div>
                         </div>
                         <span class="shop-w__total-text">({{ App\Models\ProductRating::where('rating', $total - $i)->count() ?? 0 }})</span>
                     </li>
                 @endfor
             </ul>
         </div>
     </div>
 </div>
