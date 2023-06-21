 <div class="u-s-m-b-30">
     <div class="shop-w">
         <div class="shop-w__intro-wrap">
             <h1 class="shop-w__h">{{ __('frontend.brands') }}</h1>
             <span class="fas fa-minus shop-w__toggle" data-target="#s-color" data-toggle="collapse"></span>
         </div>
         <div class="shop-w__wrap show" id="s-color">
             <ul class="shop-w__list gl-scroll">
                 @foreach (App\Models\Brand::active()->get() as $brand)
                     <li>
                         <div class="check-box">
                             <input type="checkbox" id="brand-{{ $brand->id }}" value="{{ $brand->id }}" wire:model='selectedBrands'>
                             <div class="check-box__state check-box__state--primary">
                                 <label class="check-box__label" for="brand-{{ $brand->id }}">{{ $brand->name }}</label>
                             </div>
                         </div>
                     </li>
                 @endforeach
             </ul>
         </div>
     </div>
 </div>
