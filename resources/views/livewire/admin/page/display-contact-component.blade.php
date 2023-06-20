 <div class="card">
     <div class="card-header d-flex align-items-center justify-content-between">
         <h3 class="card-title">{{ __('msgs.all', ['name' => __('setting.messsages')]) }}</h3>
     </div>
     <div class="card-body">
         <div class="row">
             <div class="col-sm-12 col-md-4 col-lg-2">
                 <div class="mb-3">
                     <x-input-label class="form-label" :value="__('msgs.search_by_subject')" />
                     <x-text-input class="form-control" placeholder="{{ __('btns.search') }}" wire:model="subject" />
                 </div>
             </div>
             <div class="col-sm-12 col-md-4 col-lg-2">
                 <div class="mb-3">
                     <x-input-label class="form-label" :value="__('msgs.order_by')" />
                     <select class="form-select" wire:model='order_by'>
                         <option value="">{{ __('btns.select') }}</option>
                         <option value="subject">{{ __('setting.subject') }}</option>
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
                         <th> {{ __('order.customer_name') }}</th>
                         <th> {{ __('order.customer_email') }}</th>
                         <th> {{ __('setting.subject') }}</th>
                         <th> {{ __('setting.messsages') }}</th>
                         <th> {{ __('setting.status') }}</th>
                         <th> {{ __('msgs.created_at') }}</th>
                     </tr>
                 </thead>
                 <tbody class="table-tbody">
                     @forelse ($contacts as $contact)
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $contact->name }}</td>
                             <td>
                                 <span class="badge badge-outline text-blue">{{ $contact->email }}</span>
                             </td>
                             <td>
                                 {{ $contact->subject }}
                             </td>
                             <td>
                                 <div>
                                     <button wire:click='updateStatus({{ $contact }})' class="btn position-relative">
                                         {{ $contact->is_active ? __('msgs.active') : __('msgs.not_active') }}
                                         <span class="badge {{ $contact->is_active ? 'bg-green' : 'bg-red' }} badge-notification badge-blink"></span>
                                     </button>
                                 </div>
                             </td>
                             <td>
                                 <button type="button" class="btn btn-sm"
                                 data-bs-placement="top" data-bs-toggle="popover"
                                  title="{{ __('setting.messsage') }}" data-bs-content="{{ $contact->message }}">{{ __('btns.click_here') }}</button>
                             </td>
                             <td> {{ $contact->created_at }} </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="7" class="border-bottom-0">
                                 <x-blank-section :url="'javascript:;'" :content="''" />
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
             <div class="mt-3">
                 {{ $contacts->links('pagination::bootstrap-5') }}
             </div>
         </div>
     </div>
     <div class="card-footer">
     </div>
 </div>
