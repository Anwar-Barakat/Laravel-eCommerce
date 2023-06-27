 <div class="card card-stacked">
     <div class="card-body p-4 text-center">
         @if ($product->created_at->diffInMonths() < 1)
             <div class="ribbon bg-yellow">{{ __('product.new') }}</div>
         @elseif ($product->discount > 0 || $product->category->discount > 0)
             <div class="ribbon bg-red-lt" App::getLocale()=='ar' ? style="direction: ltr" : ''>
                 @if ($product->discount > 0)
                     -{{ $product->discount_type == 0 ? '%' : '' }}
                     {{ $product->discount }}
                 @else
                     -%{{ $product->category->discount }}
                 @endif
             </div>
         @endif
         <span class="avatar avatar-xl mb-3 rounded" style="background-image: url(./static/avatars/000m.jpg)">
             @if ($product->getFirstMediaUrl('products', 'thumb'))
                 <img src="{{ $product->getFirstMediaUrl('products') }}" class="img img-thumbnail" alt="{{ $product->name }}">
             @else
                 <img src="{{ asset('backend/static/square-default-image.jpeg') }}" class="img img-thumbnail" alt="{{ $product->name }}">
             @endif
         </span>
         <h3 class="m-0 mb-1">
             <a href="{{ route('admin.products.edit', ['product' => $product]) }}" title="{{ $product->name }}">{{ Str::limit($product->name, 25, '...') }}</a>
         </h3>
         <div class="text-muted">
             @php
                 $dataPrices = App\Models\Product::applyDiscount($product->id, $product->price);
             @endphp
             <h5 class="mt-2 d-flex justify-content-center gap-2">
                 @isset($dataPrices)
                     @if ($dataPrices['discount'] > 0)
                         <span class="font-weight-bold text-green">${{ $dataPrices['final_price'] }}</span>
                         <span class="text-secondary font-weight-normal text-decoration-line-through text-red">${{ $dataPrices['original_price'] }}</span>
                     @else
                         ${{ $product->price }}
                     @endif
                 @endisset
             </h5>
         </div>
         <div class="mt-3">
             <span class="badge bg-purple-lt">{{ $product->brand->name }}</span>
         </div>
     </div>
     <div class="d-flex">
         <a href="{{ route('admin.product.attachments.create', ['product' => $product]) }}" class="card-btn flex items-center gap-1">
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-paperclip" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                 <path d="M15 7l-6.5 6.5a1.5 1.5 0 0 0 3 3l6.5 -6.5a3 3 0 0 0 -6 -6l-6.5 6.5a4.5 4.5 0 0 0 9 9l6.5 -6.5"></path>
             </svg>
             {{ __('product.attachments') }}
         </a>
         <a href="{{ route('admin.product.attributes.create', ['product' => $product]) }}" class="card-btn flex items-center gap-1">
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tag" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                 <circle cx="8.5" cy="8.5" r="1" fill="currentColor"></circle>
                 <path d="M4 7v3.859c0 .537 .213 1.052 .593 1.432l8.116 8.116a2.025 2.025 0 0 0 2.864 0l4.834 -4.834a2.025 2.025 0 0 0 0 -2.864l-8.117 -8.116a2.025 2.025 0 0 0 -1.431 -.593h-3.859a3 3 0 0 0 -3 3z"></path>
             </svg>
             {{ __('product.attribites') }}
         </a>
     </div>
     <div class="d-flex">
         <a href="{{ route('admin.product.filters.create', ['product' => $product]) }}" class="card-btn flex items-center gap-1">
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tag" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.25" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                 <circle cx="8.5" cy="8.5" r="1" fill="currentColor"></circle>
                 <path d="M4 7v3.859c0 .537 .213 1.052 .593 1.432l8.116 8.116a2.025 2.025 0 0 0 2.864 0l4.834 -4.834a2.025 2.025 0 0 0 0 -2.864l-8.117 -8.116a2.025 2.025 0 0 0 -1.431 -.593h-3.859a3 3 0 0 0 -3 3z"></path>
             </svg>
             {{ __('product.filters') }}
         </a>
         <a href="{{ route('admin.products.colors', ['product' => $product]) }}" class="card-btn flex items-center gap-1">
             <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-palette" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                 <path d="M12 21a9 9 0 0 1 0 -18c4.97 0 9 3.582 9 8c0 1.06 -.474 2.078 -1.318 2.828c-.844 .75 -1.989 1.172 -3.182 1.172h-2.5a2 2 0 0 0 -1 3.75a1.3 1.3 0 0 1 -1 2.25"></path>
                 <path d="M8.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                 <path d="M12.5 7.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                 <path d="M16.5 10.5m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
             </svg>
             {{ __('product.colors') }}
         </a>
     </div>
     <div class="progress progress-sm card-progress">
         <div class="progress-bar" style="width: 38%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100" aria-label="38% Complete">
             <span class="visually-hidden">38% Complete</span>
         </div>
     </div>
 </div>
