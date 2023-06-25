 <div class="card">
     <div class="card-header d-flex align-items-center justify-content-between">
         <h3 class="card-title">{{ __('msgs.all', ['name' => __('order.returned_orders')]) }}</h3>
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
                             <option value="created_at">{{ __('order.returned_date') }}</option>
                         </select>
                     </div>
                 </div>
                 <div class="col-sm-12 col-md-4 col-lg-2">
                     <div class="mb-3">
                         <x-input-label class="form-label" :value="__('setting.status')" />
                         <select class="form-select" wire:model='status'>
                             <option value="">{{ __('btns.select') }}</option>
                             <option value="pending">{{ __('order.pending') }}</option>
                             <option value="approved">{{ __('order.approved') }}</option>
                             <option value="rejected">{{ __('order.rejected') }}</option>
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
                         <th>{{ __('order.returned_date') }}</th>
                         <th>{{ __('order.order_number') }}</th>
                         <th>{{ __('order.customer_name') }}</th>
                         <th>{{ __('product.product_name') }}</th>
                         <th>{{ __('product.size') }}</th>
                         <th>{{ __('order.comment') }}</th>
                         <th>{{ __('order.return_reason') }}</th>
                         <th>{{ __('setting.status') }}</th>
                         <th class="w-5"></th>
                     </tr>
                 </thead>
                 <tbody class="table-tbody">
                     @forelse ($returnedOrders as $request)
                         <tr>
                             <td>{{ $request->id }}</td>
                             <td>{{ $request->created_at }}</td>
                             <td>
                                 <span class="badge bg-blue-lt">
                                     <a href="{{ route('admin.orders.show', ['order' => $request->order]) }}">{{ $request->order_id }}</a>
                                 </span>
                             </td>
                             <td>{{ $request->user->full_name }}</td>
                             <td>{{ $request->product->name }}</td>
                             <td>{{ $request->product_size }}</td>
                             <td>
                                 <button type="button" class="btn btn-sm" data-bs-placement="top" data-bs-toggle="popover" title="{{ __('order.comment') }}" data-bs-content="{{ $request->comment }}">{{ __('btns.click_here') }}</button>
                             </td>
                             <td>
                                 <button type="button" class="btn btn-sm" data-bs-placement="top" data-bs-toggle="popover" title="{{ __('order.return_reason') }}" data-bs-content="{{ __('frontend.' . App\Models\OrderLog::RETURNREASON[$request->reason]) }}">{{ __('btns.click_here') }}</button>
                             </td>
                             <td>
                                 <div>
                                     <button class="btn position-relative cursor-not-allowed">
                                         {{ __('order.' . $request->status) }}
                                         <span class="badge badge-notification badge-blink {{ $request->status == 'approved' ? 'bg-green' : 'bg-red' }}"></span>
                                     </button>
                                 </div>
                             </td>
                             <td>
                                 <a href="" class="btn" data-bs-toggle="modal" data-bs-target="#return-request-{{ $request->id }}">
                                     <svg xmlns="http://www.w3.org/2000/svg" class="icon text-success" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                         <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                         <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" />
                                         <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" />
                                         <path d="M16 5l3 3" />
                                     </svg>
                                 </a>

                             </td>
                             <div class="modal modal-blur fade" id="return-request-{{ $request->id }}" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self=''>
                                 <div class="modal-dialog modal-dialog-centered" role="document">
                                     <div class="modal-content">
                                         <form wire:submit.prevent='changeStatus({{ $request }})'>
                                             <div class="card">
                                                 <div class=" card-header">
                                                     <h5 class="modal-title">{{ __('order.returned_orders') }}</h5>
                                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                 </div>
                                                 <div class=" card-body">
                                                     <select class=" form-select" wire:model='returnStatus'>
                                                         <option value="">{{ __('btns.select') }}</option>
                                                         <option value="pending">{{ __('order.pending') }}</option>
                                                         <option value="approved">{{ __('order.approved') }}</option>
                                                         <option value="rejected">{{ __('order.rejected') }}</option>
                                                     </select>
                                                     <x-input-error :messages="$errors->get('returnStatus')" class="mt-2" />
                                                 </div>
                                                 <div class=" card-footer flex justify-between items-center">
                                                     <button type="button" class="btn me-auto" data-bs-dismiss="modal">{{ __('btns.close') }}</button>
                                                     <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">{{ __('btns.update') }}</button>
                                                 </div>
                                             </div>
                                         </form>
                                     </div>
                                 </div>
                             </div>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="10" class="border-bottom-0">
                                 <x-blank-section :url="'javascript:;'" :content="__('order.order')" />
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
             <div class="mt-3">
                 {{ $returnedOrders->links('pagination::bootstrap-5') }}
             </div>
         </div>
     </div>
     <div class="card-footer">
     </div>
 </div>
