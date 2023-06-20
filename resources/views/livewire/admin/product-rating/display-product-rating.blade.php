 <div class="card">
     <div class="card-header d-flex align-items-center justify-content-between">
         <h3 class="card-title">{{ __('msgs.all', ['name' => __('product.products_rating')]) }}</h3>
     </div>
     <div class="card-body">
         <div class="row">
             <div class="col-sm-12 col-md-4 col-lg-2">
                 <div class="mb-3">
                     <x-input-label class="form-label" :value="__('msgs.search_by_product_name')" />
                     <x-text-input class="form-control" placeholder="{{ __('btns.search') }}" wire:model="name" />
                 </div>
             </div>
             <div class="col-sm-12 col-md-4 col-lg-2">
                 <div class="mb-3">
                     <x-input-label class="form-label" :value="__('product.rating')" />
                     <select class="form-select" wire:model='rating'>
                         <option value="">{{ __('btns.select') }}</option>
                         <option value="1">{{ __('product.one_star') }}</option>
                         <option value="2">{{ __('product.two_star') }}</option>
                         <option value="3">{{ __('product.three_star') }}</option>
                         <option value="4">{{ __('product.four_star') }}</option>
                         <option value="5">{{ __('product.five_star') }}</option>
                     </select>
                 </div>
             </div>
             <div class="col-sm-12 col-md-4 col-lg-2">
                 <div class="mb-3">
                     <x-input-label class="form-label" :value="__('msgs.order_by')" />
                     <select class="form-select" wire:model='order_by'>
                         <option value="">{{ __('btns.select') }}</option>
                         <option value="name">{{ __('product.rating') }}</option>
                         <option value="created_at">{{ __('msgs.created_at') }}</option>
                     </select>
                 </div>
             </div>
             <div class="col-sm-12 col-md-4 col-lg-2">
                 <div class="mb-3">
                     <x-input-label class="form-label" :value="__('msgs.per_page')" />
                     <select class="form-select" wire:model='per_page'>
                         <option value="">{{ __('btns.select') }}</option>
                         <option value="5">5</option>
                         <option value="10">10</option>
                         <option value="15">15</option>
                     </select>
                 </div>
             </div>
             <div class="col-sm-12 col-md-4 col-lg-2">
                 <div class="mb-3">
                     <x-input-label class="form-label" :value="__('msgs.sort_by')" />
                     <select class="form-select" wire:model='sort_by'>
                         <option value="">{{ __('btns.select') }}</option>
                         <option value="asc">{{ __('msgs.asc') }}</option>
                         <option value="desc">{{ __('msgs.desc') }}</option>
                     </select>
                     <x-input-error :messages="$errors->get('is_active')" class="mt-2" />
                 </div>
             </div>
         </div>
         <br>
         <div id="table-default" class="table-responsive">
             <table id="dataTables" class="table table-vcenter table-mobile-md card-table">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th> {{ __('product.product_name') }}</th>
                         <th> {{ __('product.product_name') }}</th>
                         <th> {{ __('order.customer_name') }}</th>
                         <th> {{ __('auth.email') }}</th>
                         <th> {{ __('product.rating') }}</th>
                         <th> {{ __('product.review') }}</th>
                         <th> {{ __('setting.status') }}</th>
                         <th> {{ __('msgs.created_at') }}</th>
                     </tr>
                 </thead>
                 <tbody class="table-tbody">
                     @forelse ($reviews as $review)
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $review->product->name }}</td>
                             <td>{{ $review->user->full_name }}</td>
                             <td>{{ $review->user->email }}</td>
                             <td>
                                 @for ($i = 1; $i <= $review->rating; $i++)
                                     <span class="text-yellow">
                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                             <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor"></path>
                                         </svg>
                                     </span>
                                 @endfor

                                 @if ($review->rating - floor($review->rating) > 0)
                                     <span class="text-yellow">
                                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-half-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                             <path
                                                 d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                                 stroke-width="0" fill="currentColor"></path>
                                         </svg>
                                     </span>
                                 @endif
                             </td>
                             <td>
                                 <button type="button" class="btn btn-sm" data-bs-placement="top" data-bs-toggle="popover" title="{{ __('product.review') }}" data-bs-content="{{ $review->review }}">{{ __('btns.click_here') }}</button>
                             </td>
                             <td>
                                 <div>
                                     <button wire:click='updateStatus({{ $review }})' class="btn position-relative">
                                         {{ $review->is_active ? __('msgs.active') : __('msgs.not_active') }}
                                         <span class="badge {{ $review->is_active ? 'bg-green' : 'bg-red' }} badge-notification badge-blink"></span>
                                     </button>
                                 </div>
                             </td>
                             <td> {{ $review->user->created_at }} </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="7" class="border-bottom-0">
                                 <x-blank-section :url="'javascript:;'" :content="__('frontend.product_rating')" />
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
             <div class="mt-3">
                 {{ $reviews->links('pagination::bootstrap-5') }}
             </div>
         </div>
     </div>
     <div class="card-footer">
     </div>
 </div>
