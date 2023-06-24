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
                         <th></th>
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
                                 <div>
                                     <select class=" form-select" wire:model='returnStatus'>
                                         <option value="pending" {{ $request->status == 'pending' ? 'selected' : '' }}>{{ __('order.pending') }}</option>
                                         <option value="approved" {{ $request->status == 'approved' ? 'selected' : '' }}>{{ __('order.approved') }}</option>
                                         <option value="rejected" {{ $request->status == 'rejected' ? 'selected' : '' }}>{{ __('order.rejected') }}</option>
                                     </select>
                                 </div>
                             </td>
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
