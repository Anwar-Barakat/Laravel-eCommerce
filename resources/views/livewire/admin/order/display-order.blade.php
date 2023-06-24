 <div class="card">
     <div class="card-header d-flex align-items-center justify-content-between">
         <h3 class="card-title">{{ __('msgs.all', ['name' => __('order.orders')]) }}</h3>
     </div>
     <div class="card-body">
         <div id="table-default" class="table-responsive">
             <div class="row">
                 <div class="col-sm-12 col-md-4 col-lg-3">
                     <div class="mb-3">
                         <x-input-label class="form-label" :value="__('order.search_by_customer_name')" />
                         <x-text-input class="form-control" placeholder="{{ __('btns.search') }}" wire:model="name" />
                     </div>
                 </div>
                 <div class="col-sm-12 col-md-4 col-lg-2">
                     <div class="mb-3">
                         <x-input-label class="form-label" :value="__('msgs.order_by')" />
                         <select class="form-select" wire:model='order_by'>
                             <option value="">{{ __('btns.select') }}</option>
                             <option value="created_at">{{ __('order.order_date') }}</option>
                             <option value="grand_price">{{ __('frontend.grand_total') }}</option>
                         </select>
                     </div>
                 </div>
                 <div class="col-sm-12 col-md-4 col-lg-2">
                     <div class="mb-3">
                         <x-input-label class="form-label" :value="__('setting.status')" />
                         <select class="form-select" wire:model='status'>
                             <option value="">{{ __('btns.select') }}</option>
                             <option value="new">{{ __('order.new') }}</option>
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
             <table id="dataTables" class="table table-vcenter table-mobile-md card-table">
                 <thead>
                     <tr>
                         <th>#</th>
                         <th> {{ __('order.order_date') }}</th>
                         <th> {{ __('order.customer_name') }}</th>
                         <th> {{ __('order.customer_email') }}</th>
                         <th> {{ __('product.amount') }}</th>
                         <th> {{ __('order.payment_method') }}</th>
                         <th>{{ __('setting.status') }}</th>
                         <th></th>
                     </tr>
                 </thead>
                 <tbody class="table-tbody">
                     @forelse ($orders as $order)
                         <tr>
                             <td>{{ $order->id }}</td>
                             <td>{{ $order->created_at }}</td>
                             <td>{{ $order->user->full_name }}</td>
                             <td>{{ $order->user->email }}</td>
                             <td>{{ $order->grand_price }}</td>
                             <td>{{ $order->payment_method }}</td>
                             <td>
                                 <div>

                                     @php
                                         $status_color = '';
                                         switch ($order->status) {
                                             case 'new':
                                                 $status_color = 'bg-blue';
                                                 break;
                                             case 'cancelled':
                                                 $status_color = 'bg-red';
                                                 break;
                                             case 'shipped':
                                                 $status_color = 'bg-orange';
                                                 break;
                                             case 'paid':
                                                 $status_color = 'bg-green';
                                                 break;
                                             default:
                                                 $status_color = 'bg-gray';
                                                 break;
                                         }
                                     @endphp
                                     <button class="btn position-relative">
                                         {{ $order->status }}
                                         <span class="badge badge-notification badge-blink {{ $status_color }}"></span>
                                     </button>
                                 </div>
                             </td>
                             <td>
                                 <span class="dropdown">
                                     @php
                                         if (!$cancelled) {
                                             $edit = route('admin.orders.show', ['order' => $order]);
                                         } else {
                                             $edit = route('admin.cancelled-orders.show', ['cancelled_order' => $order]);
                                         }
                                     @endphp
                                     <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('btns.actions') }}</button>
                                     <div class="dropdown-menu">
                                         <a href="{{ $edit }}" class="dropdown-item d-flex align-items-center gap-1">
                                             <svg xmlns="http://www.w3.org/2000/svg" class="icon text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                 <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                 <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                 <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                 <path d="M16 5l3 3" />
                                             </svg>
                                             <span>{{ __('btns.details') }}</span>
                                         </a>
                                         @if ($order->status === 'shipped')
                                             <a href="{{ route('admin.orders.invoice', ['order' => $order]) }}" class="dropdown-item d-flex align-items-center gap-1">
                                                 <svg xmlns="http://www.w3.org/2000/svg" class="icon text-info" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                     <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                     <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                                     <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                                     <path d="M16 5l3 3" />
                                                 </svg>
                                                 <span>{{ __('dash.invoice') }}</span>
                                             </a>
                                         @endif
                                     </div>
                                 </span>
                             </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="8" class="border-bottom-0">
                                 <x-blank-section :url="'javascript:;'" :content="__('order.order')" />
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
             <div class="mt-3">
                 {{ $orders->links('pagination::bootstrap-5') }}
             </div>
         </div>
     </div>
     <div class="card-footer">
     </div>
 </div>
