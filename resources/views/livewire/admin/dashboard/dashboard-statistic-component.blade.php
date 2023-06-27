   <div class="row row-deck row-cards">
       <div class="col-sm-6 col-lg-4">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div class="subheader">{{ __('order.new_orders') }}</div>
                       <div class="ms-auto lh-1">
                           <div class="dropdown">
                               <select class="form-select border-0" id="" wire:model='new_filter'>
                                   <option value="1">{{ __('dash.last_7_days') }}</option>
                                   <option value="2">{{ __('dash.last_month') }}</option>
                                   <option value="3">{{ __('dash.last_3_months') }}</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="h1 mb-3">{{ $new_orders['percent'] ?? 0 }}%</div>
                   <div class="d-flex mb-2">
                       <div>{{ __('order.total_prices') }}</div>
                       <div class="ms-auto">
                           <span class="text-green d-inline-flex align-items-center lh-1">
                               ${{ $new_orders['value'] ?? 0 }}
                           </span>
                       </div>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-primary" style="width: {{ $new_orders['percent'] ?? 0 }}%" role="progressbar" aria-valuenow="{{ $new_orders['percent'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $new_orders['percent'] ?? 0 }}% Complete">
                           <span class="visually-hidden">{{ $new_orders['percent'] ?? 0 }}% Complete</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-sm-6 col-lg-4">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div class="subheader">{{ __('order.pending_orders') }}</div>
                       <div class="ms-auto lh-1">
                           <div class="dropdown">
                               <select class="form-select border-0" id="" wire:model='pending_filter'>
                                   <option value="1">{{ __('dash.last_7_days') }}</option>
                                   <option value="2">{{ __('dash.last_month') }}</option>
                                   <option value="3">{{ __('dash.last_3_months') }}</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="h1 mb-3">{{ $pending_orders['percent'] ?? 0 }}%</div>
                   <div class="d-flex mb-2">
                       <div>{{ __('order.total_prices') }}</div>
                       <div class="ms-auto">
                           <span class="text-green d-inline-flex align-items-center lh-1">
                               ${{ $pending_orders['value'] ?? 0 }}
                           </span>
                       </div>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-primary" style="width: {{ $pending_orders['percent'] ?? 0 }}%" role="progressbar" aria-valuenow="{{ $pending_orders['percent'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $pending_orders['percent'] ?? 0 }}% Complete">
                           <span class="visually-hidden">{{ $pending_orders['percent'] ?? 0 }}% Complete</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-sm-6 col-lg-4">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div class="subheader">{{ __('order.in_process_orders') }}</div>
                       <div class="ms-auto lh-1">
                           <div class="dropdown">
                               <select class="form-select border-0" id="" wire:model='in_process_filter'>
                                   <option value="1">{{ __('dash.last_7_days') }}</option>
                                   <option value="2">{{ __('dash.last_month') }}</option>
                                   <option value="3">{{ __('dash.last_3_months') }}</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="h1 mb-3">{{ $in_process_orders['percent'] ?? 0 }}%</div>
                   <div class="d-flex mb-2">
                       <div>{{ __('order.total_prices') }}</div>
                       <div class="ms-auto">
                           <span class="text-green d-inline-flex align-items-center lh-1">
                               ${{ $in_process_orders['value'] ?? 0 }}
                           </span>
                       </div>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-primary" style="width: {{ $in_process_orders['percent'] ?? 0 }}%" role="progressbar" aria-valuenow="{{ $in_process_orders['percent'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $in_process_orders['percent'] ?? 0 }}% Complete">
                           <span class="visually-hidden">{{ $in_process_orders['percent'] ?? 0 }}% Complete</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-sm-6 col-lg-4">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div class="subheader">{{ __('order.shipped_orders') }}</div>
                       <div class="ms-auto lh-1">
                           <div class="dropdown">
                               <select class="form-select border-0" id="" wire:model='shipped_filter'>
                                   <option value="1">{{ __('dash.last_7_days') }}</option>
                                   <option value="2">{{ __('dash.last_month') }}</option>
                                   <option value="3">{{ __('dash.last_3_months') }}</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="h1 mb-3">{{ $shipped_orders['percent'] ?? 0 }}%</div>
                   <div class="d-flex mb-2">
                       <div>{{ __('order.total_prices') }}</div>
                       <div class="ms-auto">
                           <span class="text-green d-inline-flex align-items-center lh-1">
                               ${{ $shipped_orders['value'] ?? 0 }}
                           </span>
                       </div>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-primary" style="width: {{ $shipped_orders['percent'] ?? 0 }}%" role="progressbar" aria-valuenow="{{ $shipped_orders['percent'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $shipped_orders['percent'] ?? 0 }}% Complete">
                           <span class="visually-hidden">{{ $shipped_orders['percent'] ?? 0 }}% Complete</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-sm-6 col-lg-4">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div class="subheader">{{ __('order.delivered_orders') }}</div>
                       <div class="ms-auto lh-1">
                           <div class="dropdown">
                               <select class="form-select border-0" id="" wire:model='delivered_filter'>
                                   <option value="1">{{ __('dash.last_7_days') }}</option>
                                   <option value="2">{{ __('dash.last_month') }}</option>
                                   <option value="3">{{ __('dash.last_3_months') }}</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="h1 mb-3">{{ $delivered_orders['percent'] ?? 0 }}%</div>
                   <div class="d-flex mb-2">
                       <div>{{ __('order.total_prices') }}</div>
                       <div class="ms-auto">
                           <span class="text-green d-inline-flex align-items-center lh-1">
                               ${{ $delivered_orders['value'] ?? 0 }}
                           </span>
                       </div>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-primary" style="width: {{ $delivered_orders['percent'] ?? 0 }}%" role="progressbar" aria-valuenow="{{ $delivered_orders['percent'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $delivered_orders['percent'] ?? 0 }}% Complete">
                           <span class="visually-hidden">{{ $delivered_orders['percent'] ?? 0 }}% Complete</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-sm-6 col-lg-4">
           <div class="card">
               <div class="card-body">
                   <div class="d-flex align-items-center">
                       <div class="subheader">{{ __('order.cancelled_orders') }}</div>
                       <div class="ms-auto lh-1">
                           <div class="dropdown">
                               <select class="form-select border-0" id="" wire:model='cancelled_filter'>
                                   <option value="1">{{ __('dash.last_7_days') }}</option>
                                   <option value="2">{{ __('dash.last_month') }}</option>
                                   <option value="3">{{ __('dash.last_3_months') }}</option>
                               </select>
                           </div>
                       </div>
                   </div>
                   <div class="h1 mb-3">{{ $cancelled_orders['percent'] ?? 0 }}%</div>
                   <div class="d-flex mb-2">
                       <div>{{ __('order.total_prices') }}</div>
                       <div class="ms-auto">
                           <span class="text-green d-inline-flex align-items-center lh-1">
                               ${{ $cancelled_orders['value'] ?? 0 }}
                           </span>
                       </div>
                   </div>
                   <div class="progress progress-sm">
                       <div class="progress-bar bg-primary" style="width: {{ $cancelled_orders['percent'] ?? 0 }}%" role="progressbar" aria-valuenow="{{ $cancelled_orders['percent'] }}" aria-valuemin="0" aria-valuemax="100" aria-label="{{ $cancelled_orders['percent'] ?? 0 }}% Complete">
                           <span class="visually-hidden">{{ $cancelled_orders['percent'] ?? 0 }}% Complete</span>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
