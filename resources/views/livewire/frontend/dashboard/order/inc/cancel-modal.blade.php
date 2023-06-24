   <div class="modal fade" id="quick-look" wire:ignore.self>
       <div class="modal-dialog modal-dialog-centered">
           <div class="modal-content modal--shadow">
               <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
               <div class="modal-body">
                   <div class="row">
                       <div class="col-lg-5">
                           <h4 class="dash__h1 ">Order Cancellation Modal</h4>
                       </div>
                       <div class="col-lg-7">
                           <form class="checkout-f__delivery" wire:submit.prevent='cancelOrder()'>
                               <div class="card">
                                   <!--====== Country ======-->
                                   <div class="card-body">
                                       <!--====== Select Box ======-->
                                       <label class="gl-label" for="reason">Cancellation Reason</label>
                                       <select class="select-box select-box--primary-style w-full" id="reason" wire:model='reason'>
                                           <option selected value="">{{ __('btns.select') }}</option>
                                           @foreach (App\Models\OrderLog::CANCELREASON as $key => $reason)
                                               <option value="{{ $key }}">{{ __('frontend.' . $reason) }}</option>
                                           @endforeach
                                       </select>
                                       <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                                       <!--====== End - Select Box ======-->
                                   </div>
                                   <!--====== End - Country ======-->

                                   <hr class="mt-4 mb-2">
                                   <div class="card-footer mt-4">
                                       <div class="u-s-m-b-30">
                                           <button type="submit" data-dismiss="modal" class="dash__custom-link btn--e-transparent-hover-brand-b-2">
                                               <i class="fas fa-times"></i> &nbsp;
                                               {{ __('btns.cancel') }}
                                           </button>
                                       </div>
                                   </div>
                               </div>
                           </form>

                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
