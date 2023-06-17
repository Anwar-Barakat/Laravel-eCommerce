 <div class="col-lg-9 col-md-12">
     <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
         <div class="dash__pad-2">
             <h1 class="dash__h1 u-s-m-b-14">{{ __('frontend.my_orders') }}</h1>
             <span class="dash__text u-s-m-b-30">Here you can see all products that have been delivered.</span>
             <form class="m-order u-s-m-b-30">
                 <div class="m-order__select-wrapper">
                     <label class="u-s-m-r-8" for="my-order-sort">Show:</label>
                     <select class="select-box select-box--primary-style" id="my-order-sort" wire:model='per_page'>
                         <option value="5">Last 5 orders</option>
                         <option value="15">Last 15 Orders</option>
                         <option value="30">Last 30 Orders</option>
                         <option value="50">Last 50 Orders</option>
                     </select>
                 </div>
             </form>
             <div class="m-order__list">
                 @foreach ($orders as $order)
                     <div class="m-order__get">
                         <div class="manage-o__header u-s-m-b-30">
                             <div class="dash-l-r">
                                 <div>
                                     <div class="manage-o__text-2 u-c-secondary">Order #{{ $order->id }}</div>
                                     <div class="manage-o__text u-c-silver">Placed on : {{ $order->created_at }}</div>
                                 </div>
                                 <div class="flex flex-col items-center gap-2">
                                     <div class="dash__link dash__link--brand">
                                         <a href="{{ route('frontend.orders.show', ['order' => $order]) }}">MANAGE</a>
                                     </div>
                                     <div>
                                         <span class="manage-o__badge badge--processing">Processing</span>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         @foreach ($order->order_products as $ele)
                             <div class="manage-o__description">
                                 <div class="description__container">
                                     <div class="description__img-wrap">
                                         @if ($ele->product->getFirstMediaUrl('products', 'thumb'))
                                             <img class="u-img-fluid" src="{{ $ele->product->getFirstMediaUrl('products', 'thumb') }}" alt="{{ $ele->product->name }}">
                                         @else
                                             <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt="{{ $ele->product->name }}">
                                         @endif
                                     </div>
                                     <div class="description-title">{{ $ele->product->name }}</div>
                                 </div>
                                 <div class="description__info-wrap">

                                     <div>
                                         <span class="manage-o__text-2 u-c-silver">Quantity:
                                             <span class="manage-o__text-2 u-c-secondary">{{ $ele->qty }}</span>
                                         </span>
                                     </div>
                                     <div>
                                         <span class="manage-o__text-2 u-c-silver">Total:
                                             <span class="manage-o__text-2 u-c-secondary">${{ $ele->grand_price }}</span></span>
                                     </div>
                                 </div>
                             </div>
                             <br>
                         @endforeach
                     </div>
                 @endforeach

                 <div class="flex justify-between">
                     {{ $orders->links('pagination::tailwind') }}
                 </div>
             </div>
         </div>
     </div>
 </div>
