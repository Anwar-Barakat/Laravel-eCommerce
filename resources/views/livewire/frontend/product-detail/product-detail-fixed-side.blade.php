 <div class="col-lg-5">
     <!--====== Product Breadcrumb ======-->
     <div class="pd-breadcrumb u-s-m-b-30">
         <ul class="pd-breadcrumb__list">
             <li class="has-separator">
                 <a href="{{ route('frontend.home') }}">{{ __('frontend.home') }}</a>
             </li>
             @if ($product->category->parent_id == 0)
                 <li class="is-marked">
                     <a href="{{ route('frontend.category.products', ['url' => $product->category->url]) }}">
                         {{ $product->category->name }}
                     </a>
                 </li>
             @else
                 <li class="has-separator">
                     <a href="{{ route('frontend.category.products', ['url' => $product->category->parentCategory->url]) }}">
                         {{ $product->category->parentCategory->name }}
                     </a>
                 </li>
                 <li class="is-marked">
                     <a href="javascript:;">
                         {{ $product->category->name }}
                     </a>
                 </li>
             @endif
         </ul>
     </div>
     <!--====== End - Product Breadcrumb ======-->
     <!--====== Product Detail Zoom ======-->
     <div class="pd u-s-m-b-30">
         <div class="slider-fouc pd-wrap">
             <div id="pd-o-initiate">
                 @if ($product->getFirstMediaUrl('products', 'large'))
                     <div class="pd-o-img-wrap" data-src="{{ $product->getFirstMediaUrl('products', 'large') }}">
                         <img class="u-img-fluid" src="{{ $product->getFirstMediaUrl('products', 'large') }}" data-zoom-image="{{ $product->getFirstMediaUrl('products', 'large') }}" alt="">
                     </div>
                 @else
                     <div class="pd-o-img-wrap" data-src="{{ asset('frontend/dist/images/product/square-default-image.jpeg') }}">
                         <img class="u-img-fluid" src="{{ asset('frontend/dist/images/product/square-default-image.jpeg') }}" data-zoom-image="{{ asset('frontend/dist/images/product/square-default-image.jpeg') }}" alt="">
                     </div>
                 @endif

                 @foreach ($product->getMedia('product_attachments') as $key => $attachment)
                     <div class="pd-o-img-wrap" data-src="{{ $attachment->getUrl('large') }}">
                         <img class="u-img-fluid" src="{{ $attachment->getUrl('large') }}" data-zoom-image="{{ $attachment->getUrl('large') }}" alt="">
                     </div>
                 @endforeach
             </div>
         </div>
         <div class="u-s-m-t-15">
             <div class="slider-fouc">
                 <div id="pd-o-thumbnail">
                     @if ($product->getFirstMediaUrl('products', 'small'))
                         <div>
                             <img class="u-img-fluid" alt="{{ $product->getFirstMediaUrl('products', 'small') }}" src="{{ $product->getFirstMediaUrl('products', 'medium') }}">
                         </div>
                     @endif
                     @foreach ($product->getMedia('product_attachments') as $key => $attachment)
                         <div>
                             <img class="u-img-fluid" alt="{{ $attachment->getUrl('small') }}" src="{{ $attachment->getUrl('small') }}">
                         </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </div>
